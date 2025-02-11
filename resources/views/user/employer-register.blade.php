@extends('layouts.app')
@section('title')
    Employer-register
@endsection

@section('content')
    <div class="controller">

        <div class="row mt-5">
            <div class="col-md-6">
                <h1>Looking for an Employee?</h1>
                <h3>Please Create an account</h3>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header fs-3 fw-semibold">Employer Registration</div>
                    <div class="card-body">
                        <form action="{{ route('store.employer') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
