@extends('front.postList')
@section('postList')
<div class="post-list-latest-card-section mb-4">
    <div class="row  d-flex align-items-center h-100" style="padding: 0">
        @foreach ($posts as $post)
            <div class="col-xl-7 col-lg-7 col-md-7 h-100" style="padding: 0;min-height:400px">
                @php
                    $postId = $post->id;
                @endphp
                <a href="{{ route('post.detail', $post->id) }}"
                    class="card entertainment-card bg-transparent h-100"
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
{{-- @endisset --}}
{{-- Ads --}}
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
{{-- @isset($post) --}}
<div class="row d-flex justify-content-center" style="display: table;">
    @foreach ($posts as $post)
        <a href="{{ route('post.detail', $post->id) }}"
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
                {{-- @php
                    echo substr(strip_tags($post->content), 0, 200) . '...';
                @endphp --}}
                @php
                    echo str_limit(strip_tags($post->content), 100);
                @endphp
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
    {{-- Ads --}}
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
@endsection