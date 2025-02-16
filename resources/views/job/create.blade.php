@extends('layouts.admin.main')
@section('title')
    Create Job
@endsection

@push('style')
<style>
    .note-insert{
        display: none !important;
    }
</style>    
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h1>Post a Job</h1>
                <form action="{{ route('job.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="feature_image" class="form-label">Feature image</label>*
                        <input type="file" class="form-control" id="feature_image" name="feature_image" aria-describedby="feature_image">
                        @error('feature_image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>*
                        <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title" aria-describedby="title">
                        @error('title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>*
                        <textarea class="form-control summernote" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles and Responsibility</label>*
                        <textarea class="form-control summernote" id="roles" rows="3" name="roles">{{ old('roles') }}</textarea>
                        @error('roles')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <p>Job Types *</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="full_time" value="Full Time" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Full Time
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="part_time" value="Part Time">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Part Time
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="casual" value="Casual">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Casual
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="contract" value="Contract">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Contract
                            </label>
                        </div>
                        @error('job_type')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                        <div class="mb-3">
                            <label for="title" class="form-label">Address</label>*
                            <input type="text" class="form-control" value="{{ old('address') }}" id="address" name="address" aria-describedby="address">
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Salary</label>*
                            <input type="number" class="form-control" value="{{ old('salary') }}" id="salary" name="salary" aria-describedby="salary">
                            @error('salary')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Application Closing Date</label>*
                            <input type="text" class="form-control" value="{{ old('application_close_date') }}" id="datepicker" name="application_close_date" aria-describedby="application">
                            @error('application_close_date')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-success">Post Job</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
