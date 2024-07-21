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
use App\Models\Answer;
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

        $faqs  = Faq::query()->latest()->get();

        return view("front.course.overview", compact("course", 'faqs'));
    }

    public function courseApplyIndex($id)
    {
        $course = Course::find($id);

        $faqs  = Faq::query()->latest()->get();

        return view("front.course.apply", compact("course", 'faqs'));
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

    public function presidentIndex() {
        return view("front.president");
    }
}
