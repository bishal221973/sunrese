@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="#" class="text-dark breadcrumb-active" style="text-decoration:none">Dashboard</a>
                        <label style="color: #767575">ad</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100 mb-3 d-flex justify-content-between">
            <div class="d-flex">
                <a href="{{route('header.ads')}}" class="btn btn-info mr-4">Header</a>
                <a href="{{route('body.ads')}}" class="btn btn-info mr-4">Body Page</a>
                <a href="{{route('all.ads')}}" class="btn btn-info mr-4">All Page</a>
                <a href="{{route('detail.ads')}}" class="btn btn-info mr-4">Detail Page</a>
            </div>
            <h5 class="font-weight-bold">{{$sub_title}}</h5>
        </div>
        
        @yield('ads')
    </div>
@endsection
