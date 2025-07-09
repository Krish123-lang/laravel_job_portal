@extends('layouts.app')
@section('title')
    Home
@endsection

@push('style')
    <style>
        .card{
            box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
            transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
        }

        .card:hover{
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        }
    </style>
@endpush

@section('content')
    <div class="mt-3">
        <div class="d-flex justify-content-between">
            <h4>Filter jobs</h4>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Salary
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('user.index', ['sort'=>'salary_high_to_low']) }}">High to low</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index', ['sort'=>'salary_low_to_high']) }}">Low to high</a></li>
                </ul>

                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Date
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('user.index', ['date'=>'latest']) }}">Latest</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index', ['date'=>'oldest']) }}">Oldest</a></li>
                </ul>

                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Job Type
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('user.index', ['job_type'=>'Full Time']) }}">Full Time</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index', ['job_type'=>'Part Time']) }}">Part Time</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index', ['job_type'=>'Casual']) }}">Casual</a></li>
                    <li><a class="dropdown-item" href="{{ route('user.index', ['job_type'=>'Contract']) }}">Contract</a></li>
                </ul>

                <a class="btn btn-secondary" href="{{ route('user.index') }}">Reset</a>
            </div>
        </div>

        <div class="row mt-2 g-1">
            @forelse ($jobs as $job)
                <div class="col-md-3">
                    <div class="card  {{$job->job_type}}" style="height: 30em;">
                        <div class="position-absolute top-0 m-2">
                            <small class="badge text-bg-info">{{ $job->job_type }}</small>
                        </div>
                        {{-- {{ Storage::url($job->profile->profile_pic) }} --}}
                        <img class="card-img-top"  src="{{ Storage::url($job->feature_image) }}" alt="{{ $job->title }}" style="max-height: 170px">

                        <div class="card-body d-flex flex-column h-100 text-center">
                            <span class="d-block fw-bold fs-6 card-title">{{ Str::limit($job->title, 50) }}</span>
                            <hr>
                            <span class="d-block text-muted card-title" style="font-size: 13px">{{ Str::limit(strip_tags($job->description), 50, '...') }}</span>
                            <hr>
                            <div class="flex-grow-1 d-flex flex-column justify-content-end">
                                <span class="card-text mb-1"><p class="text-muted d-inline">Posted by:</p> {{ $job->profile->name }}</span>
                                <div class="text-muted"><i class="fa-solid fa-location-dot"></i> {{ $job->address }}</div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                                <span class="fw-semibold">${{ number_format($job->salary, 2) }}</span>
                                <a href="{{ route('job.show', $job->slug) }}"><button class="btn btn-dark">Apply Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1>No Jobs Found!</h1>
            @endforelse
        </div>

    </div>
@endsection
