<div class="sidebar" id="sidebar">
    <div class="logo-details">
        <a href="{{route('home')}}" class="w-100">
            @if (App\Models\WebSetting::first())
            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\WebSetting::first()->app_logo }}" />
        @else
            <img src="{{ asset('image/logo.png') }}">
        @endif
        </a>

    </div>

    <div class="btn-close btn bg-info" id="btnClose">X</div>

    <ul class="nav-links">
        <li>
            <a href="{{route('home')}}">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>

        </li>

        <li>
            <a href="{{ route('tag') }}">
                <i class="fa-solid fa-tag"></i>
                <span class="link_name">Tags</span>
            </a>
        </li>
        {{-- <li>
            <a href="{{ route('subcategory') }}">
                <i class="fa-solid fa-layer-group"></i>
                <span class="link_name">Sub Category</span>
            </a>
        </li> --}}

        <li>
            <a href="{{ route('profile') }}">
                <i class="fa-solid fa-address-card"></i>
                <span class="link_name">Artist</span>
            </a>
        </li>

       

        <li>
            <a href="#" class="d-flex align-items-center justify-content-between arrow">
                <div class="d-flex align-items-center">
                    <i class="fa-brands fa-blogger-b"></i>
                    <span class="link_name">विचार</span>
                </div>
                <i class='bx bxs-chevron-down arrow'></i>

            </a>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">विचार</a></li>
                <li><a href="{{ route('blog') }}">List Blog</a></li>
                <li><a href="{{ route('create.blog') }}">Add Blog</a></li>
             </ul>

        </li>

        <li>
            <a href="#" class="d-flex align-items-center justify-content-between arrow">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-radio"></i>
                    <span class="link_name">Posts</span>
                </div>
                <i class='bx bxs-chevron-down arrow'></i>

            </a>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Posts</a></li>
                <li><a href="{{ route('post') }}">List Post</a></li>
                <li><a href="{{ route('post.create') }}">Add Post</a></li>
             </ul>

        </li>
        <li>
            <a href="{{ route('video') }}" class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-video"></i>
                    <span class="link_name">Videos</span>
                </div>
            </a>
        </li>

        <li>
            <a href="{{ route('header.ads') }}" class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-rectangle-ad"></i>
                    <span class="link_name">Ads</span>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="d-flex align-items-center justify-content-between arrow">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-users"></i>
                    <span class="link_name">Users</span>
                </div>
                <i class='bx bxs-chevron-down arrow'></i>

            </a>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Users</a></li>
                <li><a href="{{ route('user') }}">List Users</a></li>
                <li><a href="{{ route('user.create') }}">Add Users</a></li>
             </ul>

        </li>

        <li>
            <a href="{{ route('setting') }}">
                <i class='bx bx-cog'></i>
                <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="">Setting</a></li>
            </ul>
        </li>
        {{-- <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="image/profile.jpg" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name">Prem Shahi</div>
                    <div class="job">Web Desginer</div>
                </div>
                <i class='bx bx-log-out'></i>
            </div>
        </li> --}}
    </ul>
    
</div>

