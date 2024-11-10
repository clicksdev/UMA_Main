@extends('front.layout.master')
@section('content')
    @if ($course)
        <div class="page_path">
            <div class="container">
                <a href="/">
                    <span>{{ __('home.home') }}</span>
                </a>
                <span>/</span>
                <a
                    href="/course/apply/{{ $course->id }}">{{ $course['title' . (App::getLocale() == 'ar' ? '_ar' : '')] }}</a>
                <span>/</span>
                <a href="/course/apply/{{ $course->id }}">{{ __('form.overview') }}</a>
            </div>
        </div>

        <div class="overview_wrapper">
            <div class="container">
                {{-- <div class="content_wapper overview_content">
                    <h1>{{$course->title}}</h1>
                    <p>{{ $course->brief }}</p>
                    <img src="{{ $course->hasMedia() ? $course->getFirstMediaUrl() :  '' }}" alt="">
                    <h2>{{ $course->title }} Overview</h2>
                    <p>
                        {{$course->overview}}
                    </p>
                    <br>
                    @if ($course->objectives()->get()->count() > 0)
                        <h2>Program Objectives</h2>
                        <div class="includes">
                            @foreach ($course->objectives()->get() as $obj)

                                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="20"
                         height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l5 5l10 -10"/>
                    </svg>
                    {{$obj->name}}
                </span>
                            @endforeach
                        </div>
                    @endif
                </div> --}}
                @if ($course->levels()->get()->count() > 0)
                    @foreach ($course->levels()->get() as $index => $level)
                        <div class="content_wapper level_{{ $index }}_content">
                            <h1>{{ __('messages.level') }} {{ $index + 1 }}</h1>
                            <img src="{{ $level->hasMedia() ? $level->getFirstMediaUrl() : '' }}" alt="">
                            <h2>{{ $level['title' . (App::getLocale() == 'ar' ? '_ar' : '')] }}
                                {{ __('messages.overview') }}</h2>
                            <p>{{ $level['overview' . (App::getLocale() == 'ar' ? '_ar' : '')] }}</p>
                            <br>
                            @if ($level->objectives()->get()->count() > 0)
                                <h2>{{ __('messages.level_objectives') }}</h2>
                                <div class="includes">
                                    @foreach ($level->objectives()->get() as $obj)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-check" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                            {{ $obj['name' . (App::getLocale() == 'ar' ? '_ar' : '')] }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
                <div class="content_wapper level_{{ $index }}_content">
                    <div class="options_wrapper">
                        <h3>{{ __('messages.Information') }} :</h3>
                        <div class="info overview_content">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M4 11h16" />
                                    <path d="M7 14h.013" />
                                    <path d="M10.01 14h.005" />
                                    <path d="M13.01 14h.005" />
                                    <path d="M16.015 14h.005" />
                                    <path d="M13.015 17h.005" />
                                    <path d="M7.01 17h.005" />
                                    <path d="M10.01 17h.005" />
                                </svg>
                                {{ __('messages.start') }} {{ Carbon\Carbon::parse($course->started_at)->format('F jS') }}
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-award"
                                    width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 9m-6 0a6 6 0 1 0 18 0a6 6 0 0 0 -18 0" />
                                    <path d="M12 15l3.4 5.89l1.598 -3.233l3.598 .232l-3.4 -5.889" />
                                    <path d="M6.802 12l-3.4 5.89l3.598 -.233l1.598 3.232l3.4 -5.889" />
                                </svg>
                                {{ __('messages.certification') }}
                            </span>
                        </div>
                        @if ($course->levels()->count() > 0)
                            @foreach ($course->levels as $index => $level)
                                <div class="info level_{{ $index }}_content">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-clock-hour-3" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M12 12h3.5" />
                                            <path d="M12 7v5" />
                                        </svg>
                                        {{ $level->duration }} {{ __('messages.hours') }}
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-checklist" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8" />
                                            <path d="M14 19l2 2l4 -4" />
                                            <path d="M9 8h4" />
                                            <path d="M9 12h2" />
                                        </svg>
                                        {{ __('messages.exam') }}
                                    </span>
                                </div>
                            @endforeach
                        @endif
                        <div class="info-menu">
                            <div class="head overview_content" style="display: none"></div>
                            @if ($course->levels->count() > 0)
                                @foreach ($course->levels as $index => $level)
                                    <div class="head level_{{ $index }}_content">
                                        <span>{{ __('messages.program') }} {{ $index + 1 }}</span>
                                        <span>{{ $level->duration }} {{ __('messages.hours') }}</span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="btns">
                                <button class="overview_btn" for-show="overview_content">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-info-circle" width="20" height="20"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                            <path d="M12 9h.01" />
                                            <path d="M11 12h1v4h1" />
                                        </svg>
                                    </div>
                                    {{ __('messages.overview') }}
                                </button>
                                @if ($course->levels->count() > 0)
                                    @foreach ($course->levels as $index => $level)
                                        <button for-show="level_{{ $index }}_content">
                                            <div class="icon">{{ $index + 1 }}</div>
                                            {{ $level['title' . (App::getLocale() == 'ar' ? '_ar' : '')] }}
                                        </button>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if ($course->isReady)
                            <a href="/course/apply/{{ $course->id }}" class="apply"
                                style="display: block;text-decoration: none">
                                {{ __('messages.apply_now') }}
                            </a>
                        @else
                            <h3 style="text-align: center;margin-top: 16px;font-weight: 400;">
                                {{ __('messages.coming_soon') }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @php
            $latest_courses = App\Models\Course::all();
        @endphp
        @if ($latest_courses->count() > 0)
            <section class="our-major course-overview-our-major">
                <div class="container">
                    <div class="head">
                        <span>{{ __('messages.other_programs') }}</span>
                        <h1>
                            {{ __('messages.browse_our_programs') }}
                        </h1>
                    </div>
                    <div class="courses_wrapper">
                        @foreach ($latest_courses as $course)
                            <a href="{{ $course->isReady ? '/course/' . $course->id : '#' }}"
                                class="course_card swiper-slide {{ $course->isReady ? '' : 'coming-soon' }}">
                                <div class="img">
                                    <img src="{{ $course->hasMedia() ? $course->getFirstMediaUrl() : '' }}"
                                        alt="{{ __('home.course_image_alt') }}">
                                    <span class="date">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-calendar-month" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                            <path d="M16 3v4" />
                                            <path d="M8 3v4" />
                                            <path d="M4 11h16" />
                                            <path d="M7 14h.013" />
                                            <path d="M10.01 14h.005" />
                                            <path d="M13.01 14h.005" />
                                            <path d="M16.015 14h.005" />
                                            <path d="M13.015 17h.005" />
                                            <path d="M7.01 17h.005" />
                                            <path d="M10.01 17h.005" />
                                        </svg>
                                        {{ __('home.start') }}
                                        {{ Carbon\Carbon::parse($course->started_at)->format(__('home.date_format')) }}
                                    </span>
                                </div>
                                <div class="text">
                                    <h3>{{ $course['title' . (App::getLocale() == 'ar' ? '_ar' : '')] }}</h3>
                                    <span class="time">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-clock-filled" width="20"
                                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 2.66a1 1 0 0 0 -.993 .883l-.007 .117v5l.009 .131a1 1 0 0 0 .197 .477l.087 .1l3 3l.094 .082a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-2.707 -2.708v-4.585l-.007 -.117a1 1 0 0 0 -.993 -.883z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                        {{ $course->duration }} {{ __('home.hours') }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="form">
            <div class="container" style="align-items: start;">
                <div>
                    <div class="text">
                        <span>{{ __('messages.questions_and_answers') }}</span>
                        <h1>
                            {{ __('messages.frequently_asked_questions') }}
                        </h1>
                    </div>
                </div>
                <div class="questions_wrapper" style="background-color: #fff;">
                    @if ($course->faq_type == 1)
                        @foreach ($faqs as $faq)
                            <div class="question">
                                <div class="head">
                                    {{ App::getLocale() == 'ar' ? $faq->question_ar : $faq->question }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 9l6 6l6 -6" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 15l6 -6l6 6" />
                                    </svg>
                                </div>
                                <div class="body">
                                    {{ App::getLocale() == 'ar' ? $faq->answer_ar : $faq->answer }}
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach ($course->FAQ()->get() as $faq)
                            <div class="question">
                                <div class="head">
                                    {{ App::getLocale() == 'ar' ? $faq->question_ar : $faq->question }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 9l6 6l6 -6" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 15l6 -6l6 6" />
                                    </svg>
                                </div>
                                <div class="body">
                                    {{ App::getLocale() == 'ar' ? $faq->answer_ar : $faq->answer }}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

    @endif
@endsection

@section('script')
    <script>
        $(".question").on("click", function() {
            $(this).find(".body").slideToggle()
            $(this).find(".head .icon-tabler-chevron-down").fadeToggle()
            $(this).find(".head .icon-tabler-chevron-up").fadeToggle()
        })
        $(".overview_btn").on("click", function() {
            $("a.apply").fadeOut()
        })
        $(".overview_wrapper .container .options_wrapper .info-menu .btns button:not(.overview_btn)").on("click",
            function() {
                $("a.apply").fadeIn().css("display", "block")
            })
        $(".overview_wrapper .container .options_wrapper .info-menu .btns button").on("click", function() {
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

        // Make the first level active by default
        $(".overview_wrapper .container .options_wrapper .info-menu .btns button:not(.overview_btn):first").trigger(
            "click");

        // Show the "Apply" button by default
        $("a.apply").fadeIn().css("display", "block");

        // Remove or hide the "Overview" section by default
        $(".overview_wrapper .container .options_wrapper .info-menu .btns .overview_btn").hide();
    </script>
@endsection
