@extends('front.layout.master')
@section('content')
@if($course)
@php
$course_patch = $course->patches()->get()->mapWithKeys(function ($patch) {
    // Format start_at and end_at to 'd M Y' (e.g., 21 Nov 2024)
    $formattedStart = Carbon\Carbon::parse($patch->start_at)->format('d M Y');
    $formattedEnd = Carbon\Carbon::parse($patch->end_at)->format('d M Y');

    // Use the formatted date range as both key and value
    $dateRangeText = "{$formattedStart} to {$formattedEnd}";

    return [$dateRangeText => $dateRangeText];
});
@endphp
        <div class="page_path">
            <div class="container">
                <a href="/">
                    <span>{{ __('home.home') }}</span>
                </a>
                <span>/</span>
                <a href="/course/apply/{{$course->id}}">{{ $course['title' . (App::getLocale() == 'ar' ? '_ar' : '')] }}</a>
                <span>/</span>
                <a href="/course/apply/{{$course->id}}">{{ __('form.apply') }}</a>
            </div>
        </div>
        {{-- <div>{{$errors}}</div> --}}
        @if($errors->first('error'))
        <br><br>
            <div class="container">
                <div class="alert alert-danger" style="padding: 12px; background: #d14c4c; color: #fff; border-radius: 10px;">
                    {{$errors->first('error')}}
                </div>
            </div>
        @endif
        <section class="form" id="apply_wrapper">
            <div class="container">
                <form ref="form" @submit.prevent="handleSubmit" action="{{route('course.apply')}}" enctype="multipart/form-data" method="POST" style="background: #ECECEC; width: 100%">
                    @csrf
                    <input type="hidden" name="course" value="{{$course['title' . (App::getLocale() == 'ar' ? '_ar' : '')]}}">
                    <div class="head_form step1" :class="step == 2 ? 'step2' : (step == 3 ? 'step2 step3' : '')">
                        <div class="step">1</div>
                        <span></span>
                        <div class="step">2</div>
                        <span></span>
                        <div class="step">3</div>
                    </div>
                    <div class="step-1" :class="step == 1 ? '' : 'hide'">
                        <h2>{{ __('form.personal_information') }}</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="name">{{ __('form.full_name') }}</label>
                                {{ Form::text('name', old('name'), ['placeholder' => __('form.full_name_placeholder'), 'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="dob">{{ __('form.date_of_birth') }}</label>
                                {{ Form::date('dob', old('dob'), ['placeholder' => __('form.date_of_birth_placeholder'), 'class' => $errors->has('dob') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="gender">{{ __('form.gender') }}</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>{{ __('form.male') }}</option>
                                    <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>{{ __('form.female') }}</option>
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                            </div>
                        </div>
                        <h2>{{ __('form.contact_info') }}</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="phone">{{ __('form.phone_number') }}</label>
                                {{ Form::text('phone', old('phone'), ['placeholder' => __('form.phone_number_placeholder'), 'class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="email">{{ __('form.email') }}</label>
                                {{ Form::email('email', old('email'), ['placeholder' => __('form.email_placeholder'), 'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="country">{{ __('form.country') }}</label>
                                {{ Form::text('country', old('country'), ['placeholder' => __('form.country_placeholder'), 'class' => $errors->has('country') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="governante">{{ __('form.governate') }}</label>
                                {{ Form::text('governante', old('governante'), ['placeholder' => __('form.governate_placeholder'), 'class' => $errors->has('governante') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('governante') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="address">{{ __('form.address') }}</label>
                                {{ Form::text('address', old('address'), ['placeholder' => __('form.address_placeholder'), 'class' => $errors->has('address') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                            </div>
                        </div>
                        <h2>{{ __('form.educational_background') }}</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="qualification">{{ __('form.highest_qualification') }}</label>
                                {{ Form::text('qualification', old('qualification'), ['placeholder' => __('form.highest_qualification_placeholder'), 'class' => $errors->has('qualification') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('qualification') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="attended">{{ __('form.institutions_attended') }}</label>
                                {{ Form::text('attended', old('attended'), ['placeholder' => __('form.institutions_attended_placeholder'), 'class' => $errors->has('attended') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('attended') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="graduation">{{ __('form.year_of_graduation') }}</label>
                                {{ Form::number('graduation', old('graduation'), ['placeholder' => __('form.year_of_graduation_placeholder'), 'class' => $errors->has('graduation') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('graduation') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="step-2" :class="step == 2 ? '' : 'hide'">
                        <h2>{{ __('form.more_info') }}</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="prev_education">{{ __('form.previous_education') }}</label>
                                {{ Form::text('prev_education', old('prev_education'), ['placeholder' => __('form.previous_education_placeholder'), 'class' => $errors->has('prev_education') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('prev_education') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="job">{{ __('form.current_job_title') }}</label>
                                {{ Form::text('job', old('job'), ['placeholder' => __('form.current_job_title_placeholder'), 'class' => $errors->has('job') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('job') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="organization_name">{{ __('form.company_name') }}</label>
                                {{ Form::text('organization_name', old('organization_name'), ['placeholder' => __('form.company_name_placeholder'), 'class' => $errors->has('organization_name') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('organization_name') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="duration_of_employment">{{ __('form.employment_duration') }}</label>
                                {{ Form::text('duration_of_employment', old('duration_of_employment'), ['placeholder' => __('form.employment_duration_placeholder'), 'class' => $errors->has('duration_of_employment') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('duration_of_employment') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="course_patch">{{ __('form.choose_patch') }}</label>
                                {{ Form::select('course_patch', $course_patch, old('course_patch'), ['placeholder' => __('form.choose_patch'), 'class' => $errors->has('course_patch') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('course_patch') }}</div>
                            </div>                            <div class="input-group">
                                <label for="subject_studied">{{ __('form.relevant_courses') }}</label>
                                {{ Form::text('subject_studied', old('subject_studied'), ['placeholder' => __('form.relevant_courses_placeholder'), 'class' => $errors->has('subject_studied') ? 'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('subject_studied') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="step-3" :class="step == 3 ? '' : 'hide'">
                        <h2>{{ __('form.task') }}</h2>
                        @foreach ($course->questions as $item)
                            <p style="margin-bottom: 16px; text-align: right" dir="rtl">- {{$item['question' . (App::getLocale() == 'ar' ? '_ar' : '')]}}</p>
                            @if ($item->type == 1)
                            <div class="input-row" style="grid-template-columns: 1fr">
                                <div class="input-group">
                                    <textarea rows="4" name="questions[{{$item->id}}]" required placeholder="{{ __('form.add_script_placeholder') }}" class="form-control">{{ old('questions.'.$item->id) }}</textarea>
                                </div>
                            </div>
                            <br>
                            @elseif ($item->type == 4)
                            <div class="input-row" dir="rtl" style="grid-template-columns: 1fr 1fr 1fr 1fr">
                                @foreach ($item->options()->get() as $option)
                                <div class="input-group" style="display: flex;align-items: center;justify-content: center;">
                                    <label for="{{$option->option}}">{{$option['option' . (App::getLocale() == 'ar' ? '_ar' : '')]}}</label>
                                    <input type="radio" name="questions[{{$item->id}}]" id="{{$option->option}}" value="{{$option->option}}">
                                </div>
                                @endforeach
                            </div>
                            <br>
                            @elseif ($item->type == 2)
                            <div class="input-row" style="grid-template-columns: 1fr">
                                <div class="input-group">
                                    <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt" name="questions[{{$item->id}}]" required class="form-control">
                                </div>
                                <span>{{ $item->note ? $item['note' . (App::getLocale() == 'ar' ? '_ar' : '')] : __('form.file_size_limit') }}</span>
                            </div>
                            <br>
                            @else
                            <div class="input-row" style="grid-template-columns: 1fr">
                                <div class="input-group">
                                    <input type="file" accept="video/mp4,video/x-m4v,video/*" name="questions[{{$item->id}}]" required class="form-control">
                                </div>
                                <span>{{ $item->note ? $item['note' . (App::getLocale() == 'ar' ? '_ar' : '')] : __('form.video_size_limit') }}</span>
                            </div>
                            <br>
                            @endif
                        @endforeach
                    </div>

                    <div class="input-row" v-if="step > 1">
                        <button type="button" v-if="!loader" @click="handlePrev">Previous</button>
                        <button type="button" v-if="step == 2 && !loader" @click="handleNext">@{{ step == 3 ? "Apply" : "Next" }}</button>
                        <button type="submit" v-if="step == 3 && !loader" @click="handleNext">@{{ step == 3 ? "Apply" : "Next" }}</button>
                        <div class="loader" v-if="loader" style="margin: auto; grid-column: span 2;"></div>
                    </div>
                    <button type="button" v-if="step == 1" @click="handleNext">Next</button>
                </form>
            </div>
        </section>
    @endif
@endsection

@section("script")
    <script src="{{asset('/assets/libs/vue.js')}}"></script>
    <script src="{{asset('/assets/vueJs/apply.js')}}?={{time()}}"></script>
    <script>
        $(".question").on("click", function () {
            $(this).find(".body").slideToggle()
            $(this).find(".head .icon-tabler-chevron-down").fadeToggle()
            $(this).find(".head .icon-tabler-chevron-up").fadeToggle()
        })
        $(".overview_wrapper .container .options_wrapper .info-menu .btns button").on("click", function () {
            $(this).addClass("active")
            $(this).siblings().removeClass("active")
            console.log("hello");
            var className = $(this).attr("for-show");
            if ($(".overview_wrapper .container .options_wrapper .info-menu .head").hasClass(className)) {
                $("." + className).siblings(".head, .content_wapper, .info").fadeOut();
                setTimeout(() => {
                    $("." + className).fadeIn().css("display", "flex");
                }, 500);
            }
        })
    </script>
@endsection
