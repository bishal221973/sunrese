@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="{{route('home')}}" class="text-dark breadcrumb-active" style="text-decoration:none">Dashboard</a>
                        <label style="color: #767575">Video</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-5 col-md-4 mb-3">
                <div class="card p-4">
                    <form action="{{ $video->id ? route('video.update', $video) : route('video.store') }}" method="POST">
                        @csrf
                        @isset($video->id)
                            @method('PUT')
                        @endisset
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Video Name <span class="text-danger">*</span></label>
                            <input type="text" class="my-input" placeholder="Enter video name"
                                value="{{ old('name', $video->name) }}" name="name">
                            @error('name')
                                <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                            @enderror
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Iframe <span class="text-danger">*</span></label>
                            <input type="text" class="my-input" placeholder="Enter iframe url"
                                value="{{ old('iframe', $video->iframe) }}" name="iframe">
                            @error('iframe')
                                <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                            @enderror
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>

                        <div class="form-group mb-2 d-flex justify-content-end">
                            <input type="submit" class="btn btn-success" value="{{ $video->id ? 'Update' : 'Save' }}">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="card p-4">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Video Name</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($videos as $video)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $video->name }}</td>
                                    {{-- <td>{!!$video->iframe!!}</td> --}}
                                    <td> <img
                                            src="http://img.youtube.com/vi/@php
echo substr($video->iframe,68,11); @endphp/0.jpg"
                                            height="60" alt=""> </td>


                                    <td class="text-nowrap py-4">
                                        <a href="{{ route('video.edit', $video) }}"
                                            class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                                class="fa fa-edit"></i></a>
                                        <span class="mx-2">|</span>
                                        <form action="{{ route('video.delete', $video) }}" method="post"
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
                            @empty
                                {{-- <tr> --}}
                                {{-- <td class="col-12 empity-list"><span>Data not found</span></td> --}}
                                {{-- </tr> --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
