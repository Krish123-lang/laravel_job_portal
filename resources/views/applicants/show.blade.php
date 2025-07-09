@extends('layouts.admin.main')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8 mt-5">
                <h1 class="fs-3">{{ $listings->title }}</h1> <hr>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
            </div>

            @forelse ($listings->users as $user)
                <div class="card mt-5 {{$user->pivot->shortlisted?'text-bg-success':''}} ">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto">
                            @if ($user->profile_pic)
                                <img src="{{ Storage::url($user->profile_pic) }}" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $user->name }}">
                            @else
                                <img src="https://placehold.co/400" class="rounded-circle w-80" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $user->name }}">
                            @endif
                        </div>

                        <div class="col-auto">
                            <div class="card-body">
                                <p class="fw-bold">{{ $user->name }}</p>
                                <p class="card-text">{{ $user->email }}</p>
                                <p class="card-text">{{ $user->pivot->created_at }}</p>
                            </div>
                        </div>
                        <div class="col d-flex" style="justify-content: flex-end">
                            <form action="{{ route('applicants.shortlist', [$listings->id, $user->id]) }}" method="post">
                                @csrf
                                <a href="{{Storage::url($user->resume)}}" target="_blank" class="btn btn-primary">Download resume</a>
                                <button type="submit" class="{{$user->pivot->shortlisted?'btn btn-success disabled':'btn btn-dark'}}">
                                    {{$user->pivot->shortlisted?'Shortlisted':'Shortlist'}}
                                </button>
                            </form>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </div>
            @empty
                <h1>No Applicants have applied yet!!</h1>
            @endforelse
        </div>
    </div>
@endsection
