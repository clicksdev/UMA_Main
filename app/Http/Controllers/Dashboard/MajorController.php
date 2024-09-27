<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ActionLogger;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Level;
use App\Models\Objective;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Majors\CreateUpdateMajorRequest;
use App\Models\Question;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    public function index()
    {
        return view('backend.modules.majors.index');
    }

    public function create()
    {
        return view('backend.modules.majors.create');
    }

    public function store(CreateUpdateMajorRequest $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validated();
            $major = Major::create($validatedData);
            $major->addMediaFromRequest('image')->toMediaCollection();

            if ($request->objectives) {
                foreach ($request->objectives as $obj) {
                    Objective::create([
                        "name" => $obj,
                        "major_id" => $major->id
                    ]);
                }
            }

            if ($request->questions) {
                foreach ($request->questions as $obj) {
                    Question::create([
                        "question" => $obj['question'],
                        "type" => $obj['type'],
                        "note" => $obj['note'],
                        "major_id" => $major->id
                    ]);
                }
            }


            foreach ($request->levels as $level) {
                $image = $level["image"];
                $objectives = isset($level["objectives"]) ? ($level["objectives"]) : [];
                $level["major_id"] = $major->id;
                $level = Level::create($level);
                $level->addMedia($image)->toMediaCollection();

                if ($objectives) {
                    foreach ($objectives as $obj) {
                        Objective::create([
                            "name" => $obj,
                            "level_id" => $level->id
                        ]);
                    }
                }
            }

            DB::commit();

            ActionLogger::log('create', 'major', $major->title);

            return response()->json([
                "status" => true,
                "message" => "Major created successfully"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => false,
                "message" => "Major creation failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function edit(Major $major)
    {
        $levels = $major->levels()->with("objectives")->get();
        foreach ($levels as $level) {
            $level->thumbnail = $level->hasMedia() ? $level->getFirstMediaUrl() : null;
        }
        return view('backend.modules.majors.edit', compact(['major', 'levels']));
    }

    public function update(CreateUpdateMajorRequest $request)
    {
        $validatedData = $request->validated();
        $major = major::find($request->id ?? 0);
        if ($major) {

            $major->update($validatedData);

            if ($request->hasFile('image')) {
                $major->clearMediaCollection();
                $major->addMediaFromRequest('image')->toMediaCollection();
            }

            if ($request->objectives) {
                foreach ($request->objectives as $obj) {
                    if (!is_array($obj))
                        $objective = Objective::create([
                            "name" => $obj,
                            "major_id" => $major->id
                        ]);
                }
            }

            if ($request->questions) {
                foreach ($major->questions as $question) {
                    $question->delete();
                }
                foreach ($request->questions as $obj) {
                    Question::create([
                        "question" => $obj['question'],
                        "type" => $obj['type'],
                        "note" => $obj['note'],
                        "major_id" => $major->id
                    ]);
                }
            }
            if ($request->objectives_to_delete) {
                foreach ($request->objectives_to_delete as $obj) {
                    if (is_array($obj) && $obj["id"]) {
                        Objective::find($obj["id"])->delete();
                    }
                }
            }

            if ($request->levels_to_delete) {
                foreach ($request->levels_to_delete as $lev) {
                    if (is_array($lev) && $lev["id"]) {
                        Level::find($lev["id"])->delete();
                    }
                }
            }

            foreach ($request->levels as $level) {
                $image = $level["image"] ?? null;
                $objectives = $level["objectives"] ?? null;
                if ($level["objectives_to_delete"] ?? false) {
                    foreach (($level["objectives_to_delete"] ?? []) as $obj) {
                        if (is_array($obj) && ($obj["id"] ?? false)) {
                            Objective::find($obj["id"])->delete();
                        }
                    }
                }

                $levelData =

                    [
                        "id" => $level["id"] ?? 0,
                        "title" => $level["title"] ?? "",
                        "overview" => $level["overview"] ?? "",
                        "duration" => $level["duration"] ?? 0,
                        "num_sessions" => $level["num_sessions"] ?? 0,
                        "major_id" => $level["major_id"] ?? $major->id,
                    ];

                $level = Level::make($levelData);  // Create Level model instance

                $level = Level::updateOrCreate(
                    ['id' => $levelData['id']], // Use 'id' for unique identification
                    $levelData
                );

                if ($objectives) {
                    foreach ($objectives as $obj) {
                        if (!is_array($obj))
                        $objective = Objective::create([
                            "name" => $obj,
                            "level_id" => $level->id
                        ]);
                    }
                }

                if ($image) {
                    $level->clearMediaCollection();
                    $level->addMedia($image)->toMediaCollection();
                }
            }

            ActionLogger::log('update', 'major', $major->title);

            if ($major)
                return response()->json([
                    "status" => true,
                    "message" => "Major updated succussfuly"
                ]);

        }
    }

    public function destroy(Major $major)
    {
        $original = $major;
        $major->levels()->delete();
        $major->delete();
        Toastr::success('major deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);
        ActionLogger::log('delete', 'major', $original->title);
        return redirect()->route('majors.index');
    }

    public function dataTable()
    {
        $majors = Major::query();
        return DataTables::of($majors)
            ->addColumn('image', function ($model) {
                return '<img src="' . $model->getFirstMediaUrl() . '" alt="Major Image" width="50" height="50">';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('majors.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="edit">
								<i class="la la-edit icon-xl"></i>
							</a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('majors.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="delete">
								<i class="la la-trash icon-xl"></i>
							</a>';
            })
            ->rawColumns(['actions', 'image'])->make(true);
    }

}
