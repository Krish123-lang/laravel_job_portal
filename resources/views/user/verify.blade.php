@extends('layouts.app')
@section('title')
    Verification
@endsection

@section('content')
    <div class="row g-4 mt-5 justify-content-center">
        <div class="card  mb-3">
            <div class="card-header fw-bold">Verify Account</div>
            <div class="card-body">
                <p class="card-text">Your account is not verified. Please verify your account! <a href="{{ route('resend.email') }}">Resend Verification Link.</a></p>
            </div>
        </div>
    </div>
@endsection
