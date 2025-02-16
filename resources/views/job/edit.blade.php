@extends('layouts.admin.main')
@section('title')
    Edit Job
@endsection

@push('style')
    <style>
        .note-insert {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h1>Edit | {{ $listing->title }}</h1>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                <form action="{{ route('job.update', $listing->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="feature_image" class="form-label">Feature image</label>
                        <input type="file" class="form-control" id="feature_image" name="feature_image"
                            aria-describedby="feature_image">
                        @error('feature_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- @if ($listing->feature_image)
                            <img src="{{ asset('storage/' . $listing->feature_image) }}" alt="Feature Image" class="img-thumbnail mb-2" width="200">
                        @endif --}}


                        <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                            @if ($listing->feature_image)
                                <img src="{{ asset('storage/' . $listing->feature_image) }}" alt="Feature Image"
                                    class="img-thumbnail mb-2" width="80">
                            @endif
                        </span>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $listing->title }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $listing->feature_image) }}" alt="Feature Image"
                                            width="1000">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" value="{{ $listing->title }}" id="title"
                            name="title" aria-describedby="title">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control summernote" id="description" rows="3" name="description">{{ $listing->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles and Responsibility</label>
                        <textarea class="form-control summernote" id="roles" rows="3" name="roles">{{ $listing->roles }}</textarea>
                        @error('roles')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <p>Job Types </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="full_time" value="Full Time"
                                {{ $listing->job_type === 'Full Time' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Full Time
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="part_time" value="Part Time"
                                {{ $listing->job_type === 'Part Time' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Part Time
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="casual" value="Casual"
                                {{ $listing->job_type === 'Casual' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Casual
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="contract" value="Contract"
                                {{ $listing->job_type === 'Contract' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Contract
                            </label>
                        </div>
                        @error('job_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="title" class="form-label">Address</label>
                            <input type="text" class="form-control" value="{{ $listing->address }}" id="address"
                                name="address" aria-describedby="address">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Salary</label>
                            <input type="number" class="form-control" value="{{ $listing->salary }}" id="salary"
                                name="salary" aria-describedby="salary">
                            @error('salary')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Application Closing Date</label>
                            <input type="text" class="form-control" value="{{ $listing->application_close_date }}"
                                id="datepicker" name="application_close_date" aria-describedby="application" disabled>
                            @error('application_close_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success">Update Job</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
