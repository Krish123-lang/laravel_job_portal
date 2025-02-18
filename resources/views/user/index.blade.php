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
            <h4>Recommended jobs</h4>
            <button class="btn btn-dark">view</button>
        </div>

        <div class="row mt-2 g-1">
            @foreach ($jobs as $job)
                <div class="col-md-3">
                    <div class="card">
                        <div class="position-absolute top-0 m-2">
                            <small class="badge text-bg-info">{{ $job->job_type }}</small>
                        </div>
                        {{-- {{ Storage::url($job->profile->profile_pic) }} --}}
                        <img class="card-img-top" height="200" src="{{ Storage::url($job->feature_image) }}" alt="{{ $job->title }}">
        
                        <div class="card-body text-center">
                            <span class="d-block fw-bold card-title">{{ $job->title }}</span>
                            <hr>
                            <span class="card-text mb-1">{{ $job->profile->name }}</span>
                            <div class="text-muted">{{ $job->address }}</div>
        
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fw-semibold">${{ number_format($job->salary, 2) }}</span>
                                <a href="{{ route('job.show', $job->slug) }}"><button class="btn btn-dark">Apply Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
@endsection
