<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MajorApplicant;
use App\Models\Level;
use App\Models\Objective;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Courses\CreateUpdateCourseRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\MajorApplicantsExport;
use Maatwebsite\Excel\Facades\Excel;

class MajorApplicantsController extends Controller
{
    public function index()
    {
        return view('backend.modules.majorsApplicants.index');
    }

    public function export(Request $request)
    {
        $applicants = MajorApplicant::query();

        $applicants->when($request->start_date, function ($q) use ($request) {
            return $q->where('created_at', '>', Carbon::parse($request->start_date)->startOfDay());
        });
        $applicants->when($request->end_date, function ($q) use ($request) {
            return $q->where('created_at', '<', Carbon::parse($request->end_date)->endOfDay());
        });

        return Excel::download(new MajorApplicantsExport($applicants), 'Applicants.xlsx');
    }

    public function getRating($applicantId)
    {
        $applicant = MajorApplicant::find($applicantId);

        if (!$applicant) {
            return response()->json(['success' => false, 'error' => 'Applicant not found'], 404);
        }

        return response()->json(['success' => true, 'rating' => $applicant->rate]);
    }

    public function updateRating(Request $request)
    {
        $applicant = MajorApplicant::find($request->applicant_id);
        if (!$applicant) {
            return response()->json(['error' => 'Applicant not found'], 404);
        }

        $applicant->update(['rate' => $request->rating]);

        return response()->json(['message' => 'Rating updated successfully'], 200);
    }

    public function dataTable(Request $request)
    {
        $applicants = MajorApplicant::query();

        $applicants->latest();

        $applicants->when($request->start_date, function ($q) use ($request) {
            return $q->where('created_at', '>', Carbon::parse($request->start_date)->startOfDay());
        });
        $applicants->when($request->end_date, function ($q) use ($request) {
            return $q->where('created_at', '<', Carbon::parse($request->end_date)->endOfDay());
        });
        return DataTables::of($applicants)
            ->addColumn('name', function ($model) {
                return '<a href="' . route("majorApplicant.details", ["id" => $model->id]) . '">' . $model->name . '</a>';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function getUserIndex($id) {
        $user = MajorApplicant::find($id);
        return view("backend.modules.majorsApplicants.user", compact("user"));
    }
}
