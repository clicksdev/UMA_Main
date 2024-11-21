<header>
    {{-- <div class="top" style="position: fixed; width: 100%;top: 0; left: 0;z-index: 999999">
        <a href="/#apply_btn_footer">
            Unlock your potential and apply now
        </a>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-arrow-right" width="20"
            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M12 3a9 9 0 1 0 0 18a9 9 0 0 0 0 -18" />
            <path d="M16 12l-4 -4" />
            <path d="M16 12h-8" />
            <path d="M12 16l4 -4" />
        </svg>
    </div> --}}
    @php
        $latest_courses = App\Models\Course::latest()->get();
        $latest_work_shops = App\Models\Course::withoutGlobalScope('excludeWorkShop')->where('course_type', 'work_shop')->latest()->get();
    @endphp
    <nav>
        <div class="container" style="display: flex;justify-content: space-between">
            <a href="/">
                <img src="{{ $settingsArray['logo']['media_url'] }}" alt="logo" class="logo">
            </a>
            {{-- <div class="links">
                <a href="/" class="active">Home</a>
                <a href="#">Who we are</a>
                <a href="#">Programs</a>
                <a href="#">Learn Online</a>
                <a href="#">UMA</a>
                <a href="#">Helpful links</a>
                <a href="#">Contact</a>
            </div>
            <span></span> --}}
            <div style="display: flex;align-items: center;gap: 32px" class="nav-side-wrapper">
                <button
                    class="toggle_more"
                    style="cursor: pointer;position: relative;display: flex;  height: 40px;align-items: center;background: #8080800e;border: none;border-radius: 0;padding: 7px;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 8l16 0"></path>
                        <path d="M4 16l16 0"
                            style="/*! display: flex; *//*! align-items: center; *//*! background: #8080803b; */"></path>
                    </svg>
                    <ul class="more">
                        <li><a href="/">{{ __('home.home') }}</a></li>
                        {{-- <li><a href="/about-us">About us</a></li> --}}
                        <li>
                            <a href="/our-programs" class="our-programs-link">
                                {{ __('home.programs') }}
                                <div class="showed">
                                    <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </div>
                                <div class="hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                        <path d="M6 15l6 -6l6 6"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="programs-more" style="padding-left: 30px;font-size: 14px;list-style: disc;display:none">
                                @foreach ($latest_courses as $course)
                                <li><a href="{{$course->isReady ? '/course/' . $course->id : "#"}}">{{ $course['title' . (App::getLocale() == 'ar' ? "_ar" : '')] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @if((isset($settingsArray['isShowOurWorkShops']) && $settingsArray['isShowOurWorkShops']["value"]) || !isset($settingsArray['isShowOurWorkShops']))
                        <li>
                            <a href="/our-work-shops" class="our-programs-link">
                                {{ __('home.work_shops') }}
                                <div class="showed">
                                    <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </div>
                                <div class="hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" x-bind:width="size" x-bind:height="size" viewBox="0 0 24 24" fill="none" stroke="currentColor" x-bind:stroke-width="stroke" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                        <path d="M6 15l6 -6l6 6"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="programs-more" style="padding-left: 30px;font-size: 14px;list-style: disc;display:none">
                                @foreach ($latest_work_shops as $course)
                                <li><a href="{{$course->isReady ? '/course/' . $course->id : "#"}}">{{ $course['title' . (App::getLocale() == 'ar' ? "_ar" : '')] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endif
                        <li><a href="/contact">{{ __('home.contact') }}</a></li>
                    </ul>
                </button>
                <div class="language-switcher">
                    @if(App::getLocale() == 'ar')
                    <a href="{{ route('set.language', 'en') }}" style='color: #000;border: 1px solid;padding: 4px 17px;  font-weight: bold;'>English</a>
                    @else
                    <a href="{{ route('set.language', 'ar') }}" style='color: #000;  font-family: "Cairo", sans-serif;border: 1px solid;padding: 4px 17px;  font-weight: bold;'>العربية</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
