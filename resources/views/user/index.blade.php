@extends('layouts.app')
@section('content')
    <div class="font-noto" style="margin: 0">
        <div class="container-fluid" style="padding:0">
            <div class="card z-depth-0 bg-transparent border-0 mb-4">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="d-flex align-self-center h2-responsive mdb-color-text font-weight-bold">
                            <a href="{{route('home')}}" class="text-dark breadcrumb-active" style="text-decoration:none">Dashboard</a>
                            <label style="color: #767575">User</label>
                            {{-- <a href="#" class="text-dark breadcrumb-active" style="text-decoration:none">Dashboard</a> --}}
                        </div>
                        <div class="ml-auto">
                            <a class="btn btn-primary btn-md z-depth-0" href="{{ route('user.create') }}"><span
                                    class="mr-2"><i class="fa fa-plus"></i></span> New User</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="my-5"></div> --}}

            <div class="card z-depth-0">
                <div class="card-body" style="overflow-x: scroll">
                    <table class="table" id="myTable">
                        <thead>
                            <tr class="text-uppercase">
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Change Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="py-4">{{ $loop->iteration }}</td>
                                    <td class="py-4">{{ $user->name }}</td>
                                    <td class="py-4">{{ $user->username }}</td>
                                    <td class="py-4">{{ $user->email }}</td>
                                    <td class="py-4">
                                        @foreach ($user->getRoleNames() as $role)
                                        <span
                                        class="py-1 px-2 d-inline-block shadow-none text-center rounded text-capitalize"
                                        style="background-color: #f2f7fb; font-size: 13px; min-width: 110px;">{{ str_replace('-', ' ', $role) }}</span>
                                        @if (!$loop->last)
                                        |
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="py-4">
                                        <a href="{{route('user.updatePassword',$user)}}" class="text-decoration-none btn btn-info">Change</a>
                                    </td>
                                    <td class="text-nowrap py-4">
                                        <a href="{{ route('user.edit', $user) }}" class="text-decoration-none action-btn text-white bg-warning px-3 py-2 rounded"><i
                                                class="fa fa-edit pr-2"></i>Edit</a>
                                        <span class="mx-2">|</span>
                                        <form action="{{ route('user.destroy', $user) }}" method="post"
                                            onsubmit="return confirm('Are you sure to delete ?')"
                                            class="form-inline d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-decoration-none action-btn text-white bg-danger px-3 py-1 border-0 rounded"><i
                                                    class="far fa-trash-alt py-2 pr-2"></i>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="42" class="text-center">** Users does not exist **</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
