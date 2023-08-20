@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="{{ route('home') }}" class="text-dark breadcrumb-active"
                            style="text-decoration:none">Dashboard</a>
                        <label style="color: #767575">Artist</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-5 col-md-4 mb-3">
                <div class="card p-4">
                    <form action="{{ $profile->id ? route('profile.update',$profile) : route('profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @isset($profile->id)
                            @method('PUT')
                        @endisset
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                            <input type="text" class="my-input" placeholder="Enter  name" value="{{old('name',$profile->name)}}"
                                name="name">
                            @error('name')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                            <option data-tokens="name">name</option>
                            <option data-tokens="family">family</option>
                            </select> --}}
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Address </label>
                            <input type="text" class="my-input" placeholder="Enter address" value="{{old('address',$profile->address)}}"
                                name="address">
                            @error('address')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Contact no </label>
                            <input type="text" class="my-input" placeholder="Enter contact number" value="{{old('contact',$profile->contact)}}"
                                name="contact">
                            @error('contact')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Profile</label>
                            <input type="file" class="my-input" placeholder="Enter profile name" value=""
                                name="profile">
                            @error('profile')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2 d-flex justify-content-end">
                            <input type="submit" class="btn btn-success" value="{{$profile->id ? 'Update' : 'Save'}}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="card p-4" style="overflow-x: scroll">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($profiles as $profile)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> <img src="{{ asset('storage') }}{{ '/' }}{{ $profile->profile }}"
                                        style="width: 50px;" class="rounded mr-3"/>
                                        {{ $profile->name }}</td>
                                    <td>{{ $profile->address }}</td>
                                    <td>{{ $profile->contact }}</td>
                                    <td class="text-nowrap py-4">
                                        <a href="{{ route('profile.edit', $profile) }}"
                                            class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                                class="fa fa-edit"></i></a>
                                        <span class="mx-2">|</span>
                                        <form action="{{ route('profile.delete', $profile) }}" method="post"
                                            onsubmit="return confirm('Are you sure to delete ?')"
                                            class="form-inline d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-decoration-none action-btn text-white bg-danger px-3 py-1 border-0 rounded"><i
                                                    class="far fa-trash-alt py-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                           
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
