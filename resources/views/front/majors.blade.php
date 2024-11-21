@extends('front.layout.master')

@section('content')
    @php
    $latest_courses = App\Models\Course::latest()->where("doesShow", true)->paginate(16); // 10 courses per page
    if (isset($work_shops) && $work_shops)
    $latest_courses = App\Models\Course::withoutGlobalScope('excludeWorkShop')->where('course_type', 'work_shop')->latest()->where("doesShow", true)->paginate(16); // 10 courses per page
    @endphp
    <!-- Bootstrap 4 CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <section class="our-major" id="our-major">
        <div class="container">
            <div class="head">
                <img src="{{asset('front/assets/imgs/sec-head.png')}}?v={{time()}}" alt="logo short">
                <h1>
                    {{ __('home.our') }}
                    <br>
                    <span>
                        {{ isset($work_shops) && $work_shops ? __('home.work_shops') : __('home.programs') }}
                    </span>
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

            <!-- Pagination Links -->
            <div class="pagination-links d-flex justify-content-center mt-5">
                {{ $latest_courses->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
