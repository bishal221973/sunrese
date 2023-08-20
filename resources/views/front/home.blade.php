@extends('front.app')
@section('content')
@section('title', 'Page Title')
@include('components.front.header')
@include('components.front.menu')
{{-- <div class="w-100 trending_scroll">
    <div class="d-flex artist-main-menu px-5" style="width: 870px">
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
</div> --}}
<div class="social-media-section">
    <a href="#" class="text-decoration-none"><i class="fa-brands fa-facebook-f" style="color: #3b5998"></i></a>
    <a href="#" class="text-decoration-none"><i class="fa-brands fa-twitter" style="color:#00acee"></i></a>
    <a href="#" class="text-decoration-none"><i class="fa-brands fa-youtube" style="color:#FF0000"></i></a>
    {{-- <button><i class="fa-solid fa-magnifying-glass"></i></button> --}}
</div>
<div class="container mb-4 start" id="start">

    @php
        $count = '0';
    @endphp
    <div style="height:10px"></div>
    @foreach ($trendingPosts as $trendingPost)
        {{-- {{$trendingPost->post}} --}}
        <div class="w-100 mt-4">
            <a href="{{ route('post.detail', $trendingPost->post->id) }}" class="text-decoration-none home-news">
                <h1 class="text-justify text-center mb-3  mukta home-title" style="font-weight: bolder">
                    {{ $trendingPost->post->title }}
                </h1>

                <div class="d-flex justify-content-center mb-2">
                    <div style="width:85%" class="">

                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ $trendingPost->post->thumbnail_img }}"
                                style="width: 70%" />
                        </div>

                        <label class="text-dark txt-content mukta"
                            style="max-height: 95px;overflow:hidden;text-align:center;font-size:21px">
                            {{-- @php
                                echo substr(strip_tags($trendingPost->content), 0, 1000) . '...';
                            @endphp --}}

                            @php
                                echo str_limit(strip_tags($trendingPost->post->content), 310);
                            @endphp
                        </label>
                    </div>
                </div>
            </a>
        </div>
        <hr>
    @endforeach
</div>

{{-- Ads --}}
<div class="container-fluid mb-1 mt-2 ">
    <div class="d-flex justify-content-center">
        @if (App\Models\Ad::where('location', 'Top of news section')->first())
            <a href="{{ App\Models\Ad::where('location', 'Top of news section')->first()->url }}"
                class="auto-size-banner bg-warning">
                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of news section')->first()->image }}"
                    width="100%" />
            </a>
        @endif
    </div>
</div>

{{-- latest news start --}}
<div class="container-fluid px-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="main-title khanda">समाचार</h2>
        <a href="{{ route('news') }}" class="text-decoration-none btn-all text-white"><i
                class="fa-sharp fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-6 mb-4">
                    @foreach ($latestNewses as $latestNews)
                        <div class="">
                            <a href="{{ route('post.detail', $latestNews->id) }}"
                                class="card latest-news-main-card text-dark d-flex align-items-center border-0 text-decoration-none">
                                <img src="{{ asset('storage') }}{{ '/' }}{{ $latestNews->thumbnail_img }}"
                                    class="mb-4" />
                                <p class="fw-bold mukta title-font-size" style="font-size: 30px">
                                    {{ $latestNews->title }}</p>
                                <p class="text-justify mukta" style="font-size: 21px;overflow:hidden;max-height:94px">
                                    {{-- @php
                                        echo substr(strip_tags($latestNews->content), 0, 450) . '...';
                                    @endphp --}}
                                    @php
                                        echo str_limit(strip_tags($latestNews->content), 180);
                                    @endphp
                                </p>
                            </a>
                        </div>
                        @php
                            $latestNewsId = $latestNews->id;
                        @endphp
                        @php
                            break;
                        @endphp
                    @endforeach
                </div>

                <div class="col-xl-5 col-lg-6 col-md-6">
                    <div class="row">
                        @foreach ($latestNewses as $latestNews)
                            <div
                                class="col-xl-12  col-lg-12 col-md-12 col-sm-6 px-4 mb-3 {{ $latestNews->id == $latestNewsId ? 'closedNews' : '' }}">
                                <a href="{{ route('post.detail', $latestNews->id) }}"
                                    class="latest-news-card  text-decoration-none">

                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-5  responsive-img" style="padding: 0">
                                            <img src="{{ asset('storage') }}{{ '/' }}{{ $latestNews->thumbnail_img }}"
                                                width="100%" height="100%" />
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7" style="padding: 0">
                                            <div class="d-block news-description px-3">
                                                <p class=" mukta side-card-title title-font-size"
                                                    style="max-height:90px;line-height:30px;overflow:hidden;padding:0">
                                                    @php
                                                        // echo substr($latestNews->title, 0, 150) . '...';
                                                        echo str_limit(strip_tags($latestNews->title), 50);
                                                    @endphp
                                                </p>

                                            </div>
                                        </div>
                                    </div>


                                </a>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-3  ">
            @foreach (App\Models\Ad::where('location', 'Side of news section')->get() as $item)
                <div class="w-100 mb-3" data-aos="fade-up">

                    <div class="square d-flex justify-content-end">

                        <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" width="100%"
                            height="100%" />
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
{{-- latest news end --}}


{{-- Ads --}}
<div class="container-fluid mb-1 mt-2 ">
    <div class="d-flex justify-content-center">
        @if (App\Models\Ad::where('location', 'Top of video section')->first())
            <a href="{{ App\Models\Ad::where('location', 'Top of video section')->first()->url }}"
                class="auto-size-banner bg-warning">
                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of video section')->first()->image }}"
                    width="100%" />
            </a>
        @endif
    </div>
</div>

{{-- Our videos Start --}}

<div class="w-100 our-video-section mb-4" style="height:auto">
    <div class="container h-100">
        <h2 class="main-title  text-white mb-3 khanda">भिडियो</h2>

        <div class="row h-100" style="min-height: 500px">
            <div class="col-xl-8 col-lg-8 col-md-9 mb-3 d-flex justify-content-center align-items-center video-section">
                @foreach ($videos as $video)
                    {!! $video->iframe !!}
                    @php
                        $videoId = $video->id;
                    @endphp
                    @php
                        break;
                    @endphp
                @endforeach
            </div>
            <div class="col-xl-4 col-lg-4 col-md-3">
                <div class="row">
                    @foreach ($videos as $video)
                        <div class="col-xl-12 col-lg-12 col-md-12 open-AddBookDialog {{ $video->id == $videoId ? 'closedNews' : '' }}"
                            data-toggle="modal" data-target=".bd-example-modal-lg"
                            data-iframe="{{ $video->iframe }}">
                            <a
                                class="latest-news-card bg-transparent d-flex justify-content-between text-decoration-none">
                                <img src="http://img.youtube.com/vi/@php echo substr($video->iframe,68,11); @endphp/0.jpg"
                                    height="100%" alt="">

                                <div class=" w-100  news-description px-3">
                                    <p class="text-white mukta side-card-title"
                                        style="height:90px;line-height:30px;overflow:hidden">{{ $video->name }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg bg-transparent">
                        <div class="modal-content video-medel bg-transparent">
                            {{-- <p id="test"></p> --}}
                            <div id="video_content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Our videos end --}}

{{-- Ads --}}
<div class="container-fluid mb-1 mt-2 ">
    <div class="d-flex justify-content-center">
        @if (App\Models\Ad::where('location', 'Top of agriculture section')->first())
            <a href="{{ App\Models\Ad::where('location', 'Top of agriculture section')->first()->url }}"
                class="auto-size-banner bg-warning">
                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of agriculture section')->first()->image }}"
                    width="100%" />
            </a>
        @endif
    </div>
</div>

{{-- Agriculture news --}}
<div class="container-fluid px-5 mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="main-title khanda">कृषि</h2>
        <a href="{{ route('agriculture') }}" class="text-decoration-none btn-all text-white"><i
                class="fa-sharp fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="row">
                <div class="col-xl-12 col-lg-12 mb-5">
                    @foreach ($agricultures as $agriculture)
                        <a href="{{ route('post.detail', $agriculture->id) }}"
                            class="card latest-news-main-card text-decoration-none border-0" style="height:auto">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 d-flex align-items-center">
                                    <img
                                        src="{{ asset('storage') }}{{ '/' }}{{ $agriculture->thumbnail_img }}" />
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6" style="height: auto;position: relative;">
                                    <p class="fw-bold mukta title-font-size text-dark" style="font-size: 30px">
                                        {{ $agriculture->title }}</p>
                                    <p class="text-justify mukta text-dark"
                                        style="font-size: 21px;overflow:hidden;max-height:94px">
                                        @php
                                            // echo substr(strip_tags($agriculture->content), 0, 450) . '...';
                                            echo str_limit(strip_tags($agriculture->content), 160);

                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </a>

                        @php
                            $agricultureId = $agriculture->id;
                        @endphp
                        @php
                            break;
                        @endphp
                    @endforeach

                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="row">
                        @foreach ($agricultures as $agriculture)
                            <div
                                class="col-xl-6  col-lg-6 col-md-6 col-sm-6 px-4 mb-3 {{ $agriculture->id == $agricultureId ? 'closedNews' : '' }}">
                                <a href="{{ route('post.detail', $agriculture->id) }}"
                                    class="latest-news-card  text-decoration-none">

                                    <div class="row">
                                        <div class="col-xl-5 col-lg-5 col-md-5  responsive-img" style="padding: 0">
                                            <img src="{{ asset('storage') }}{{ '/' }}{{ $agriculture->thumbnail_img }}"
                                                width="100%" height="100%" />
                                        </div>
                                        <div class="col-xl-7 col-lg-7 col-md-7" style="padding: 0">
                                            <div class="d-block news-description px-3">
                                                <p class=" mukta side-card-title title-font-size"
                                                    style="max-height:90px;line-height:30px;overflow:hidden;padding:0">
                                                    @php
                                                        // echo substr($agriculture->title, 0, 150) . '...';
                                                        echo str_limit(strip_tags($agriculture->title), 70);

                                                    @endphp
                                                </p>

                                            </div>
                                        </div>
                                    </div>


                                </a>
                            </div>
                        @endforeach


                    </div>

                </div>


            </div>



            {{-- Ads --}}
            <div class="container-fluid mb-1 mt-2 ">
                <div class="d-flex justify-content-center">
                    @if (App\Models\Ad::where('location', 'Top of entertainment section')->first())
                        <a href="{{ App\Models\Ad::where('location', 'Top of entertainment section')->first()->url }}"
                            class="auto-size-banner bg-warning">
                            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of entertainment section')->first()->image }}"
                                width="100%" height="100%" />
                        </a>
                    @endif
                </div>
            </div>

        </div>




        <div class="col-xl-3 col-lg-3">
            @foreach (App\Models\Ad::where('location', 'Side of agriculture section')->get() as $item)
                <div class="w-100 mb-3" data-aos="fade-up">

                    <div class="square d-flex justify-content-end">

                        <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" width="100%"
                            height="100%" />
                    </div>
                </div>
            @endforeach
            {{-- <div class="w-100 d-flex justify-content-end mb-2" data-aos="fade-up">

                <div class="square">
                    <img src="image/300x250.jpg" alt="" height="100%" width="100%">
                </div>
            </div> --}}



        </div>
    </div>
</div>

{{-- Entertainment --}}
<div class="w-100 entertainment-section mb-4">
    <div class="container h-100">
        <h2 class="main-title  text-white mb-3 khanda">कला साहित्य</h2>

        <div class="row d-flex justify-content-center">
            @php
                $entertainmentCount = 0;
            @endphp
            @foreach ($entertainmentNewses as $entertainmentNews)
                <a href="{{ route('post.detail', $entertainmentNews->id) }}"
                    class="col-xl-4 col-lg-4 col-md-6 entertainment-card bg-transparent mb-5"
                    style="overflow: hidden">
                    <div class="h-100 w-100 entertainment-main-card">

                        <div class=" h-100 "
                            style="background-image:linear-gradient(0deg, rgba(0, 0,0, 0.5), rgba(0, 0,0, 0.5)), url({{ asset('storage') }}{{ '/' }}{{ $entertainmentNews->thumbnail_img }}">

                            <div class="d-flex align-items-end justify-content-center h-100 pb-5">

                                <h2 class="text-white text-center fw-bold mukta px-2" style="width: 90%">
                                    {{ $entertainmentNews->title }}</h2>
                            </div>
                        </div>
                    </div>

                </a>

                @php
                    $entertainmentCount++;
                @endphp

                @php
                    if ($entertainmentCount == 3) {
                        break;
                    }
                @endphp
            @endforeach
        </div>
    </div>



</div>
{{-- Entertainment finish --}}




{{-- Ads --}}
<div class="container-fluid mb-1 mt-2 ">
    <div class="d-flex justify-content-center">
        @if (App\Models\Ad::where('location', 'Top of sports section')->first())
            <a href="{{ App\Models\Ad::where('location', 'Top of sports section')->first()->url }}"
                class="auto-size-banner bg-warning">
                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of sports section')->first()->image }}"
                    width="100%" />
            </a>
        @endif
    </div>
</div>



{{-- Sport --}}
<div class="w-100 mb-4" style="padding: 0">

</div>

<div class="container-fluid h-100" style="width:95%">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="main-title khanda">खेलकुद</h2>
        <a href="{{ route('sports') }}" class="text-decoration-none btn-all text-white"><i
                class="fa-sharp fa-solid fa-arrow-right"></i></a>
    </div>

    <div class="row d-flex justify-content-center">

        @foreach ($sportNewses as $sportNews)
            <a href="{{ route('post.detail', $sportNews->id) }}" class="col-xl-3 col-lg-4 col-md-4 col-sm-6 sport-card mb-4">
                <div class="h-100 w-100 sport-main-card">

                    <div class="h-100"
                        style="background-image: linear-gradient(0deg, rgba(0, 0,0, 0.5), rgba(0, 0,0, 0.5)),url({{ asset('storage') }}{{ '/' }}{{ $sportNews->thumbnail_img }}">

                        <div class="d-flex align-items-end h-100 justify-content-center pb-5">

                            <h2 class="text-white text-center fw-bold mukta px-2" style="width: 90%">
                                {{-- {{ $sportNews->title }} --}}
                                @php
                                    echo str_limit(strip_tags($sportNews->title), 50);

                                @endphp
                            </h2>
                        </div>
                    </div>
                </div>


            </a>
        @endforeach
    </div>
</div>

{{-- Sports finish --}}

{{-- Ads --}}
<div class="container-fluid mb-1 mt-2 ">
    <div class="d-flex justify-content-center">
        @if (App\Models\Ad::where('location', 'Top of world section')->first())
            <a href="{{ App\Models\Ad::where('location', 'Top of world section')->first()->url }}"
                class="auto-size-banner bg-warning">
                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of world section')->first()->image }}"
                    width="100%" />
            </a>
        @endif
    </div>
</div>



{{-- International news --}}
<div class="container-fluid mb-4" style="width:95%">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="main-title khanda">अन्तर्राष्ट्रिय</h2>
        <a href="{{ route('international') }}" class="text-decoration-none btn-all text-white"><i
                class="fa-sharp fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="row">
        <div class="col-xl-9 col-lg-9">
            <div class="row">
                <div class="col-xl-7 col-lg-6 col-md-6 mb-3 order-2">
                    @foreach ($internationalNewses as $internationalNews)
                        <div class="">
                            <a href="{{ route('post.detail', $internationalNews->id) }}"
                                class="card border-0 latest-news-main-card text-dark d-flex align-items-center text-decoration-none">
                                {{-- <img src="/image/img.jpg" alt=""> --}}
                                <img src="{{ asset('storage') }}{{ '/' }}{{ $internationalNews->thumbnail_img }}"
                                    class="mb-3" />
                                <p class="fw-bold mukta title-font-size" style="font-size: 30px">
                                    {{ $internationalNews->title }}</p>
                                <p class="text-justify mukta" style="font-size: 21px;overflow:hidden;max-height:94px">
                                    @php
                                        // echo substr(strip_tags($internationalNews->content), 0, 450) . '...';
                                        echo str_limit(strip_tags($internationalNews->content), 180);

                                    @endphp
                                </p>
                            </a>
                        </div>
                        @php
                            $internationalNewsId = $internationalNews->id;
                        @endphp
                    @break
                @endforeach

            </div>
            <div class="col-xl-5 col-lg-6 col-md-6 order-1">
                <div class="row">
                    @foreach ($internationalNewses as $internationalNews)
                        <div
                            class="col-xl-12  col-lg-12 col-md-12 col-sm-6 px-4 mb-3 {{ $internationalNews->id == $internationalNewsId ? 'closedNews' : '' }}">
                            <a href="{{ route('post.detail', $internationalNews->id) }}"
                                class="latest-news-card  text-decoration-none">

                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-5  responsive-img" style="padding: 0">
                                        <img src="{{ asset('storage') }}{{ '/' }}{{ $internationalNews->thumbnail_img }}"
                                            width="100%" height="100%" />
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-7" style="padding: 0">
                                        <div class="d-block news-description px-3">
                                            <p class=" mukta side-card-title title-font-size"
                                                style="max-height:90px;line-height:30px;overflow:hidden;padding:0">
                                                @php
                                                    // echo substr($internationalNews->title, 0, 150) . '...';
                                                    echo str_limit(strip_tags($internationalNews->title), 50);

                                                @endphp
                                            </p>

                                        </div>
                                    </div>
                                </div>


                            </a>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>

    <div class="col-xl-3 col-lg-3 ">
        @foreach (App\Models\Ad::where('location', 'Side of world section')->get() as $item)
            <div class="w-100 mb-3" data-aos="fade-up">

                <div class="square d-flex justify-content-end">

                    <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" width="100%"
                        height="100%" />
                </div>
            </div>
        @endforeach
        {{-- <div class="w-100 d-flex justify-content-end" data-aos="fade-up">

            <div class="square">
                <img src="image/300x250.jpg" alt="" height="100%" width="100%">
            </div>
        </div> --}}

    </div>
</div>
</div>


{{-- Ads --}}
<div class="container-fluid mb-1 mt-2 ">
<div class="d-flex justify-content-center">
    @if (App\Models\Ad::where('location', 'Top of footer section')->first())
        <a href="{{ App\Models\Ad::where('location', 'Top of footer section')->first()->url }}"
            class="auto-size-banner bg-warning">
            <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of footer section')->first()->image }}"
                width="100%" />
        </a>
    @endif
</div>
</div>
@include('components.front.footer')

{{-- <div class="container  mb-5">
        <div class="d-flex justify-content-center">
            <div class="large-leaderboard-banner">
                <img src="image/970X90.jpg" alt="" height="100%" width="100%">

            </div>
        </div>
    </div> --}}
@endsection
