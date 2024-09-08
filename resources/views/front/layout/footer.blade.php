<footer>
    @php
        $latest_courses = App\Models\Course::latest()->take(7)->get();
    @endphp
    <div class="container">
        <div class="main">
            <img src="{{asset('/front/assets/imgs/logo-n.png')}}" alt="">
            <p>serves as a beacon of knowledge and expertise, nurturing aspiring media professionals and shaping the
                future of the industry.</p>
            <a href="/#our-major" id="apply_btn_footer">
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
                <li><h2>Programs</h2></li>
                @foreach ($latest_courses as $course)
                <li><a href="{{$course->isReady ? '/course/' . $course->id : "#"}}">{{ $course->title }}</a></li>
                @endforeach
            </ul>
            <ul>
                <li><h2>Quick Links</h2></li>
                <li><a href="/our-programs">Our Majors</a></li>
                <li><a href="/contact">Contact Us</a></li>
                <li><a href="/privacy-policy">Privacy Policy</a></li>
                <li><a href="/terms-and-conditions">Terms and Conditions</a></li>
                <li style="display: flex">
                    @if((isset($settingsArray['facebook_link']) && $settingsArray['facebook_link']["value"]))
                    <a href="{{isset($settingsArray['facebook_link']) && $settingsArray['facebook_link']["value"] ? $settingsArray['facebook_link']["value"] : ''}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </a>
                    @endif
                    @if((isset($settingsArray['instagram_link']) && $settingsArray['instagram_link']["value"]))
                    <a href="{{isset($settingsArray['instagram_link']) && $settingsArray['instagram_link']["value"]  ? $settingsArray['instagram_link']["value"] : ''}}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M16.5 7.5l0 .01" />
                        </svg>
                    </a>
                    @endif
                    @if((isset($settingsArray['twitter_link']) && $settingsArray['twitter_link']["value"]))
                    <a href="{{(isset($settingsArray['twitter_link']) && $settingsArray['twitter_link']["value"])  ? $settingsArray['twitter_link']["value"] : ''}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                            </svg>
                        </a>
                    @endif
                </li>
            </ul>
            {{-- <ul>
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
        $('.toggle_more').on('click', function() {
            $('.more').toggleClass('open')
        })
    })
</script>
