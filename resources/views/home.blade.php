@extends('layouts.app')

@section('content')
    <div class="w-100">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6 mb-3">
                <div class="card p-4">
                   <span style="line-height: 0px">
                    <h3 class="text-uppercase">Welcome <span class="font-weight-bold">{{Auth::user()->name}}</span></h3>
                    <i class="">in {{ App\Models\WebSetting::first() ? App\Models\WebSetting::first()->app_full_name : '' }} </i>
                   </span>
                   <div class="pb-5"></div>
                   <div class="pb-5"></div>
                   <div class="mt-5 w-100 d-flex justify-content-between">
                    <a href="{{route('user.changeProfile',Auth::user())}}" class="text-decoration-none text-uppercase">Change profile</a>
                    <a href="{{route('user.editPassword',Auth::user())}}" class="text-decoration-none text-uppercase">Change Password</a>
                   </div>
                </div>
            </div>
           <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-3" >
                    <a href="{{route('user')}}" class="card bg-info text-decoration-none" style="min-height: 100px;padding:0;margin:0">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="text-center pb-4 px-3 font-weight-bold text-white">{{App\Models\User::count()}}</h3>
                                <h5 class="text-center text-uppercase pl-3 text-white">Users</h5>
                            </div>
                            <div class="d-block w-100">
                                <div class="w-100 d-flex justify-content-end">
                                    <i class="fa-solid fa-users text-white pr-5" style="font-size: 50px"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-3" >
                    <a href="{{route('post')}}" class="card bg-success text-decoration-none" style="min-height: 100px;padding:0;margin:0">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="text-center pb-4 px-3 font-weight-bold text-white">{{App\Models\Post::count()}}</h3>
                                <h5 class="text-center text-uppercase pl-3 text-white">Posts</h5>
                            </div>
                            <div class="d-block w-100">
                                <div class="w-100 d-flex justify-content-end">
                                    <i class="fa-solid fa-radio text-white pr-5" style="font-size: 50px"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-3" >
                    <a href="{{route('tag')}}" class="card bg-warning text-decoration-none" style="min-height: 100px;padding:0;margin:0">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="text-center pb-4 px-3 font-weight-bold text-white">{{App\Models\Tag::count()}}</h3>
                                <h5 class="text-center text-uppercase pl-3 text-white">Tags</h5>
                            </div>
                            <div class="d-block w-100">
                                <div class="w-100 d-flex justify-content-end">
                                    <i class="fa-solid fa-tag text-white pr-5" style="font-size: 50px"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 mb-3" >
                    <a href="{{route('header.ads')}}" class="card bg-danger text-decoration-none" style="min-height: 100px;padding:0;margin:0">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="text-center pb-4 px-3 font-weight-bold text-white">{{App\Models\Ad::count()}}</h3>
                                <h5 class="text-center text-uppercase pl-3 text-white">Ads</h5>
                            </div>
                            <div class="d-block w-100">
                                <div class="w-100 d-flex justify-content-end">
                                    <i class="fa-solid fa-rectangle-ad text-white pr-5" style="font-size: 50px"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
           </div>
           <div class="col-xl-6">
            
           </div>
        </div>
    </div>
@endsection
