@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row mt-5">
        {{ auth()->user()->name }}
        {{ auth()->user()->email }}
    </div>
    <h1>Dashboard</h1>
@endsection
