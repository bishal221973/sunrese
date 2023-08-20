<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="w-100 d-flex justify-content-between">
        <div class="w-100 d-flex justify-content-between">
           <div class="d-flex">
            <button style="width: 40px" class="btn bg-transparent menu-toggle" id="toggle"><i class="fa-solid fa-bars"></i></button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ App\Models\WebSetting::first() ? App\Models\WebSetting::first()->app_short_name : '' }}
            </a>
           </div>
            <div class="px-5" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>



    </div>
</nav>
