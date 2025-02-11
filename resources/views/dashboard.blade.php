@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mt-3 text-end">
        <h3>Hello, {{ auth()->user()->name }}</h3>

        @if (Auth::check() && auth()->user()->user_type == 'employer')
            <p>Your trial will be expired on <b>{{ auth()->user()->user_trial }}</b></p>
        @endif
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card text-bg-primary h-100 d-flex flex-column">
                <div class="card-body">
                    <h5 class="card-title">User Profile</h5>
                    <button class="btn btn-light mt-auto float-end">View</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-danger h-100 d-flex flex-column">
                <div class="card-body">
                    <h5 class="card-title">Post Job</h5>
                    <button class="btn btn-light mt-auto float-end">View</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-warning h-100 d-flex flex-column">
                <div class="card-body">
                    <h5 class="card-title">All Jobs</h5>
                    <button class="btn btn-light mt-auto float-end">View</button>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card text-bg-info h-100 d-flex flex-column">
                <div class="card-body">
                    <h5 class="card-title">Item 4</h5>
                    <button class="btn btn-light mt-auto float-end">View</button>
                </div>
            </div>
        </div>

    </div>
@endsection
