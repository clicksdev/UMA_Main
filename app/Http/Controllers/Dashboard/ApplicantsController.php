<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Level;
use App\Models\Objective;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Courses\CreateUpdateCourseRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\ApplicantsExport;
use Maatwebsite\Excel\Facades\Excel;

class ApplicantsController extends Controller
{
    public function index()
    {
        return view('backend.modules.applicants.index');
    }

    public function export(Request $request)
    {
        $applicants = Applicant::query();

        $applicants->when($request->start_date, function ($q) use ($request) {
            return $q->where('created_at', '>', Carbon::parse($request->start_date)->startOfDay());
        });
        $applicants->when($request->end_date, function ($q) use ($request) {
            return $q->where('created_at', '<', Carbon::parse($request->end_date)->endOfDay());
        });

        return Excel::download(new ApplicantsExport($applicants), 'Applicants.xlsx');
    }

    public function getRating($applicantId)
    {
        $applicant = Applicant::find($applicantId);

        if (!$applicant) {
            return response()->json(['success' => false, 'error' => 'Applicant not found'], 404);
        }

        return response()->json(['success' => true, 'rating' => $applicant->rate]);
    }

    public function updateRating(Request $request)
    {
        $applicant = Applicant::find($request->applicant_id);
        if (!$applicant) {
            return response()->json(['error' => 'Applicant not found'], 404);
        }

        $applicant->update(['rate' => $request->rating]);

        return response()->json(['message' => 'Rating updated successfully'], 200);
    }

    public function dataTable(Request $request)
    {
        $applicants = Applicant::query();

        $applicants->when($request->start_date, function ($q) use ($request) {
            return $q->where('created_at', '>', Carbon::parse($request->start_date)->startOfDay());
        });
        $applicants->when($request->end_date, function ($q) use ($request) {
            return $q->where('created_at', '<', Carbon::parse($request->end_date)->endOfDay());
        });

        // Filter by course if selected
        if ($request->course) {
            $applicants->where('course', $request->course);
        }
        // Check if the sorting column is the created_at column (index 5)
        if ($request->has('order')) {
            $orderColumn = $request->input('order.0.column'); // Column index
            $orderDir = $request->input('order.0.dir'); // Sort direction (asc/desc)

            // Apply sorting by created_at if column 5 is being sorted
            if ($orderColumn == 5) {
                $applicants->orderBy('created_at', $orderDir);
            }
        }
        return DataTables::of($applicants)
            ->addColumn('name', function ($model) {
                return '<a href="' . route("applicant.details", ["id" => $model->id]) . '">' . $model->name . '</a>';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->rawColumns(['name'])
            ->make(true);
    }

    public function getUserIndex($id) {
        $user = Applicant::find($id);
        return view("backend.modules.applicants.user", compact("user"));
    }
}
