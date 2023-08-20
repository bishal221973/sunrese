<div class="w-100 menu mb-3 px-3" id="menu">
    <div class="d-flex justify-content-between menu-container align-items-center">
        <div class="d-flex main-menu">
            <div class="menu-list d-flex">
                <div class="menu-item">
                    <a href="{{ route('home.web') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">होमपेज</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('news') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">समाचार</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('province.all') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">प्रदेश</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('interview') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">अन्तर्वार्ता</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('blog.all') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">विचार</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('agriculture') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">कृषि</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('feature') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">फिचर</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('health') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">स्वास्थ्य</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('saptaranga') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">कला साहित्य</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('international') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">अन्तर्राष्ट्रिय</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('rochak') }}"
                        class="text-uppercase text-white text-decoration-none fw-bold khanda">रोचक</a>
                </div>
            </div>
        </div>

     {{-- <div class="search-input-secton">
        <input type="text" class="search-input">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
     </div> --}}
    </div>
</div>
<script>
    window.addEventListener("scroll", function() {
        var menu = document.getElementById('menu');
        var start = document.getElementById('start');
        // if (window.pageYOffset > 155) {
        //     start.classList.add("active");
        //     menu.classList.add("active");
        // } else {
        //     menu.classList.remove("active");
        //     start.classList.remove("active");

        // }
    });
</script>