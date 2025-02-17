@extends('layouts.admin.main')
@section('title')
    Profile
@endsection

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="row justify-content-center mt-5">
            <form action="{{ route('user.update.profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_pic" name="profile_pic" aria-describedby="profile_pic">
                        @if (auth()->user()->profile_pic)
                            <img class="img-thumbnail w-50 text-center" src="{{ Storage::url(auth()->user()->profile_pic) }}" alt="{{ auth()->user()->name }}">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </div>

            </form>
        </div>

        <div class="col-md-8 mt-4">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.password') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                name="new_password">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" name="new_password_confirmation">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
