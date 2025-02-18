@extends('layouts.admin.main')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            {{-- @foreach ($listings as $listing)
                {{ $listing->title }} | {{ $listing->user_count }} <br>

                @foreach ($listing->users()->get() as $applicant)
                    {{ $applicant->name }} <br>
                    {{ $applicant->email }} <br>
                @endforeach
            @endforeach --}}

            {{-- ====================================================== --}}

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <span>List of applicants</span>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created on</th>
                                <th>Total applicants</th>
                                <th>View job</th>
                                <th>View applicants</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{ $listing->title }}</td>
                                    <td>{{ $listing->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $listing->users()->count() }}</td>
                                    <td>View Job</td>
                                    <td><a href="{{ route('applicants.show', $listing->slug) }}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
