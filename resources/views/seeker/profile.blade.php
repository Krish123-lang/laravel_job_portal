@extends('layouts.app')
@section('title')
    Profile
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            @if (Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            
            <form action="{{ route('user.update.profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_pic" name="profile_pic"
                            aria-describedby="profile_pic">
                        @if (auth()->user()->profile_pic)
                            <img class="img-thumbnail w-50 text-center" src="{{ Storage::url(auth()->user()->profile_pic) }}" alt="{{auth()->user()->name}}">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="name" value="{{auth()->user()->name}}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
