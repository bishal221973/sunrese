@extends('layouts.app')
@section('content')
    <div class="container-fluid mb-5" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="{{ route('home') }}" class="text-dark breadcrumb-active"
                            style="text-decoration:none">Dashboard</a>
                        <a href="{{ route('blog') }}" class="text-dark breadcrumb-active"
                            style="text-decoration:none">Blog</a>
                        <label style="color: #737575">Create</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3">

            <form action="{{ $blog->id ? route('blog.update',$blog) : route('blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @isset($blog->id)
                    @method('PUT')
                @endisset
                <div class="row">



                    <div class="col-xl-4 col-lg-6 col-md-4" style="padding-left: 0">
                        <div class="d-flex justify-content-between">
                            <div class="form-group mb-2 col-12">
                                <label for="exampleInputEmail1">Title <span class="text-danger">*</span></label>
                                <input type="text" class="my-input file-input" placeholder="Enter Title" id="imageInput"
                                    name="title" value="{{old('title',$blog->title)}}">
                                    @error('title')
                                        <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4" style="padding-left: 0">
                        <div class="d-flex justify-content-between">
                            <div class="form-group mb-2 col-12">
                                <label for="exampleInputEmail1">Artist <span class="text-danger">*</span></label>
                                <select class="selectpicker col-12" name="profile_id" data-show-subtext="true" data-live-search="true">
                                    @foreach ($profiles as $profile)
                                        
                                    <option data-tokens="{{$profile->id}}" value="{{$profile->id}}" {{$profile->id == $blog->profile_id ? 'selected' : ''}}>{{$profile->name}}</option>
                                    @endforeach
                                    {{-- <option data-tokens="family">family</option> --}}
                                </select>
                                @error('profile')
                                    <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-4 col-lg-12 col-md-4" style="padding-left: 0">
                        <div class="d-flex justify-content-between">
                            <div class="form-group mb-2 col-xl-8">
                                <label for="exampleInputEmail1">Thumbnail Image <span class="text-danger">*</span></label>
                                <input type="file" class="my-input file-input" placeholder="Enter Post Title"
                                    id="imageInput" name="thumbnail_img">
                            </div>
                            <button type="button" class="btn btn-info text-white" style="height: 35px;margin-top:30px"
                                data-toggle="modal" data-target=".post-thumbnail-preview">Preview</button>
                        </div>
                        @error('thumbnail_img')
                            <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                        @enderror
                    </div>




                    <div class="modal fade post-thumbnail-preview" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <img id="previewImage" src="" style="max-width: 100%; max-height: auto;">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Content <span class="text-danger">*</span>
                                @error('content')
                                    <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                @enderror </label>
                            <textarea id="summernote" name="content">
                                {{ $blog->id ? $blog->content : '' }}
                        </textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-group mb-2 d-flex justify-content-end">
                            <input type="submit" class="btn btn-success" value="{{$blog->id ? 'Update' : 'Save'}}">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
