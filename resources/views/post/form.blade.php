@extends('layouts.app')
@section('content')
    <div class="container-fluid mb-5" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="{{ route('home') }}" class="text-dark breadcrumb-active"
                            style="text-decoration:none">Dashboard</a>
                        <a href="{{ route('post') }}" class="text-dark breadcrumb-active"
                            style="text-decoration:none">Post</a>
                        <label style="color: #767575">Create</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3">

            <form action="{{ $post->id ? route('news.update', $post) : route('news.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                @isset($post->id)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6">
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Title <span class="text-danger">*</span></label>
                            <input type="text" class="my-input" placeholder="Enter Post Title"
                                value="{{ old('title', $post->title) }}" name="title">
                            @error('title')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-xl-6 col-md-6 col-lg-6 col-sm-6">
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Category <span class="text-danger">*</span></label>
                            <select name="category_id" id="category" class="my-input">
                                <option value="" selected disabled>Please select a category</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }} {{old('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6">
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Sub Category <span class="text-danger">*</span></label>
                            <select name="sub_category_id" id="mySelect" class="my-input">
                                <option value="" selected disabled>Select sub category</option>

                                {{-- @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach --}}
                            </select>
                            @error('sub_category_id')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>





                    <div class="col-xl-6 " style="padding-left: 0">
                        <div class="d-flex justify-content-between">
                            <div class="form-group mb-2 col-10">
                                <label for="exampleInputEmail1">Thumbnail Image <span class="text-danger">*</span></label>
                                <input type="file" class="my-input file-input" placeholder="Enter Post Title"
                                    id="imageInput" name="thumbnail_img">
                                    @error('thumbnail_img')
                                        <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <button type="button" class="btn btn-info text-white" style="height: 35px;margin-top:30px"
                                data-toggle="modal" data-target=".post-thumbnail-preview">Preview</button>
                        </div>
                    </div>


                    <div class="col-xl-6">
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Tag</label>
                            <select name="tag_id[]" id="" class="form-control" multiple>
                                <option value="" selected disabled>Please select tag</option>

                                @php
                                    $printed = 0;
                                @endphp
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        @php
foreach ($selectedTags as $selectedTag) {
                                            if($selectedTag->tag_id==$tag->id){
                                                echo "selected";
                                            } 
                                            // echo $selectedTag->id;
                                        } @endphp>
                                        {{ $tag->tag_name }}</option>
                                @endforeach
                            </select>
                        </div>
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
                                {{ $post->id ? $post->content : '' }}
                                {{old('content')}}
                        </textarea>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="form-group mb-2 d-flex justify-content-end">
                            <input type="submit" class="btn btn-success" value="{{ $post->id ? 'Update' : 'Save' }}">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
