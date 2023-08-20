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



    <div class="container-fluid">
        {{-- @if ($profiles!=null)
        <div class="w-100 trending_scroll">
            <div class="d-flex artist-main-menu px-5" style="width: 870px">
                <div class="artist-menu-list d-flex">
                    @foreach ($profiles as $profile)
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
        @endif --}}

        @isset($profiles)
        <div class="w-100 trending_scroll">
            <div class="d-flex artist-main-menu px-5" style="width: 870px">
                <div class="artist-menu-list d-flex">
                    @foreach ($profiles as $profile)
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
        @endisset

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
                        <div class="sub-menu-item {{$selected ? '' : 'active'}}" style="width: 100px">
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
              @yield('postList')
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
