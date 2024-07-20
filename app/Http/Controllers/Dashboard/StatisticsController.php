<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Statistics\CreateStatisticRequest;
use App\Http\Requests\Statistics\UpdateStatisticRequest;
use App\Models\Statistic;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index()
    {
        return view('backend.modules.statistics.index');
    }

    public function create()
    {
        return view('backend.modules.statistics.create');
    }

    public function store(CreateStatisticRequest $request)
    {
        $validatedData = $request->validated();
        Statistic::create($validatedData);
        Toastr::success('statistic Created successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('statistics.index');
    }

    public function edit(Statistic $statistic)
    {
        return view('backend.modules.statistics.edit', compact('statistic'));
    }

    public function update(UpdateStatisticRequest $request, Statistic $statistic)
    {
        $validatedData = $request->validated();
        $statistic->update($validatedData);
        Toastr::success('statistic updated successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('statistics.index');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        Toastr::success('statistic deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('statistics.index');
    }

    public function dataTable()
    {
        $Statistics = Statistic::query();
        return DataTables::of($Statistics)
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('statistics.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="edit">
								<i class="la la-edit icon-xl"></i>
							</a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('statistics.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="delete">
								<i class="la la-trash icon-xl"></i>
							</a>';
            })
            ->rawColumns(['actions'])->make(true);
    }

}
