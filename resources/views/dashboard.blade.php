@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mt-3 text-end">
        <h3>Hello, {{ auth()->user()->name }}</h3>

        @if (!auth()->user()->billing_ends)
            @if (Auth::check() && auth()->user()->user_type == 'employer')
                <p>Your trial {{ now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expired' : 'will expire' }} on <b>{{ auth()->user()->user_trial }}</b></p>
            @endif
        @endif

        @if (Auth::check() && auth()->user()->user_type == 'employer')
            <p>Your membership {{ now()->format('Y-m-d') > auth()->user()->billing_ends ? 'was expired' : 'will expire' }} on <b>{{ auth()->user()->billing_ends }}</b></p>
        @endif

    </div>

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

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
