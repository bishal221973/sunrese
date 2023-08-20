@extends('ads.index')
@section('ads')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 mb-3">
            <div class="card p-4">
                <form action="{{ $ad->id ? route('ads.update', $ad) : route('ads.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @isset($ad->id)
                        @method('PUT')
                    @endisset
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">Name <span class="text-danger">*</span></label>
                        <input type="text" class="my-input" placeholder="Enter ad name"
                            value="{{ old('name', $ad->name) }}" name="name">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">URL</label>
                        <input type="text" class="my-input" placeholder="Enter URL" value="{{ old('url', $ad->url) }}"
                            name="url">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    {{-- <div class="form-group mb-2">
                        <label for="exampleInputEmail1">Price <span class="text-danger">*</span></label>
                        <input type="text" class="my-input" placeholder="Enter ad price"
                            value="{{ old('price', $ad->price) }}" name="price">
                    </div> --}}
                    <div class="form-group mb-2">
                        <label for="exampleInputEmail1">Image <span class="text-danger">*</span></label>
                        <input type="file" class="my-input file-input" placeholder="Enter ad name"
                            value="{{ old('image', $ad->image) }}" name="image">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <input type="hidden" name="location" value="header">
                    <div class="form-group mb-2 d-flex justify-content-end">
                        <input type="submit" class="btn btn-success" value="{{ $ad->id ? 'Update' : 'Save' }}">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card p-4">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>url</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ads as $ad)
                            
                     
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ad->name }}</td>
                                <td><img src="{{ asset('storage') }}{{ '/' }}{{ $ad->image }}"
                                        style="width:100px" /></td>
                                <td>{{ $ad->url }}</td>
                            </tr>
                       
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
