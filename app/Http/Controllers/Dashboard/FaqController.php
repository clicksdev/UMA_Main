<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ActionLogger;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faqs\CreateFaqRequest;
use App\Http\Requests\Faqs\UpdateFaqRequest;
use App\Models\Faq;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index()
    {
        return view('backend.modules.faqs.index');
    }

    public function create()
    {
        return view('backend.modules.faqs.create');
    }

    public function store(CreateFaqRequest $request)
    {
        $validatedData = $request->validated();
        $faq = Faq::create($validatedData);
        Toastr::success('faq created successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        ActionLogger::log('create', 'FAQ', $faq->question);
        return redirect()->route('faqs.index');
    }

    public function edit(Faq $faq)
    {
        return view('backend.modules.faqs.edit', compact('faq'));
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $validatedData = $request->validated();
        $faq->update($validatedData);
        Toastr::success('faq updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        ActionLogger::log('update', 'FAQ', $faq->question);
        return redirect()->route('faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $original = $faq;
        $faq->delete();
        Toastr::success('faq deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        ActionLogger::log('delete', 'FAQ', $original->question);
        return redirect()->route('faqs.index');
    }

    public function dataTable()
    {
        $faqs = Faq::query();
        return DataTables::of($faqs)
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('faqs.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="edit">
								<i class="la la-edit icon-xl"></i>
							</a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('faqs.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="delete">
								<i class="la la-trash icon-xl"></i>
							</a>';
            })
            ->rawColumns(['actions'])->make(true);
    }

}
