<footer>
    @php
        $latest_courses = App\Models\Course::latest()->take(7)->get();
    @endphp
    <div class="container">
        <div class="main">
            <img src="{{asset('/front/assets/imgs/logo-n.png')}}" alt="">
            <p>serves as a beacon of knowledge and expertise, nurturing aspiring media professionals and shaping the
                future of the industry.</p>
            <a href="/#our-major">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-click" width="20"
                     height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M3 12l3 0"/>
                    <path d="M12 3l0 3"/>
                    <path d="M7.8 7.8l-2.2 -2.2"/>
                    <path d="M16.2 7.8l2.2 -2.2"/>
                    <path d="M7.8 16.2l-2.2 2.2"/>
                    <path d="M12 12l9 3l-4 2l-2 4l-3 -9"/>
                </svg>
                Apply now
            </a>
        </div>
        <div class="links">
            <ul>
                <li><h2>Majors</h2></li>
                @foreach ($latest_courses as $course)
                    <li><a href="{{$course->isReady ? '/course/' . $course->id : "#"}}">{{ $course->title }}</a></li>
                @endforeach
            </ul>
            {{-- <ul>
                <li><h2>UMA</h2></li>
                <li><a href="">Comunity</a></li>
                <li><a href="">Video Guides</a></li>
                <li><a href="">Documentation</a></li>
                <li><a href="">Certification</a></li>
                <li><a href="">Scholarships</a></li>
            </ul>
            <ul>
                <li><h2>Links</h2></li>
                <li><a href="">Customer Support</a></li>
                <li><a href="">Terms & Conditions</a></li>
                <li><a href="">Privacy Policy</a></li>
            </ul> --}}
        </div>
    </div>
    <div class="container">
        <span>© 2024 All copyrights reserved 2024</span>
        <span><a href="">UMA</a> powered by <a href="">Clicks</a></span>
    </div>
</footer>
<script src="{{asset('front/assets/js/jquery.js')}}"></script>
<script src="{{asset('front/assets/js/swiper.js')}}"></script>
<script>
    $(function () {

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 16,
            autoplay: true,
            duration: 4000,
            pagination: {
                el: ".swiper-pagination",
            },
        });
        swiper.on('slideChange', function () {
            const actualSlideCount = $('.mySwiper .swiper-slide').length; // Replace with your logic
            if (swiper.activeIndex >= 0 && swiper.activeIndex < actualSlideCount) {
                console.log('Current slide index:', swiper.activeIndex);
                $(".test-card." + swiper.activeIndex).fadeIn()
                $(".test-card." + swiper.activeIndex).siblings(".test-card").fadeOut('fast')
            }
        });
    })
</script>
