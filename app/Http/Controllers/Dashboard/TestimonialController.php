<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Testimonials\CreateTestimonialRequest;
use App\Http\Requests\Testimonials\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('backend.modules.testimonials.index');
    }

    public function create()
    {
        return view('backend.modules.testimonials.create');
    }

    public function store(CreateTestimonialRequest $request)
    {
        $validatedData = $request->validated();
        $testimonial = Testimonial::create($validatedData);
        $testimonial->addMediaFromRequest('image')->toMediaCollection();
        Toastr::success('testimonial created successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('backend.modules.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $validatedData = $request->validated();
        $testimonial->update($validatedData);
        if ($request->hasFile('image')) {
            $testimonial->clearMediaCollection();
            $testimonial->addMediaFromRequest('image')->toMediaCollection();
        }
        Toastr::success('testimonial updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimonials.index');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        Toastr::success('testimonial deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('testimonials.index');
    }

    public function dataTable()
    {
        $testimonials = Testimonial::query();
        return DataTables::of($testimonials)
            ->addColumn('image', function ($model) {
                return '<img src="' . $model->getFirstMediaUrl() . '" alt="Testimonial Image" width="50" height="50">';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('testimonials.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="edit">
								<i class="la la-edit icon-xl"></i>
							</a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('testimonials.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="delete">
								<i class="la la-trash icon-xl"></i>
							</a>';
            })
            ->rawColumns(['actions', 'image'])->make(true);
    }

}
