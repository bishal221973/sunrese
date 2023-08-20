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
                    <input type="hidden" name="redirect" value="detail" id="">

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
                    <div class="form-group mb-2 {{ $ad->id ? 'd-none' : '' }}">
                        <label>Ads Location</label>
                        <select name="location" class="my-input">
                            <option value="">Please select location</option>
                            @role('super-admin')
                                <option value="Top of title" {{ $ad->location == 'Top of title' ? 'selected' : '' }}>Top of
                                    title</option>
                                <option value="Bottom of title" {{ $ad->location == 'Bottom of title' ? 'selected' : '' }}>
                                    Bottom of title
                                </option>
                            @endrole
                            <option value="Bottom Side" {{ $ad->location == 'Bottom Side' ? 'selected' : '' }}>Bottom Side
                            </option>
                            <option value="Right Side">Right Side</option>
                        </select>
                    </div>
                    <div class="form-group mb-2 d-flex justify-content-end">
                        <input type="submit" class="btn btn-success" value="{{ $ad->id ? 'Update' : 'Save' }}">
                    </div>
                </form>
            </div>
        </div>
        {{-- <p class="px-5">{{}}</p> --}}
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card p-4" style="overflow-x: scroll">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>url</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ads as $ad)
                            @php
                                $btnDelete = '0';
                            @endphp
                            @php
                                if ($ad->location == 'Top of news section' || $ad->location == 'Top of video section' || $ad->location == 'Top of agriculture section' || $ad->location == 'Top of entertainment section' || $ad->location == 'Top of sports section' || $ad->location == 'Top of world section' || $ad->location == 'Top of footer section') {
                                    echo $ad->location;
                                    if (Auth::user()->roles[0]->name == 'super-admin') {
                                        $btnDelete = '1';
                                    }
                                }
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ad->name }}</td>
                                <td><img src="{{ asset('storage') }}{{ '/' }}{{ $ad->image }}"
                                        style="width:100px" /></td>
                                <td>{{ $ad->url }}</td>
                                <td>{{ $ad->location }}</td>
                                <td class="text-nowrap py-4">
                                    <a href="{{ route('ads.edit.home', $ad) }}"
                                        class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                            class="fa fa-edit pr-2"></i></a>
                                    @role('super-admin')
                                        <span class="mx-2">|</span>
                                        <form action="{{ route('ads.delete', $ad) }}" method="post"
                                            onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-decoration-none action-btn text-white bg-danger px-3 py-1 border-0 rounded "><i
                                                    class="far fa-trash-alt py-2 pr-2"></i></button>
                                        </form>
                                    @endrole

                                    @role('admin')
                                        <span class="mx-2 "
                                            @if ($ad->location == 'Top of title' || $ad->location == 'Bottom of title') style="display:none" @endif>|</span>
                                        <form action="{{ route('ads.delete', $ad) }}" method="post"
                                            onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" @if ($ad->location == 'Top of title' || $ad->location == 'Bottom of title') style="display:none" @endif
                                                class="text-decoration-none action-btn text-white bg-danger px-3 py-1 border-0 rounded "><i
                                                    class="far fa-trash-alt py-2 pr-2"></i></button>
                                        </form>
                                    @endrole
                                </td>
                            </tr>
                            @php
                                $btnDelete = '0';
                            @endphp
                       
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
