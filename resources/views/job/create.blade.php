@extends('layouts.admin.main')
@section('title')
    Create Job
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h1>Post a Job</h1>
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="feature_image" class="form-label">Feature image</label>
                        <input type="file" class="form-control" id="feature_image" name="feature_image" aria-describedby="feature_image">
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control summernote" id="description" rows="3" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="roles" class="form-label">Roles and Responsibility</label>
                        <textarea class="form-control summernote" id="roles" rows="3" name="roles"></textarea>
                    </div>

                    <div class="mb-3">
                        <p>Job Types</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="job_type" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Full Time
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="job_type">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Part Time
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="job_type">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Casual
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job_type" id="job_type">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Contract
                            </label>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" aria-describedby="address">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" aria-describedby="salary">
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Application Closing Date</label>
                            <input type="text" class="form-control" id="datepicker" name="application_close_date" aria-describedby="application">
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
