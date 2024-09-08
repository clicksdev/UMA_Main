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
    <nav>
        <div class="container" style="display: flex;justify-content: space-between">
            <a href="/">
                <img src="{{ $settingsArray['logo']['media_url'] }}" alt="logo" class="logo">
            </a>
            {{-- <div class="links">
                <a href="/" class="active">Home</a>
                <a href="#">Who we are</a>
                <a href="#">Majors</a>
                <a href="#">Learn Online</a>
                <a href="#">UMA</a>
                <a href="#">Helpful links</a>
                <a href="#">Contact</a>
            </div>
            <span></span> --}}
            <button
                class="toggle_more"
                style="cursor: pointer;position: relative;display: flex;align-items: center;background: #8080800e;border: none;border-radius: 0;padding: 7px;">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M4 8l16 0"></path>
                    <path d="M4 16l16 0"
                        style="/*! display: flex; *//*! align-items: center; *//*! background: #8080803b; */"></path>
                </svg>
                <ul class="more">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About us</a></li>
                    <li><a href="/our-programs">Programs</a></li>
                    <li><a href="/contact">Contact Us</a></li>
                </ul>
            </button>
        </div>
    </nav>
</header>
