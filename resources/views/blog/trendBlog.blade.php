
@extends('front.app')
@section('content')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
        nonce="xIfGFgVN"></script>
    @include('components.front.header')
    @include('components.front.menu')
    <div class="social-media-section">
        <a href="#" class="text-decoration-none"><i class="fa-brands fa-facebook-f" style="color: #3b5998"></i></a>
        <a href="#" class="text-decoration-none"><i class="fa-brands fa-twitter" style="color:#00acee"></i></a>
        <a href="#" class="text-decoration-none"><i class="fa-brands fa-youtube" style="color:#FF0000"></i></a>
    </div>

    <div class="w-100">
        <div class="d-flex artist-main-menu px-5">
            <div class="artist-menu-list d-flex">
                @foreach ($Profiles as $profile)
                    <div class="artist-menu-item mr-3">
                        <a href="{{ route('trend',$profile->id) }}" class="text-dark text-decoration-none khanda">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ $profile->profile }}" width="30px"
                                height="30px" style="border-radius: 50%" />
                            <small>{{ $profile->name }}</small>
                        </a>
                    </div>
                @endforeach
    
    
    
            </div>
        </div>
        <hr>
    </div>

    <div class="container-fluid">
       
       
        {{-- <div class="list-header bg-success">
            <div class="d-flex list-header-items">
                <div class="card px-3 py-1 border-0 ml-3">
                    <div>All</div>
                </div>
                @foreach ($subCategories as $subCategory)
                    <div class="card px-3 py-1 bg-danger border-0">
                        {{ $subCategory->name }}
                    </div>
                @endforeach
            </div>
        </div> --}}
        <div class="row px-2">
            <div class="col-xl-1 col-lg-1 pr-3" style="padding: 0">
                @foreach (App\Models\Ad::where('location', 'All page left')->get() as $item)
                    <div class="w-100 mb-3" data-aos="fade-up">

                        <div class="square d-flex justify-content-end">

                            <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" width="100%"
                                height="100%" />
                        </div>
                    </div>
                @endforeach
            </div>
            

            <div class="col-xl-8 col-lg-8 colmd-12">

                {{-- Ads --}}
                <div class="container-fluid mb-4 mt-2" style="padding: 0">
                    <div class="d-flex justify-content-center bg-info">
                        @if (App\Models\Ad::where('location', 'Below of Menu')->first())
                            <a href="{{ App\Models\Ad::where('location', 'Below of Menu')->first()->url }}"
                                class="auto-size-banner bg-warning">
                                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Below of Menu')->first()->image }}"
                                    width="100%" />
                            </a>
                        @endif
                    </div>
                </div>
               @isset($subCategories[0])
               <div class="list-header mb-3" style="padding: 0;margin:0">
                <div class="d-flex sub-main-menu">
                    <div class="menu-list d-flex">
                        <div class="sub-menu-item {{$selected ? '' : 'active'}}">
                            <a href="{{ route('province.all') }}"
                                class="text-uppercase text-decoration-none fw-bold khanda">सम्पुर्ण प्रदेश</a>
                        </div>
                        @foreach ($subCategories as $subCategory)
                            
                        <div class="sub-menu-item {{$subCategory->id== '10' ? 'd-none' : ''}} {{$selected  ==$subCategory->id ? 'active' : ''}}">
                            <a href="{{ route('province.id',$subCategory->id) }}"
                            class="text-uppercase  text-decoration-none fw-bold khanda">{{$subCategory->name}}</a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
               @endisset
                {{-- @isset($post) --}}
                  
<div class="post-list-latest-card-section mb-4">
    <div class="row  d-flex align-items-center h-100" style="padding: 0">
        @foreach ($blogs->blog as $post)
            <div class="col-xl-7 col-lg-7 col-md-7 h-100" style="padding: 0;min-height:400px">
                @php
                    $postId = $post->id;
                @endphp
                <a href="{{ route('blog.detail', $post->id) }}" class="card entertainment-card bg-transparent h-100"
                    style="overflow: hidden;padding:0;min-height:400px">
                    <div class="h-100 w-100 entertainment-main-card" style="padding: 0;min-height:400px">

                        <div class="w-100"
                            style="min-height:400px;background-image:url({{ asset('storage') }}{{ '/' }}{{ $post->thumbnail_img }}">

                        </div>
                    </div>

                </a>


            </div>
            <div class="col-xl-5 col-lg-5 col-md-5" style="padding-right: 30px">
                <h3 class="fw-bold mukta pl-5">{{ $post->title }}</h3>

                <p class=" mukta side-card-title title-font-size pl-5"
                    style="height:90px;line-height:30px;overflow:hidden">

                    @php
                        echo str_limit(strip_tags($post->content), 100);
                    @endphp
                </p>
            </div>
            @php
                break;
            @endphp
        @endforeach
    </div>
</div>
</div>



<div class="container-fluid mb-4 mt-2 " style="padding: 0">
    <div class="d-flex justify-content-center">
        @if (App\Models\Ad::where('location', 'Top of List')->first())
            <a href="{{ App\Models\Ad::where('location', 'Top of List')->first()->url }}"
                class="auto-size-banner bg-warning">
                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of List')->first()->image }}"
                    width="100%" />
            </a>
        @endif
    </div>
</div>

<div class="row d-flex justify-content-center" style="display: table;">
    @foreach ($blogs->blog as $post)
        <a href="{{ route('blog.detail', $post->id) }}"
            class="card col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-3  text-decoration-none {{ $post->id == $postId ? 'd-none' : '' }}"
            style="display: table-cell;height:auto;border:none">

            <div class="bg-transparent mb-2" style="overflow: hidden;padding:0;height:280px">
                <div class="h-100 w-100 bg-duccess entertainment-main-card" style="padding: 0">

                    <div class="w-100 h-100"
                        style="background-image:url({{ asset('storage') }}{{ '/' }}{{ $post->thumbnail_img }}">

                    </div>
                </div>

            </div>
            <h1 class="fw-normal mukta px-1 fw-bold text-dark mukta" style="font-size: 18px;">
                {{ $post->title }}
            </h1>
            <p class=" mukta text-dark fw-normal" style="height:90px;line-height:30px;overflow:hidden">

                @php
                    echo str_limit(strip_tags($post->content), 100);
                @endphp
            </p>
        </a>

        @if ($loop->iteration == '10')
            <div class="container-fluid mb-4 mt-2 " style="padding: 0">
                <div class="d-flex justify-content-center">
                    @if (App\Models\Ad::where('location', 'In-List 1')->first())
                        <a href="{{ App\Models\Ad::where('location', 'In-List 1')->first()->url }}"
                            class="auto-size-banner bg-warning">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'In-List 1')->first()->image }}"
                                width="100%" />
                        </a>
                    @endif
                </div>
            </div>
        @endif
        @if ($loop->iteration == '19')
            <div class="container-fluid mb-4 mt-2 " style="padding: 0">
                <div class="d-flex justify-content-center">
                    @if (App\Models\Ad::where('location', 'In-List 2')->first())
                        <a href="{{ App\Models\Ad::where('location', 'In-List 2')->first()->url }}"
                            class="auto-size-banner bg-warning">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'In-List 2')->first()->image }}"
                                width="100%" />
                        </a>
                    @endif
                </div>
            </div>
        @endif
        @if ($loop->iteration == '28')
            <div class="container-fluid mb-4 mt-2 " style="padding: 0">
                <div class="d-flex justify-content-center">
                    @if (App\Models\Ad::where('location', 'In-List 3')->first())
                        <a href="{{ App\Models\Ad::where('location', 'In-List 3')->first()->url }}"
                            class="auto-size-banner bg-warning">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'In-List 3')->first()->image }}"
                                width="100%" />
                        </a>
                    @endif
                </div>
            </div>
        @endif
        @if ($loop->iteration == '37')
            <div class="container-fluid mb-4 mt-2 " style="padding: 0">
                <div class="d-flex justify-content-center">
                    @if (App\Models\Ad::where('location', 'In-List 3')->first())
                        <a href="{{ App\Models\Ad::where('location', 'In-List 3')->first()->url }}"
                            class="auto-size-banner bg-warning">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'In-List 3')->first()->image }}"
                                width="100%" />
                        </a>
                    @endif
                </div>
            </div>
        @endif
    @endforeach

    <div class="container-fluid mb-4 mt-2 " style="padding: 0">
        <div class="d-flex justify-content-center">
            @if (App\Models\Ad::where('location', 'Top of Footer')->first())
                <a href="{{ App\Models\Ad::where('location', 'Top of Footer')->first()->url }}"
                    class="auto-size-banner bg-warning">
                    <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of Footer')->first()->image }}"
                        width="100%" />
                </a>
            @endif
        </div>
    </div>
</div>
                {{-- @endisset --}}
            </div>
            <div class="col-xl-3 col-lg-3 px-5" style="padding: 0">
                @php
                    $countData = App\Models\Ad::where('location', 'All page right')->count();
                @endphp
                @foreach (App\Models\Ad::where('location', 'All page right')->get() as $item)
                    <div class="w-100 mb-3 {{ $loop->iteration >= $countData ? 'sitcky-banner' : '' }}"
                        data-aos="fade-up">

                        <div class="square d-flex justify-content-end">

                            <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" width="100%"
                                height="100%" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('components.front.footer')
@endsection













































