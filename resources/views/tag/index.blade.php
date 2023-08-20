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
            <div class="col-xl-6 col-lg-5 col-md-4 mb-3">
                <div class="card p-4">
                    <form action="{{ $tag->id ? route('tag.update', $tag) : route('tag.store') }}" method="POST">
                        @csrf
                        @isset($tag->id)
                            @method('PUT')
                        @endisset
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Tag name <span class="text-danger">*</span></label>
                            <input type="text" class="my-input" placeholder="Enter tag name"
                                value="{{ old('tag_name', $tag->tag_name) }}" name="tag_name">
                            @error('tag_name')
                                <small id="emailHelp" class=" text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-2 d-flex justify-content-end">
                            <input type="submit" class="btn btn-success" value="{{ $tag->id ? 'Update' : 'Save' }}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-8">
                <div class="card p-4" >
                    <table class="table" id="myTable" >
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Tag Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tag->tag_name }}</td>
                                    <td class="text-nowrap py-4">
                                        <a href="{{ route('tag.edit', $tag) }}"
                                            class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                                class="fa fa-edit"></i></a>
                                        <span class="mx-2">|</span>
                                        <form action="{{ route('tag.delete', $tag) }}" method="post"
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
