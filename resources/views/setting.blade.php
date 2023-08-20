@extends('layouts.app')
@section('content')
    <div class="my-breadcrumb">
        <ul class="breadcrumb-list">
            <li>
                <a href="#" class="active">Dashboard</a>
            </li>
            <li>
                <label>Settings</label>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-5">
                <h5 class="fw-bold text-uppercase">Apps Setting</h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-7">
                <div class="card p-3">

                    <form action="{{ $websetting->id ? route('setting.update', $websetting) : route('setting.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($websetting->id)
                            @method('PUT')
                        @endisset
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">App Short Name</label>
                            <input type="text" class="form-control" placeholder="Enter short name"
                                value="{{ old('app_short_name', $websetting->app_short_name) }}" name="app_short_name">
                            @error('app_short_name')
                                <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">App Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter short name"
                                value="{{ old('app_full_name', $websetting->app_full_name) }}" name="app_full_name">
                            @error('app_full_name')
                                <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">App Logo</label>
                            <input type="file" class="form-control" placeholder="Enter short name" name="app_logo">
                            @error('app_logo')
                                <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Favicon</label>
                            <input type="file" class="form-control" placeholder="Enter short name" name="fav_icon">
                            @error('fav_icon')
                                <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-end mb-2">
                            <input type="submit" class="btn btn-success" value="Change">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
