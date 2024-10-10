@extends('front.layout.master')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    @if((isset($settingsArray['isShowHero']) && $settingsArray['isShowHero']["value"]) || !isset($settingsArray['isShowHero']))
    <section class="hero">
        <div class="container">
            <div class="content">
                <h1>{{$settingsArray['shape_section_title']['value']}}</h1>
                <p>
                    {{$settingsArray['shape_section_description']['value']}}
                </p>
                {{-- <form id="signupForm">
                    <input type="email" name="email" id="email" placeholder="Your email address" required>
                    <button>Sign Up</button>
                </form> --}}
            </div>
            <div class="img">
                <img
                    src="{{ $settingsArray['shape_section_image']['media_url'] }}"
                    alt="hero img">
                <img src="{{asset('front/assets/imgs/triangle.png')}}" alt="triangle" class="triangle">
                <img src="{{asset('front/assets/imgs/close.png')}}" alt="close" class="close">
            </div>
        </div>
        <div class="container">
            <a href="#our-major" style="color: #000;text-decoration: none;display:block;margin: auto;">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mouse" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 3m0 4a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-4a4 4 0 0 1 -4 -4z"/>
                        <path d="M12 7l0 4"/>
                    </svg>
                    Scroll Down
                </span>
            </a>
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowPresedintSection']) && $settingsArray['isShowPresedintSection']["value"]) || !isset($settingsArray['isShowPresedintSection']))
    <section class="presedentSection">
        <div class="container">
            <div class="img">
                <img src="{{ $settingsArray['persident_img']['media_url'] ?? asset('/assets/media/persident_img-placeholder.png') }}">
                <div class="breif">
                    <h1>
                        {{$settingsArray['presedent_name']['value'] }}
                    </h1>
                    <p>
                    {{$settingsArray['presedent_position']['value'] }}
                    </p>
                </div>
            </div>
            <div class="text">
                <svg width="42" height="36" viewBox="0 0 42 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M42 0.355L40.9401 7.85229C38.8202 7.67691 37.0978 8.02766 35.7729 8.90454C34.4479 9.73757 33.5205 10.9652 32.9905 12.5874C32.5047 14.1658 32.4164 16.0072 32.7256 18.1117H42V36H23.9811V18.1117C23.9811 11.7982 25.4606 7.01926 28.4196 3.77482C31.3785 0.486533 35.9054 -0.653407 42 0.355ZM18.0189 0.355L16.959 7.85229C14.8391 7.67691 13.1167 8.02766 11.7918 8.90454C10.4669 9.73757 9.53943 10.9652 9.00946 12.5874C8.52366 14.1658 8.43533 16.0072 8.74448 18.1117H18.0189V36H0V18.1117C0 11.7982 1.4795 7.01926 4.43849 3.77482C7.39748 0.486533 11.9243 -0.653407 18.0189 0.355Z" fill="#5BA8D9"/>
                </svg>
                <p>
                    {!! $settingsArray['presedent_word_part']['value'] !!}
                </p>
                <a href="/president-word">Read Chairperson Biography </a>
            </div>
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowAbout']) && $settingsArray['isShowAbout']["value"]) || !isset($settingsArray['isShowAbout']))
    <section class="our-aim about-sec">
        <div class="container">
            <div class="body" style="margin-top: 0">
                <div class="items_wrapper">
                    <a href="" class="item-card" style="min-width: 100%">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="20"
                                 height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                                <path d="M3 6l0 13"/>
                                <path d="M12 6l0 13"/>
                                <path d="M21 6l0 13"/>
                            </svg>
                        </div>
                        <h2 style="margin-bottom: 12px !important">UMA Vision</h2>
                        <p>
                            {!! $settingsArray['uma_vision']['value'] !!}
                        </p>
                    </a>
                    <a href="" class="item-card" style="min-width: 100%">
                        <div class="icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_292_4969)">
                                <path d="M12 24C10.34 24 8.78 23.6848 7.32 23.0544C5.86 22.424 4.59 21.5692 3.51 20.49C2.43 19.4108 1.5752 18.1408 0.945601 16.68C0.316002 15.2192 0.000801519 13.6592 1.51899e-06 12C-0.000798481 10.3408 0.314402 8.7808 0.945601 7.32C1.5768 5.8592 2.4316 4.5892 3.51 3.51C4.5884 2.4308 5.8584 1.576 7.32 0.9456C8.7816 0.3152 10.3416 0 12 0C13.6584 0 15.2184 0.3152 16.68 0.9456C18.1416 1.576 19.4116 2.4308 20.49 3.51C21.5684 4.5892 22.4236 5.8592 23.0556 7.32C23.6876 8.7808 24.0024 10.3408 24 12C23.9976 13.6592 23.6824 15.2192 23.0544 16.68C22.4264 18.1408 21.5716 19.4108 20.49 20.49C19.4084 21.5692 18.1384 22.4244 16.68 23.0556C15.2216 23.6868 13.6616 24.0016 12 24ZM12 21.6C14.68 21.6 16.95 20.67 18.81 18.81C20.67 16.95 21.6 14.68 21.6 12C21.6 9.32 20.67 7.05 18.81 5.19C16.95 3.33 14.68 2.4 12 2.4C9.32 2.4 7.05 3.33 5.19 5.19C3.33 7.05 2.4 9.32 2.4 12C2.4 14.68 3.33 16.95 5.19 18.81C7.05 20.67 9.32 21.6 12 21.6ZM12 19.2C10 19.2 8.3 18.5 6.9 17.1C5.5 15.7 4.8 14 4.8 12C4.8 10 5.5 8.3 6.9 6.9C8.3 5.5 10 4.8 12 4.8C14 4.8 15.7 5.5 17.1 6.9C18.5 8.3 19.2 10 19.2 12C19.2 14 18.5 15.7 17.1 17.1C15.7 18.5 14 19.2 12 19.2ZM12 16.8C13.32 16.8 14.45 16.33 15.39 15.39C16.33 14.45 16.8 13.32 16.8 12C16.8 10.68 16.33 9.55 15.39 8.61C14.45 7.67 13.32 7.2 12 7.2C10.68 7.2 9.55 7.67 8.61 8.61C7.67 9.55 7.2 10.68 7.2 12C7.2 13.32 7.67 14.45 8.61 15.39C9.55 16.33 10.68 16.8 12 16.8ZM12 14.4C11.34 14.4 10.7752 14.1652 10.3056 13.6956C9.836 13.226 9.6008 12.6608 9.6 12C9.5992 11.3392 9.8344 10.7744 10.3056 10.3056C10.7768 9.8368 11.3416 9.6016 12 9.6C12.6584 9.5984 13.2236 9.8336 13.6956 10.3056C14.1676 10.7776 14.4024 11.3424 14.4 12C14.3976 12.6576 14.1628 13.2228 13.6956 13.6956C13.2284 14.1684 12.6632 14.4032 12 14.4Z" fill="#F8F8F8"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_292_4969">
                                <rect width="24" height="24" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <h2  style="margin-bottom: 12px !important">UMA Mission</h2>
                        <p>
                            {!! $settingsArray['uma_mission']['value'] !!}
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    @php
        $latest_courses = App\Models\Course::orderBy("home_arrangment", "asc")->where("doesShow", true)->get();
    @endphp
    @if($latest_courses->count() > 0)
        @if((isset($settingsArray['isShowOurMajor']) && $settingsArray['isShowOurMajor']["value"]) || !isset($settingsArray['isShowOurMajor']))

        <section class="our-major" id="our-major">
            <div class="container">
                <div class="head">
                    <img src="{{asset('front/assets/imgs/sec-head.png')}}?v={{time()}}" alt="logo short">
                    <h1>
                        Our
                        <br>
                        <span>
                            Programs
                        </span>
                    </h1>
                </div>
                    <div class="courses_wrapper" style="display: block">
                        <div class="swiper mySwiper2" style="width: 100%">
                            <div class="swiper-wrapper">

                                    @foreach ($latest_courses as $course)
                                        <a href="{{$course->isReady ? '/course/' . $course->id : "#"}}" class="course_card swiper-slide {{$course->isReady ? '' : 'coming-soon'}}">
                                            <div class="img">
                                                <img src="{{ $course->hasMedia() ? $course->getFirstMediaUrl() :  '' }}" alt="">
                                                <span class="date">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month"
                                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"/>
                                                        <path d="M16 3v4"/>
                                                        <path d="M8 3v4"/>
                                                        <path d="M4 11h16"/>
                                                        <path d="M7 14h.013"/>
                                                        <path d="M10.01 14h.005"/>
                                                        <path d="M13.01 14h.005"/>
                                                        <path d="M16.015 14h.005"/>
                                                        <path d="M13.015 17h.005"/>
                                                        <path d="M7.01 17h.005"/>
                                                        <path d="M10.01 17h.005"/>
                                                    </svg>
                                                    Start {{ Carbon\Carbon::parse($course->started_at)->format('F jS') }}
                                                </span>
                                            </div>
                                            <div class="text">
                                                <h3>{{ $course->title }}</h3>
                                                <span class="time">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-filled"
                                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 2.66a1 1 0 0 0 -.993 .883l-.007 .117v5l.009 .131a1 1 0 0 0 .197 .477l.087 .1l3 3l.094 .082a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-2.707 -2.708v-4.585l-.007 -.117a1 1 0 0 0 -.993 -.883z"
                                                            stroke-width="0" fill="currentColor"/>
                                                    </svg>
                                                    {{ $course->duration }} + hour
                                                </span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>

                            </div>

                        </div>
                    </div>
            </section>
        @endif
    @endif

    {{-- @php
        $latest_majors = App\Models\Major::orderBy("home_arrangment", "asc")->get();
    @endphp
    @if($latest_majors->count() > 0)
        @if((isset($settingsArray['isShowOurMajor']) && $settingsArray['isShowOurMajor']["value"]) || !isset($settingsArray['isShowOurMajor']))

        <section class="our-major" id="our-major">
            <div class="container">
                <div class="head">
                    <img src="{{asset('front/assets/imgs/sec-head.png')}}?v={{time()}}" alt="logo short">
                    <h1>
                        Our
                        <br>
                        <span>
                            Programs
                        </span>
                    </h1>
                </div>
                    <div class="courses_wrapper" style="display: block">
                        <div class="swiper mySwiper2" style="width: 100%">
                            <div class="swiper-wrapper">

                                    @foreach ($latest_majors as $major)
                                        <a href="{{$major->isReady ? '/major/' . $major->id : "#"}}" class="course_card swiper-slide {{$major->isReady ? '' : 'coming-soon'}}">
                                            <div class="img">
                                                <img src="{{ $major->hasMedia() ? $major->getFirstMediaUrl() :  '' }}" alt="">
                                                <span class="date">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-month"
                                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"/>
                                                        <path d="M16 3v4"/>
                                                        <path d="M8 3v4"/>
                                                        <path d="M4 11h16"/>
                                                        <path d="M7 14h.013"/>
                                                        <path d="M10.01 14h.005"/>
                                                        <path d="M13.01 14h.005"/>
                                                        <path d="M16.015 14h.005"/>
                                                        <path d="M13.015 17h.005"/>
                                                        <path d="M7.01 17h.005"/>
                                                        <path d="M10.01 17h.005"/>
                                                    </svg>
                                                    Start {{ Carbon\Carbon::parse($major->started_at)->format('F jS') }}
                                                </span>
                                            </div>
                                            <div class="text">
                                                <h3>{{ $major->title }}</h3>
                                                <span class="time">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-filled"
                                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path
                                                            d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 2.66a1 1 0 0 0 -.993 .883l-.007 .117v5l.009 .131a1 1 0 0 0 .197 .477l.087 .1l3 3l.094 .082a1 1 0 0 0 1.226 0l.094 -.083l.083 -.094a1 1 0 0 0 0 -1.226l-.083 -.094l-2.707 -2.708v-4.585l-.007 -.117a1 1 0 0 0 -.993 -.883z"
                                                            stroke-width="0" fill="currentColor"/>
                                                    </svg>
                                                    {{ $major->duration }} + hour
                                                </span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>
                    </div>
            </section>
        @endif
    @endif
 --}}
    @if((isset($settingsArray['isShowOurAim']) && $settingsArray['isShowOurAim']["value"]) || !isset($settingsArray['isShowOurAim']))
    <section class="our-aim">
        <div class="container">
            <div class="head">
                <div class="text">
                    <span>OUR AIM</span>
                    <h1>{{ $settingsArray['our_aim_title']['value'] }}</h1>
                    <p>{{ $settingsArray['our_aim_description']['value'] }}</p>
                </div>
                <form action="">
                    <h3>What we Also offer</h3>
                    <button class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book-2" width="20"
                             height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z"/>
                            <path d="M19 16h-12a2 2 0 0 0 -2 2"/>
                            <path d="M9 8h6"/>
                        </svg>
                        Tailored Courses
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-smart-home"
                             width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path
                                d="M19 8.71l-5.333 -4.148a2.666 2.666 0 0 0 -3.274 0l-5.334 4.148a2.665 2.665 0 0 0 -1.029 2.105v7.2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-7.2c0 -.823 -.38 -1.6 -1.03 -2.105"/>
                            <path d="M16 15c-2.21 1.333 -5.792 1.333 -8 0"/>
                        </svg>
                        UMA Bootcamp
                    </button>
                </form>
            </div>
            <div class="body">
                <div class="items_wrapper">
                    <a href="" class="item-card">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="20"
                                 height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"/>
                                <path d="M3 6l0 13"/>
                                <path d="M12 6l0 13"/>
                                <path d="M21 6l0 13"/>
                            </svg>
                        </div>
                        <h2>Main Programs</h2>
                        <p>{{ $settingsArray['main_majors_description']['value'] }}</p>
                    </a>
                    <a href="" class="item-card">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-player-play"
                                 width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M7 4v16l13 -8z"/>
                            </svg>
                        </div>
                        <h2>Online Courses</h2>
                        <p>{{ $settingsArray['online_courses_description']['value'] }}</p>
                    </a>
                    <a href="" class="item-card">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-award"
                                 width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 9m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0"/>
                                <path d="M12 15l3.4 5.89l1.598 -3.233l3.598 .232l-3.4 -5.889"/>
                                <path d="M6.802 12l-3.4 5.89l3.598 -.233l1.598 3.232l3.4 -5.889"/>
                            </svg>
                        </div>
                        <h2>Masterclass</h2>
                        <p>{{ $settingsArray['masterclass_description']['value'] }}</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowFeaturedCourses']) && $settingsArray['isShowFeaturedCourses']["value"]) || !isset($settingsArray['isShowFeaturedCourses']))
    <section class="featured-courses">
        <div class="container">
            <div class="head">
                <span>Featured Courses</span>
                <h1>Browse Our Popular Courses</h1>
                <p>Egestas faucibus nisl et ultricies. Tempus lectus condimentum tristique mauris id vitae. Id pulvinar
                    a eget vitae pellentesque ridiculus platea. Vulputate cursus.</p>
            </div>
            <div class="courses_wrapper">
                <a href="" class="course-card">
                    <div class="img">
                        <img src="{{ asset('front/assets/imgs/courses/course-8.jpeg') }}" alt="">
                    </div>
                    <span class="cat">Writing</span>
                    <h3>Scenario Writing</h3>
                    <div class="details">
                        <span>
                            12 video
                        </span>
                        <span>
                            24 hr 40 mins
                        </span>
                    </div>
                </a>
                <a href="" class="course-card">
                    <div class="img">
                        <img src=" {{asset('front/assets/imgs/courses/course-9.jpeg')}} " alt="">
                    </div>
                    <span class="cat">Digital Content</span>
                    <h3>Social Media</h3>
                    <div class="details">
                        <span>
                            8 video
                        </span>
                        <span>
                            12 hr 10 mins
                        </span>
                    </div>
                </a>
                <a href="" class="course-card">
                    <div class="img">
                        <img src=" {{ asset('front/assets/imgs/courses/course-3.jpeg') }} " alt="">
                    </div>
                    <span class="cat">Digital Content</span>
                    <h3>Short videos</h3>
                    <div class="details">
                        <span>
                            4 video
                        </span>
                        <span>
                            5 hr 40 mins
                        </span>
                    </div>
                </a>
            </div>
            {{--<a href="" class="explore">Explore All Courses</a>--}}
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowHowItworks']) && $settingsArray['isShowHowItworks']["value"]) || !isset($settingsArray['isShowHowItworks']))
    <section class="our-aim how-it-work">
        <div class="container">
            <div class="head">
                <div class="text">
                    <span>How It Works</span>
                    <h1>{!! $settingsArray['how_it_works_title']['value'] !!}</h1>
                    <p>{{ $settingsArray['how_it_works_description']['value'] }}</p>
                </div>
            </div>
            <div class="body">
                <div class="statistics_wrapper">
                    <div class="step-card">
                        <div class="head">
                            <h1>01</h1>
                            <div class="line"></div>
                        </div>
                        <h1>{{ $settingsArray['how_it_works_step_one_title']['value'] }}</h1>
                        <p>{{ $settingsArray['how_it_works_step_one_description']['value'] }}</p>
                    </div>
                    <div class="step-card">
                        <div class="head">
                            <h1>02</h1>
                            <div class="line"></div>
                        </div>
                        <h1>{{ $settingsArray['how_it_works_step_two_title']['value'] }}</h1>
                        <p>{{ $settingsArray['how_it_works_step_two_description']['value'] }}</p>
                    </div>
                    <div class="step-card">
                        <div class="head">
                            <h1>03</h1>
                            <div class="line"></div>
                        </div>
                        <h1>{{ $settingsArray['how_it_works_step_three_title']['value'] }}</h1>
                        <p>{{ $settingsArray['how_it_works_step_three_description']['value'] }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowStatistics']) && $settingsArray['isShowStatistics']["value"]) || !isset($settingsArray['isShowStatistics']))
    <section class="statistics">
        <div class="container">
            @foreach($statistics as $statistic)
                <div>
                    <h1>{{ $statistic->value }}</h1>
                    <span>{{ $statistic->title }}</span>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowTestemonials']) && $settingsArray['isShowTestemonials']["value"]) || !isset($settingsArray['isShowTestemonials']))
    <section class="testemonials">
        <div class="container">
            <div class="swiper mySwiper mySwiperTest">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="{{ $testimonial->getFirstMediaUrl() }}" alt="{{ $testimonial->username }}">
                                <div class="text">
                                    {{ $testimonial->username }}
                                    <span>
                                    {{ $testimonial->_name }}
                                </span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="text_wrapper">
                @foreach($testimonials as $testimonial)
                    <div class="test-card {{ $loop->index }}">
                        <img src="  {{asset('front/assets/imgs/Icon.png')}}?v={{time()}}" alt="">
                        <h4>{{ $testimonial->title }}</h4>
                        <p>{{ $testimonial->description }}</p>
                    </div>
                @endforeach
                <a href="">Read More Testimonials</a>
            </div>
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowOurParteners']) && $settingsArray['isShowOurParteners']["value"]) || !isset($settingsArray['isShowOurParteners']))
    <section class="our-parteners">
        <div class="container">
            <div class="head">
                <span>Discover</span>
                <h1>Our Partners</h1>
            </div>
            <div style="display: flex; justify-content: center;align-items: center;gap: 24px; flex-wrap: wrap">
                @php
                    $ourParteners = App\Models\Sponsor::all();
                @endphp
                @foreach ($ourParteners as $item)
                <img src="{{$item->image_path}}" alt="" style="width :100px;height: 100px;object-fit: contain">
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if((isset($settingsArray['isShowNeverMiss']) && $settingsArray['isShowNeverMiss']["value"]) || !isset($settingsArray['isShowNeverMiss']))
    <section class="featured-courses subscribe">
        <div class="container">
            <div class="head">
                <span>Never miss any update</span>
                <h1>{{ $settingsArray['never_miss_update_title']['value'] }}</h1>
                <p>{{ $settingsArray['never_miss_update_description']['value'] }}</p>
            </div>
            <div class="body">
                <div class="items_wrapper">
                    <div class="item">
                        <h1>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="icon icon-tabler icon-tabler-circle-check-filled" width="20" height="20"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                    stroke-width="0" fill="currentColor"/>
                            </svg>
                            7 Programs
                        </h1>
                        <span>Sed purus molestie.</span>
                    </div>
                    <div class="item">
                        <h1>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="icon icon-tabler icon-tabler-circle-check-filled" width="20" height="20"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                    stroke-width="0" fill="currentColor"/>
                            </svg>
                            38 + Instructors
                        </h1>
                        <span>Sed purus molestie.</span>
                    </div>
                    <div class="item">
                        <h1>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="icon icon-tabler icon-tabler-circle-check-filled" width="20" height="20"
                                 viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path
                                    d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z"
                                    stroke-width="0" fill="currentColor"/>
                            </svg>
                            20 Online Course
                        </h1>
                        <span>Sed purus molestie.</span>
                    </div>
                </div>
                <form id="emailForm">
                    <input type="email" name="eamil" id="email" placeholder="@ Enter Email Address">
                    <button>Get Started Now</button>
                </form>

                <div class="note">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="20"
                         height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"/>
                        <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"/>
                        <path d="M8 11v-4a4 4 0 1 1 8 0v4"/>
                    </svg>
                    Your data is completely secure with us. We don't share with anyone.
                </div>
            </div>
        </div>
    </section>
    @endif

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    You have successfully signed up. Thank you!
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Thank you for subscribing.
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('signupForm');
            var emailInput = document.getElementById('email');
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
                if (form.checkValidity()) {
                    // If the form is valid, show success modal
                    successModal.show();
                    form.reset(); // Optionally, reset the form
                } else {
                    // If the form is invalid, focus on the email input field
                    emailInput.focus();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('emailForm');
            var emailInput = document.getElementById('email');
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));

            form.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
                if (form.checkValidity()) {
                    // If the form is valid, show success modal
                    successModal.show();
                    form.reset(); // Optionally, reset the form
                } else {
                    // If the form is invalid, focus on the email input field
                    emailInput.focus();
                }
            });
        });
    </script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

      <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".mySwiperTest", {
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 16,
            autoplay: true,
            loop: true,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                slidesPerView: 3,
                },
                992: {
                slidesPerView: 4,
                },
            },
        });
      </script>

@endsection
