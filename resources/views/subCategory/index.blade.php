@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="{{ route('home') }}" class="text-dark breadcrumb-active"
                            style="text-decoration:none">Dashboard</a>
                        <label style="color: #767575">Tag</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card p-4">
                    <form action="{{ $subCategory->id ? route('subcategory.update',$subCategory->id) : route('subcategory.store') }}" method="POST">
                        @csrf
                        @isset($tag->id)
                            @method('PUT')
                        @endisset
                        @isset($subCategory->id)
                            @method('PUT')
                        @endisset
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Category name <span class="text-danger">*</span></label>
                                <select name="category_id" id="" class="my-input">
                                    <option value="" selected disabled>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$subCategory->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            @error('category_id')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Sub Category <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{old('name',$subCategory->name)}}" class="my-input" placeholder="Sub Category">
                            @error('name')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2 d-flex justify-content-end">
                            <input type="submit" class="btn btn-success" value="{{$subCategory->id ? 'Update' : 'Save'}}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card p-4">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subcategory->category->name }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td class="text-nowrap py-4">
                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                            class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                                class="fa fa-edit"></i></a>
                                        <span class="mx-2">|</span>
                                        <form action="{{ route('subcategory.delete', $subcategory) }}" method="post"
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
