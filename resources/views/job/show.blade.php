@extends('layouts.admin.main')
@section('title')
    Show Job
@endsection

@section('content')

    <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                @if($listing->feature_image)
                    <img src="{{ asset('storage/' . $listing->feature_image) }}" class="card-img-top rounded-top" alt="Feature Image" style="object-fit:cover; max-height:350px;">
                @endif
                <div class="card-body">
                    <h1 class="card-title text-primary mb-3">{{ $listing->title }}</h1>
                    <div class="mb-4">
                        <span class="badge bg-info text-dark me-2"><i class="fa-solid fa-suitcase"></i> {{ $listing->job_type }}</span>
                        <span class="badge bg-secondary me-2"><i class="fa-solid fa-location-dot"></i>  {{ $listing->address }}</span>
                        <span class="badge bg-success me-2"><i class="fa-solid fa-dollar-sign"></i> {{ $listing->salary }}</span>
                        <span class="badge bg-light text-muted"><i class="fa-solid fa-calendar-days"></i> Posted: {{ $listing->created_at->format('Y-m-d') }}</span>
                    </div>
                    <hr>
                    <h5 class="text-secondary mb-2 text-decoration-underline">Job Description</h5>
                    <div class="mb-4" style="white-space: pre-line;">
                        {!! $listing->description !!}
                    </div>
                    <h5 class="text-secondary mb-2 text-decoration-underline">Roles & Responsibilities</h5>
                    <div class="mb-4" style="white-space: pre-line;">
                        {!! $listing->roles !!}
                    </div>
                    <a href="{{ route('job.index') }}" class="btn btn-outline-primary mt-3"><i class="bi bi-arrow-left"></i> Back to Jobs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
