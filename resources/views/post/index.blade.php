@extends('layouts.app')
@section('content')
    <div class="container-fluid" style="padding: 0">
        <div class="card z-depth-0 bg-transparent border-0 mb-4">
            <div class="card-body">
                <div class="d-flex">
                    <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                        <a href="{{route('home')}}" class="text-dark breadcrumb-active" style="text-decoration:none">Dashboard</a>
                        <label style="color: #767575">Post</label>
                    </div>
                    <div class="ml-auto">
                        <a class="btn btn-primary btn-md z-depth-0" href="{{ route('post.create') }}"><span
                                class="mr-2"><i class="fa fa-plus"></i></span> New Post</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card p-3" style="overflow-x: scroll">

            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        {{-- <th>Description</th> --}}
                        <th>Category</th>
                        <th>Publication Date</th>
                        <th>Author</th>
                        <th>Tags</th>
                        <th>Views</th>
                        <th>Trending</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ asset('storage') }}{{ '/' }}{{ $post->thumbnail_img }}"
                                    height="50px" width="50px" style="border-radius: 50%" />
                                {{ $post->title }}
                            </td>
                            <td>{{ $post->category->category }}</td>
                            <td>{{ $post->publication_date }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>
                                @foreach ($post->tag as $tag)
                                    <span class="badge badge-secondary">{{ $tag->tag->tag_name }}</span>
                                @endforeach
                            </td>
                            <td>{{$post->views}}</td>
                            <td><input type="checkbox" name="trending" id="{{$post->id}}" onclick="changeTrending({{$post->id}})" {{$post->trending->first() ? 'checked' : ''}}></td>
                          

                            <td class="text-nowrap py-4">
                                <a href="{{ route('news.edit', $post) }}" class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                        class="fa fa-edit pr-2"></i>Edit</a>
                                <span class="mx-2">|</span>
                                <form action="{{ route('news.delete', $post) }}" method="post"
                                    onsubmit="return confirm('Are you sure to delete ?')"
                                    class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-decoration-none action-btn text-white bg-danger px-3 py-1 border-0 rounded"><i
                                            class="far fa-trash-alt py-2 pr-2"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
