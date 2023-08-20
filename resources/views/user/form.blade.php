@extends('layouts.app')
@section('content')
    <div class="font-noto" style="margin: 0">
        <div class="container-fluid" style="padding:0">
            <div class="card z-depth-0 bg-transparent border-0 mb-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                            <a href="{{route('home')}}" class="text-dark breadcrumb-active" style="text-decoration:none">Dashboard</a>
                            <a href="{{route('user')}}" class="text-dark breadcrumb-active" style="text-decoration:none">User</a>
                            <label style="color: #767575">{{$user->exists ? "Edit" : "Create"}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="font-roboto">
            <div class="text-center">
                <h2 class="h2-responsive font-weight-bold">{{ $user->exists ? 'Edit' : 'Add New' }} User</h2>
            </div>

            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card border">
                        <div class="card-body">
                            {{--     
                            <div class="my-3">
                                @include('alerts.all')
                            </div> --}}

                            <form action="{{ isset($user->id) ? route('user.update', $user) : route('user.store') }}"
                                method="post" class="form">
                                @csrf
                                @isset($user->id)
                                    @method('PUT')
                                @endisset
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="my-input"
                                        value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="my-input"
                                        value="{{ old('email', $user->email) }}"
                                        @isset($user->id) readonly @endisset>
                                    @error('email')
                                        <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="my-input"
                                        value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Roles</label>
                                    {{--
                                    <select name="role" id="" class="my-input">
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" @if (old('role', $user->getRoleNames()->first()) == $role->name) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                    </select>
                                    --}}
                                    @foreach ($roles as $role)
                                        <div
                                            class="custom-control custom-checkbox  mb-3 {{ $role->id == '1' ? 'd-none' : '' }}">
                                            <input type="checkbox" name="roles[]" class="custom-control-input"
                                                id="role-checkbox-{{ $role->name }}" value="{{ $role->name }}"
                                                @if ($user->hasRole($role->name)) checked @endif>
                                            <label class="custom-control-label"
                                                for="role-checkbox-{{ $role->name }}">{{ ucfirst($role->name) }}</label>
                                        </div>
                                        @error('roles')
                                        <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                    @enderror
                                    @endforeach
                                </div>




                                @if ($user->id == null)
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="my-input">
                                        @error('password')
                                            <small id="emailHelp5" class=" text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="my-input">
                                    </div>
                                @endisset

                                <div class="d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-success   py-3">{{ $user->id ? 'Update' : 'Save' }}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- End of user form --}}
        </div>
    </div>
</div>
@endsection
