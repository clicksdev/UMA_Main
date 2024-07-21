@extends('front.layout.master')
@section('content')
    @if($course)
        <div class="page_path">
            <div class="container">
                <a href="/">
                    <span>Home</span>
                </a>
                <span>
            /
        </span>
                <a href="/course/apply/{{$course->id}}">{{$course->title}}</a>
                <span>
            /
        </span>
                <a href="/course/apply/{{$course->id}}">Apply </a>
            </div>
        </div>
        @if($errors->first('error'))
        <br>
        <br>
            <div class="container">
                <div class="alert alert-danger" style="padding: 12px;background: #d14c4c;color: #fff;border-radius: 10px;">
                    {{$errors->first('error')}}
                </div>
            </div>
        @endif
        <section class="form" id="apply_wrapper">
            <div class="container">
                <form ref="form" @submit.prevent="handleSubmit" action="{{route('course.apply')}}" enctype="multipart/form-data" method="POST" style="background: #ECECEC;width: 100%">
                    @csrf
                    <input type="hidden" name="course" value="{{$course->title}}">
                    <div class="head_form step1" :class="step == 2 ? 'step2' : (step == 3 ? 'step2 step3' : '')">
                        <div class="step">1</div>
                        <span></span>
                        <div class="step">2</div>
                        <span></span>
                        <div class="step">3</div>
                    </div>
                    <div class="step-1" :class="step == 1 ? '' : 'hide'">
                        <h2>Personal information</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="name">Full Name</label>
                                {{ Form::text('name', null, ['placeholder' => 'Full Name *', 'class' => $errors->has('name') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="dob">Date of brith</label>
                                {{ Form::date('dob', null, ['placeholder' => 'Date of brith *', 'class' => $errors->has('dob') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('dob') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="gender">Genger</label>
                                <select name="gender" id="gender">
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <div class="invalid-feedback">{{ $errors->first('level') }}</div>
                            </div>
                        </div>
                        <h2>Contact Info</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="phone">Your Phone number</label>
                                {{ Form::text('phone', null, ['placeholder' => 'Your Phone Number *', 'class' => $errors->has('phone') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="email">Your Email</label>
                                {{ Form::email('email', null, ['placeholder' => 'Your Email Address *', 'class' => $errors->has('email') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="country">Country</label>
                                {{ Form::text('country', null, ['placeholder' => 'Your Country *', 'class' => $errors->has('country') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="governante">Governante / Province</label>
                                {{ Form::text('governante', null, ['placeholder' => 'Your Governante *', 'class' => $errors->has('governante') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('governante') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="governante">Address</label>
                                {{ Form::text('address', null, ['placeholder' => 'Your Address *', 'class' => $errors->has('address') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                            </div>
                        </div>
                        <h2>Educational background</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="qualification">Highest Qualification</label>
                                {{ Form::text('qualification', null, ['placeholder' => 'Your Highest Qualification *', 'class' => $errors->has('qualification') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('qualification') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="attended">Institutions Attended</label>
                                {{ Form::text('attended', null, ['placeholder' => 'institutions attended *', 'class' => $errors->has('attended') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('attended') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="graduation">Year of Graduation</label>
                                {{ Form::number('graduation', null, ['placeholder' => 'Year of Graduation *', 'class' => $errors->has('graduation') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('graduation') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="step-2" :class="step == 2 ? '' : 'hide'">
                        <h2>More Info</h2>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="prev_education">Previous Education</label>
                                {{ Form::text('prev_education', null, ['placeholder' => 'Previous Education *', 'class' => $errors->has('prev_education') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('prev_education') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="dob">Current / Most Recent Job Title</label>
                                {{ Form::text('job', null, ['placeholder' => 'Current / Most Recent Job Title *', 'class' => $errors->has('job') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('job') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="organization_name">Company / Organization Name</label>
                                {{ Form::text('organization_name', null, ['placeholder' => 'Company *', 'class' => $errors->has('organization_name') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('organization_name') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="organization_name">Duration of Employment</label>
                                {{ Form::text('duration_of_employment', null, ['placeholder' => 'Duration *', 'class' => $errors->has('duration_of_employment') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('duration_of_employment') }}</div>
                            </div>
                            <div class="input-group">
                                <label for="subject_studied">Relevant Courses or subjects studied</label>
                                {{ Form::text('subject_studied', null, ['placeholder' => 'Courses *', 'class' => $errors->has('subject_studied') ?
                                'form-control is-invalid' : 'form-control']) }}
                                <div class="invalid-feedback">{{ $errors->first('subject_studied') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="step-3" :class="step == 3 ? '' : 'hide'">
                        <h2>Task</h2>
                        @foreach ($course->questions()->get() as $item)
                            <p style="margin-bottom: 16px;text-align: right" dir="rtl">- {{$item->question}}</p>
                            @if ($item->type == 1)
                            <div class="input-row" style="grid-template-columns: 1fr">
                                <div class="input-group">
                                    <textarea rows="4" name="questions[{{$item->id}}]" required placeholder="Add your script here" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                            @else
                            <div class="input-row" style="grid-template-columns: 1fr">
                                <div class="input-group">
                                    <input type="file" accept="video/mp4,video/x-m4v,video/*" rows="4" name="questions[{{$item->id}}]" required class="form-control">
                                </div>
                                <span>Video size can not be more than 100MB</span>
                            </div>
                            <br>
                            @endif
                        @endforeach
                    </div>
                    <div class="input-row" v-if="step > 1">
                        <button type="button" v-if="!loader" @click="handlePrev">Previous</button>
                        <button type="button" v-if="step == 2 && !loader" @click="handleNext">@{{ step == 3 ? "Apply" : "Next" }}</button>
                        <button type="submit" v-if="step == 3 && !loader" @click="handleNext">@{{ step == 3 ? "Apply" : "Next" }}</button>
                        <div class="loader" v-if="loader" style="margin: auto;grid-column: span 2;"></div>
                    </div>
                    <button type="button" v-if="step == 1" @click="handleNext">Next</button>
                </form>
            </div>
        </section>

    @endif
@endsection

@section("script")
    <script src="{{asset('/assets/libs/vue.js')}}"></script>
    <script src="{{asset('/assets/vueJs/apply.js')}}"></script>
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
