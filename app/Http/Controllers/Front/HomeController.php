<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\Statistic;
use App\Models\Applicant;
use App\Models\Testimonial;
use App\Http\Requests\Courses\ApplyRequest;
use App\Http\Requests\Majors\ApplyRequest as MajorsApplyRequest;
use App\Models\Answer;
use App\Models\Major;
use App\Models\MajorApplicant;
use App\Models\Question;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function successIndex($name)
    {
        $user_name = $name;
        return view('front.course.success', compact("user_name"));
    }

    public function index()
    {
        $statistics   = Statistic::query()->latest()->take(4)->get();

        $testimonials = Testimonial::query()->latest()->take(4)->get();


        return view('front.home', compact('statistics', 'testimonials'));
    }

    public function courseDetails($id)
    {
        $course = Course::find($id);

        $faqs  = Faq::query()->get();

        return view("front.course.overview", compact("course", 'faqs'));
    }

    public function courseApplyIndex($id)
    {
        $course = Course::find($id);

        $faqs  = Faq::query()->get();

        return view("front.course.apply", compact("course", 'faqs'));
    }

    public function majorDetails($id)
    {
        $major = Major::find($id);

        $faqs  = Faq::query()->get();

        return view("front.major.overview", compact("major", 'faqs'));
    }

    public function majorApplyIndex($id)
    {
        $major = Major::find($id);

        $faqs  = Faq::query()->get();

        return view("front.major.apply", compact("major", 'faqs'));
    }

    public function moveToTop($id)
    {
        // Find the course by its ID
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        // Start a transaction to ensure data integrity
        DB::transaction(function () use ($course) {
            // Increment the arrangement value for all courses
            $courses_rest = Course::where('id', '!=', $course->id)->orderBy('home_arrangment', 'asc')
                  ->get();

            $i = 2;
            foreach ($courses_rest as $item) {
                $item->home_arrangment = $i++;
                $item->save();
            }

            // Set the selected course's arrangement to 1 (top position)
            $course->home_arrangment = 1;
            $course->save();
        });

        return redirect()->back();
    }

    public function moveMajorToTop($id)
    {
        // Find the major by its ID
        $major = Major::find($id);

        if (!$major) {
            return response()->json(['message' => 'Major not found'], 404);
        }

        // Start a transaction to ensure data integrity
        DB::transaction(function () use ($major) {
            // Increment the arrangement value for all majors
            $majors_rest = Major::where('id', '!=', $major->id)->orderBy('home_arrangment', 'asc')
                  ->get();

            $i = 2;
            foreach ($majors_rest as $item) {
                $item->home_arrangment = $i++;
                $item->save();
            }

            // Set the selected major's arrangement to 1 (top position)
            $major->home_arrangment = 1;
            $major->save();
        });

        return redirect()->back();
    }

    public function applyCourse(ApplyRequest $request)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();
        $isRegistered = Applicant::where("email", $validatedData['email'])->where("course", $request['email'])->get();
        if ($isRegistered->count() > 0) {
            return redirect()->back()->withErrors(["error" => "You have registered before"])->withInput();
        }
        try {
        $applicant = Applicant::create($validatedData);
        foreach ($validatedData["questions"] as $key => $value) {
            $question = Question::find($key);
            // Check if $value is an instance of UploadedFile
            if ($value instanceof \Illuminate\Http\UploadedFile && $value->isValid()) {
                $answer = Answer::create([
                    'question_id' => $key,
                    'applicant_id' => $applicant->id,
                    'question_txt' => $question->question,
                    'answer' => 'N/A'
                ]);

                $answer->clearMediaCollection();
                $answer->addMedia($value)->toMediaCollection();
            } else {
                // Save answer as a regular string if no valid video file is present
                $answer = Answer::create([
                    'question_id' => $key,
                    'applicant_id' => $applicant->id,
                    'question_txt' => $question->question,
                    'answer' => $value
                ]);
            }
        }

        DB::commit();

        return redirect()->route('success.view', ["name" => $request->name]);

        } catch (Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();

            return $e;

            return response()->json(['error' => 'Failed to sign'], 500);
        }
    }

    public function applyMajor(MajorsApplyRequest $request)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();
        $isRegistered = MajorApplicant::where("email", $validatedData['email'])->where("course", $request['email'])->get();
        if ($isRegistered->count() > 0) {
            return redirect()->back()->withErrors(["error" => "You have registered before"])->withInput();
        }
        try {
        $applicant = MajorApplicant::create($validatedData);
        foreach ($validatedData["questions"] as $key => $value) {
            $question = Question::find($key);
            // Check if $value is an instance of UploadedFile
            if ($value instanceof \Illuminate\Http\UploadedFile && $value->isValid()) {
                $answer = Answer::create([
                    'question_id' => $key,
                    'magor_applicant_id' => $applicant->id,
                    'question_txt' => $question->question,
                    'answer' => 'N/A'
                ]);

                $answer->clearMediaCollection();
                $answer->addMedia($value)->toMediaCollection();
            } else {
                // Save answer as a regular string if no valid video file is present
                $answer = Answer::create([
                    'question_id' => $key,
                    'magor_applicant_id' => $applicant->id,
                    'question_txt' => $question->question,
                    'answer' => $value
                ]);
            }
        }

        DB::commit();

        return redirect()->route('success.view', ["name" => $request->name]);

        } catch (Exception $e) {
            // If there is an error, rollback the transaction
            DB::rollBack();

            return $e;

            return response()->json(['error' => 'Failed to sign'], 500);
        }
    }

    public function presidentIndex() {
        return view("front.president");
    }
}
