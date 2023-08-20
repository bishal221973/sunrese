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
        {{-- <button><i class="fa-solid fa-magnifying-glass"></i></button> --}}
    </div>



    {{-- Ads --}}
    <div class="container-fluid mb-1 mt-2 ">
        <div class="d-flex justify-content-center">
            @if (App\Models\Ad::where('location', 'Top of title')->first())
                <a href="{{ App\Models\Ad::where('location', 'Top of title')->first()->url }}"
                    class="auto-size-banner bg-warning">
                    {{-- <img src="{{ asset('image/ads1.gif') }}" alt="" > --}}
                    <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Top of title')->first()->image }}"
                        height="100%" width="100%" />
                </a>
            @endif
        </div>
    </div>
    {{-- ads finish --}}
    <div class="container-fluid">
        <div class="row pl-5">
            <div class="col-xl-1 col-lg-1 col-md-5 " style="padding-left: 10px">
                <div class="share-container  mb-4">

                    <div class="share-components d-block">
                        <div class=" pb-3 d-flex justify-content-end">
                            {{-- <i class="fa-solid fa-share-nodes share-icon pt-2"></i> --}}
                            <span style="line-height: 0px">
                                {{-- <h5 style="font-size: 50px">720</h5> --}}
                                <h4 class="w-100 text-center">Share</h4>
                            </span>
                        </div>
                        {!! $shareComponent !!}
                    </div>
                </div>


            </div>
            <div class="col-xl-7 col-lg-7 col-md-12">
                <h1 class=" mukta fw-bold mb-3 bg-white detail-main-title" id="title">{{ $post ? $post->title : '' }}
                </h1>
                {{-- Ads --}}
                <div class="container-fluid mb-1 mt-2 ">
                    <div class="d-flex justify-content-center">
                        @if (App\Models\Ad::where('location', 'Bottom of title')->first())
                            <a href="{{ App\Models\Ad::where('location', 'Bottom of title')->first()->url }}"
                                class="auto-size-banner bg-warning">
                                {{-- <img src="{{ asset('image/ads1.gif') }}" alt="" > --}}
                                <img src="{{ asset('storage') }}{{ '/' }}{{ App\Models\Ad::where('location', 'Bottom of title')->first()->image }}"
                                    height="100%" width="100%" />
                            </a>
                        @endif
                    </div>
                </div>

                @php
                    function ent_to_nepali_num_convert($number)
                    {
                        $eng_number = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-'];
                        $nep_number = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९', '-'];
                        return str_replace($eng_number, $nep_number, $number);
                    }

                    use Carbon\Carbon;

                    $postCreatedAt = $post->created_at; // Replace with the actual created timestamp of the post

                    $now = Carbon::now();
                    $createdAt = Carbon::parse($postCreatedAt);
                    $minutesAgo = $createdAt->diffInMinutes($now);

                    if ($minutesAgo < 60) {
                        $timeAgo = ent_to_nepali_num_convert($minutesAgo) . ' मिनेट अगाडि';
                        echo $timeAgo;

                    } elseif ($minutesAgo < 1440) {
                        $hoursAgo = $createdAt->diffInHours($now);
                        $timeAgo = ent_to_nepali_num_convert($hoursAgo) . ' घण्टा अगाडि';
                        echo $timeAgo;
                    } else {
                        $hoursAgo = $createdAt->diffInHours($now);
                        $month = $createdAt->format('m');
                        $year = $createdAt->format('Y');
                        $day = $createdAt->format('d');
                        $date = Bsdate::eng_to_nep($year, $month, $day);

                        $printDate = $date['year'] . ' ' . $date['nmonth'] . ' ' . $date['date'] . ',' . ' ' . $date['day'];
                        echo $printDate;
                    }

                    // echo $timeAgo;

                @endphp
                {{-- ads finish --}}
                <hr>


                @isset($post)
                    <img class="mb-4" src="{{ asset('storage') }}{{ '/' }}{{ $post->thumbnail_img }}"
                        width="100%" />
                @endisset

                <span class="mukta fw-light" style="font-size: 20px">
                    @isset($post)
                        {!! $post->content !!}
                    @endisset
                </span>


                @foreach (App\Models\Ad::where('location', 'Bottom Side')->get() as $item)
                    <div class="container-fluid mb-1 mt-2 ">
                        <div class="d-flex justify-content-center">
                            {{-- @if (App\Models\Ad::where('location', 'Top of title')->first()) --}}
                            <a href="{{ $item->url }}" class="auto-size-banner bg-warning">
                                {{-- <img src="{{ asset('image/ads1.gif') }}" alt="" > --}}
                                <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" height="100%"
                                    width="100%" />
                            </a>
                            {{-- @endif --}}
                        </div>
                    </div>
                @endforeach
                {{-- Ads --}}

                <hr>




                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
            </div>
            <div class="col-xl-4 col-lg-4   pl-5">
                <div class="recent-posts-card  w-100 d-flex justify-content-start mb-5">
                    <div class="row side-banner" style="padding-right: 20px">
                        <h4 class="fw-bolder main-color recent-post-card-title">भर्खरैको</h4>
                        @foreach ($recentPosts as $recentPost)
                            <div class="col-12" style="padding: 0">
                                <div class="recent-post-container" style="padding: 0">
                                    <a href="{{ route('post.detail', $recentPost->id) }}"
                                        class="card  text-decoration-none" style="padding: 0">
                                        <div class="d-flex align-items-center py-2" style="padding: 0">
                                            <div class="recent-post-image">
                                                <img src="{{ asset('storage') }}{{ '/' }}{{ $recentPost->thumbnail_img }}"
                                                    class="mb-3" style="height: 100px" />
                                            </div>
                                            <div class="" style="padding: 0;">
                                                <p style="padding: 0;margin:0"
                                                    class=" mukta side-card-title title-font-size d-flex align-items-center pl-3">

                                                    @php
                                                        echo str_limit(strip_tags($recentPost->title), 50);
                                                    @endphp
                                                </p>

                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                @foreach (App\Models\Ad::where('location', 'Right Side')->get() as $item)
                    <div class="w-100 mb-3" data-aos="fade-up">

                        <div class="square d-flex justify-content-end">

                            <img src="{{ asset('storage') }}{{ '/' }}{{ $item->image }}" width="100%"
                                height="100%" />
                        </div>
                    </div>
                @endforeach
                {{-- <div class="w-100 d-flex justify-content-end mb-3 " data-aos="fade-up">

                    <div class="square">
                        <img src="{{ asset('image/longAds.jpeg') }}" alt="" height="100%" width="100%">
                    </div>
                </div>

                <div class="w-100 d-flex justify-content-end mb-3 " data-aos="fade-up">

                    <div class="square">
                        <img src="{{ asset('image/ads6.gif') }}" alt="" height="100%" width="100%">
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-end mb-3 " data-aos="fade-up">

                    <div class="square">
                        <img src="{{ asset('image/longAdss.jpg') }}" alt="" height="100%" width="100%">
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-end mb-3 " data-aos="fade-up">

                    <div class="square">
                        <img src="{{ asset('image/ads7.gif') }}" alt="" height="100%" width="100%">
                    </div>
                </div> --}}


                <div class="recent-posts-card  w-100 d-flex justify-content-start mb-5 most-watched-side-banner">
                    <div class="row side-banner" style="padding-right: 20px">
                        <h4 class="fw-bolder main-color recent-post-card-title">धेरै हेरिएको</h4>
                        @foreach ($mostWatcheds as $mostWatched)
                            <div class="col-12" style="padding: 0">
                                <div class="recent-post-container" style="padding: 0">
                                    <a href="{{ route('post.detail', $mostWatched->id) }}"
                                        class="card  text-decoration-none" style="padding: 0">
                                        <div class="d-flex align-items-center py-2" style="padding: 0">
                                            <div class="recent-post-image">
                                                <img src="{{ asset('storage') }}{{ '/' }}{{ $mostWatched->thumbnail_img }}"
                                                    class="mb-3" style="height: 100px" />
                                            </div>
                                            <div class="" style="padding: 0;">
                                                <p style="padding: 0;margin:0"
                                                    class=" mukta side-card-title title-font-size d-flex align-items-center pl-3">
                                                    {{-- @php
                                                        echo substr($mostWatched->title, 0, 100) . '...';
                                                    @endphp --}}

                                                    @php
                                                        echo str_limit(strip_tags($mostWatched->title), 50);
                                                    @endphp
                                                </p>

                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="container  mb-5">
        <div class="d-flex justify-content-center">
            <div class="large-leaderboard-banner">
                <img src="image/970X90.jpg" alt="" height="100%" width="100%">

            </div>
        </div>
    </div> --}}
    <div class="container-fluid px-5 mt-3 py-4" style="background-color: rgba(127, 255, 212, 0.164)">
        <h3 class="mb-3 main-color fw-bold ">संबन्धित</h3>
        <div class="row">
            @foreach ($relatedPost as $post)
                <a href="{{ route('post.detail', $post->id) }}"
                    class="card col-xl-3 col-lg-4 col-md-4 col-sm-6 mb-3 bg-transparent  text-decoration-none"
                    style="display: table-cell;height:auto;border:none">

                    <div class="bg-transparent mb-2" style="overflow: hidden;padding:0;height:280px">
                        <div class="h-100 w-100 bg-duccess entertainment-main-card" style="padding: 0">

                            <div class="w-100 h-100"
                                style="background-image:url({{ asset('storage') }}{{ '/' }}{{ $post->post->thumbnail_img }}">

                            </div>
                        </div>

                    </div>
                    <h1 class="fw-normal mukta px-1 fw-bold text-dark mukta" style="font-size: 18px;">
                        {{ $post->post->title }}
                    </h1>
                    {{-- <p class=" mukta text-dark fw-normal" style="height:90px;line-height:30px;overflow:hidden">

                @php
                echo str_limit(strip_tags($post->post->content), 100);
            @endphp --}}
                    </p>
                </a>

                @if ($loop->iteration == '10')
                    {{-- @endisset --}}
                    {{-- Ads --}}
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
                    {{-- @endisset --}}
                    {{-- Ads --}}
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
                    {{-- @endisset --}}
                    {{-- Ads --}}
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
                    {{-- @endisset --}}
                    {{-- Ads --}}
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
        </div>
    </div>

    @include('components.front.footer')
@endsection
