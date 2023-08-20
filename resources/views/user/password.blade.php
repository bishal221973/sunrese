@extends('layouts.app')
@section('content')
    <div class="font-noto" style="margin: 0">
        <div class="container-fluid" style="padding:0">
            <div class="card z-depth-0 bg-transparent border-0 mb-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                            <a href="{{ route('home') }}" class="text-dark breadcrumb-active"
                                style="text-decoration:none">Dashboard</a>
                            <label style="color: #767575;width: 180px;position: relative;;left:-20px"; >Change Password</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="font-roboto">
            <div class="text-center">
                <h2 class="h2-responsive font-weight-bold">Change Password</h2>
            </div>

            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card border">
                        <div class="card-body">
                            {{--     
                            <div class="my-3">
                                @include('alerts.all')
                            </div> --}}

                            <form action="{{ route('user.updatePassword',$user) }}" method="post" class="form">
                                @csrf
                                @method('PUT')



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
