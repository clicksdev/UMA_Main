<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ActionLogger;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Objective;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\Courses\CreateUpdateCourseRequest;
use App\Models\CoursesFAQ;
use App\Models\Patch;
use App\Models\Question;
use App\Models\QuestionsOption;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return view('backend.modules.courses.index');
    }

    public function create()
    {
        return view('backend.modules.courses.create');
    }
    public function workShopIndex()
    {
        return view('backend.modules.work_shops.index');
    }

    public function workShopCreate()
    {
        return view('backend.modules.work_shops.create');
    }

    public function store(CreateUpdateCourseRequest $request)
    {
        DB::beginTransaction();

        try {
            $validatedData = $request->validated();
            $course = Course::create($validatedData);
            $course->addMediaFromRequest('image')->toMediaCollection();

            if ($request->objectives) {
                foreach ($request->objectives as $obj) {
                    Objective::create([
                        "name" => $obj['en'],
                        "name_ar" => $obj['ar'],
                        "course_id" => $course->id
                    ]);
                }
            }

            if ($request->questions) {
                foreach ($request->questions as $obj) {
                    $question = Question::create([
                        "question" => $obj['question'],
                        "question_ar" => $obj['question_ar'],
                        "type" => $obj['type'],
                        "note" => $obj['note'],
                        "note_ar" => $obj['note_ar'],
                        "course_id" => $course->id
                    ]);
                    if ($obj['type'] == 4) {
                        foreach ($obj['options'] as $option) {
                            QuestionsOption::create([
                                'question_id' => $question->id,
                                'option' => $option['en'],
                                'option_ar' => $option['ar']
                            ]);
                        }
                    }
                }
            }
            if ($request->patches) {
                foreach ($request->patches as $obj) {
                    $patch = Patch::create([
                        "start_at" => $obj['start_at'],
                        "end_at" => $obj['end_at'],
                        "course_id" => $course->id
                    ]);
                }
            }

            if ($request->faq_questions) {
                foreach ($request->faq_questions as $obj) {
                    CoursesFAQ::create([
                        "question" => $obj['question'],
                        "answer" => $obj['answer'],
                        "question_ar" => $obj['question_ar'],
                        "answer_ar" => $obj['answer_ar'],
                        "course_id" => $course->id
                    ]);
                }
            }


            foreach ($request->levels as $level) {
                $image = $level["image"];
                $objectives = isset($level["objectives"]) ? ($level["objectives"]) : [];
                $level["course_id"] = $course->id;
                $level = Level::create($level);
                $level->addMedia($image)->toMediaCollection();

                if ($objectives) {
                    foreach ($objectives as $obj) {
                        Objective::create([
                            "name" => $obj['en'],
                            "name_ar" => $obj['ar'],
                            "level_id" => $level->id
                        ]);
                    }
                }
            }

            DB::commit();

            ActionLogger::log('create', 'program', $course->title);

            return response()->json([
                "status" => true,
                "message" => "Course created successfully"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                "status" => false,
                "message" => "Course creation failed",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function edit(Course $course)
    {
        $levels = $course->levels()->with("objectives")->get();
        foreach ($levels as $level) {
            $level->thumbnail = $level->hasMedia() ? $level->getFirstMediaUrl() : null;
        }
        return view('backend.modules.courses.edit', compact(['course', 'levels']));
    }
    public function workShopEdit($id)
    {
        $course = Course::withoutGlobalScope('excludeWorkShop')->where('course_type', 'work_shop')->find($id);
        $levels = $course->levels()->with("objectives")->get();
        foreach ($levels as $level) {
            $level->thumbnail = $level->hasMedia() ? $level->getFirstMediaUrl() : null;
        }
        return view('backend.modules.work_shops.edit', compact(['course', 'levels']));
    }
    public function update(CreateUpdateCourseRequest $request)
    {
        // Start a database transaction
        DB::beginTransaction();


        try {
            $validatedData = $request->validated();
            $course = Course::withoutGlobalScope('excludeWorkShop')->find($request->id ?? 0);

            $original = $course;

            if ($course) {
                // Update course details
                $course->update($validatedData);

                // Handle image upload
                if ($request->hasFile('image')) {
                    $course->clearMediaCollection();
                    $course->addMediaFromRequest('image')->toMediaCollection();
                }

                // Handle objectives creation
                if ($request->objectives) {
                    foreach ($request->objectives as $obj) {
                        if (isset($obj['en'])) {
                            Objective::create([
                                "name" => $obj['en'],
                                "name_ar" => $obj['ar'],
                                "course_id" => $course->id
                            ]);
                        }
                    }
                }

                // Handle questions update
                if ($request->questions) {
                    // Delete old questions and their options
                    foreach ($course->questions as $question) {
                        $question->options()->delete();
                        $question->delete();
                    }

                    // Create new questions and options
                    foreach ($request->questions as $obj) {
                        $question = Question::create([
                            "question" => $obj['question'],
                            "question_ar" => $obj['question_ar'] ?? null,
                            "type" => $obj['type'],
                            "note" => $obj['note'] ?? null,
                            "note_ar" => $obj['note_ar'] ?? null,
                            "course_id" => $course->id
                        ]);

                        if ($obj['type'] == 4 && $obj['options']) {
                            foreach ($obj['options'] as $option) {
                                QuestionsOption::create([
                                    'question_id' => $question->id,
                                    'option' => isset($option['en']) ? $option['en'] : $option['option'],
                                    'option_ar' => isset($option['ar']) ? $option['ar'] : $option['option_ar']
                                ]);
                            }
                        }
                    }
                }

                $course->patches()->delete();

                if ($request->patches) {
                    foreach ($request->patches as $obj) {
                        $patch = Patch::create([
                            "start_at" => $obj['start_at'],
                            "end_at" => $obj['end_at'],
                            "course_id" => $course->id
                        ]);
                    }
                }

                // Handle FAQ questions update
                if ($request->faq_questions) {
                    foreach ($course->FAQ as $question) {
                        $question->delete();
                    }
                    foreach ($request->faq_questions as $obj) {
                        CoursesFAQ::create([
                            "question" => $obj['question'],
                            "answer" => $obj['answer'],
                            "question_ar" => $obj['question_ar'],
                            "answer_ar" => $obj['answer_ar'],
                            "course_id" => $course->id
                        ]);
                    }
                }

                // Handle objectives deletion
                if ($request->objectives_to_delete) {
                    foreach ($request->objectives_to_delete as $obj) {
                        if (is_array($obj) && $obj["id"]) {
                            Objective::find($obj["id"])->delete();
                        }
                    }
                }

                // Handle levels deletion
                if ($request->levels_to_delete) {
                    foreach ($request->levels_to_delete as $lev) {
                        if (is_array($lev) && $lev["id"]) {
                            Level::find($lev["id"])->delete();
                        }
                    }
                }

                // Handle levels creation or update
                foreach ($request->levels as $level) {
                    $image = $level["image"] ?? null;
                    $objectives = $level["objectives"] ?? null;

                    // Handle objectives deletion within levels
                    if ($level["objectives_to_delete"] ?? false) {
                        foreach (($level["objectives_to_delete"] ?? []) as $obj) {
                            if (is_array($obj) && ($obj["id"] ?? false)) {
                                Objective::find($obj["id"])->delete();
                            }
                        }
                    }

                    $levelData = [
                        "id" => $level["id"] ?? 0,
                        "title" => $level["title"] ?? "",
                        "overview" => $level["overview"] ?? "",
                        "title_ar" => $level["title_ar"] ?? "",
                        "overview_ar" => $level["overview_ar"] ?? "",
                        "duration" => $level["duration"] ?? 0,
                        "num_sessions" => $level["num_sessions"] ?? 0,
                        "course_id" => $level["course_id"] ?? $course->id,
                    ];

                    // Update or create level
                    $level = Level::updateOrCreate(
                        ['id' => $levelData['id']],
                        $levelData
                    );

                    // Handle objectives creation for the level
                    if ($objectives) {
                        foreach ($objectives as $obj) {
                            if (isset($obj['en'])) {
                                Objective::create([
                                    "name" => $obj['en'],
                                    "name_ar" => $obj['ar'],
                                    "level_id" => $level->id
                                ]);
                            }
                        }
                    }

                    // Handle level image upload
                    if ($image) {
                        $level->clearMediaCollection();
                        $level->addMedia($image)->toMediaCollection();
                    }
                }

                // If all operations are successful, commit the transaction
                DB::commit();


                ActionLogger::log('update', 'program', $course->title);

                // Return success response
                return response()->json([
                    "status" => true,
                    "message" => "Course updated successfully"
                ]);
            }
        } catch (\Exception $e) {
            // If any error occurs, rollback the transaction
            DB::rollBack();

            // Return error response
            return response()->json([
                "status" => false,
                "message" => "An error occurred while updating the course",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $course = Course::withoutGlobalScope('excludeWorkShop')->where('course_type', 'work_shop')->find($id);

        $original = $course;

        $course->levels()->delete();
        $course->delete();
        Toastr::success('course deleted successfully!', 'Success', ["positionClass" => "toast-top-right"]);

        ActionLogger::log('delete', 'program', $original->title);

        return redirect()->route('courses.index');
    }

    public function dataTable()
    {
        $courses = Course::query();
        return DataTables::of($courses)
            ->addColumn('image', function ($model) {
                return '<img src="' . $model->getFirstMediaUrl() . '" alt="Course Image" width="50" height="50">';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('courses.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="edit">
								<i class="la la-edit icon-xl"></i>
							</a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('courses.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="delete">
								<i class="la la-trash icon-xl"></i>
							</a>';
            })
            ->rawColumns(['actions', 'image'])->make(true);
    }

    public function WorkSHopDataTable()
    {
        $courses = Course::query();

        $courses->withoutGlobalScope('excludeWorkShop')->where('course_type', 'work_shop');

        return DataTables::of($courses)
            ->addColumn('image', function ($model) {
                return '<img src="' . $model->getFirstMediaUrl() . '" alt="Course Image" width="50" height="50">';
            })
            ->addColumn('created_at', function ($model) {
                return $model->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($model) {
                return '<a href="' . route('work_shops.edit', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="edit">
								<i class="la la-edit icon-xl"></i>
							</a>' .
                    '<a onClick="return confirm(\'Are you sure you want to delete this record?\')" href="' . route('courses.delete', $model->id) . '" class="btn btn-sm btn-clean btn-icon" title="delete">
								<i class="la la-trash icon-xl"></i>
							</a>';
            })
            ->rawColumns(['actions', 'image'])->make(true);
    }

    public function toggleShow($id) {
        $course = Course::withoutGlobalScope('excludeWorkShop')->find($id);
        $course->doesShow = !$course->doesShow;
        $course->save();

        return redirect()->back();
    }

}
