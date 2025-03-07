@extends('layouts.app')

@section('title')
    Jobs Applied
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-md-8">
            <h3>Applied Jobs</h3>
            @foreach ($users as $user)
                @foreach ($user->listings as $listing)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $listing->title }}</h5>
                            <p class="card-text">Applied: {{ $listing->pivot->created_at }}</p>
                            <a href="{{ route('job.show', $listing->slug) }}" class="btn btn-dark">View</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
