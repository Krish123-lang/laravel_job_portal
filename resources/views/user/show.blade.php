@extends('layouts.app')

@section('title')
    {{ $listing->title }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ Storage::url($listing->feature_image) }}" class="card-img-top" alt="{{ $listing->title }}" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        <a href="{{ route('user.company', $listing->profile->id) }}" class="text-decoration-none text-dark">
                            <img src="{{Storage::url($listing->profile->profile_pic)}}" alt="{{$listing->profile->name}}" width="50" height="50" class="rounded-circle object-fit-cover">
                            <b>{{$listing->profile->name}}</b>
                        </a>

                        <h2 class="card-title">{{ $listing->title }}</h2>
                        <span class="badge bg-primary">{{ $listing->job_type }}</span>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Salary: ${{ number_format($listing->salary, 2) }}</li>
                            <li class="list-group-item fw-bold">Address: {{ $listing->address }}</li>
                            <li class="list-group-item">
                                <h4 class="mt-3">Description</h4>
                                <p class="card-text">{!! $listing->description !!}</p>
                            </li>
                            <li class="list-group-item">
                                <h4>Roles and Responsibilities</h4>
                                <span>{!! $listing->roles !!}</span>
                            </li>
                            <li class="list-group-item">
                                <p class="card-text mt-2 text-body-secondary">Application closing date:
                                    {{ $listing->application_close_date }}
                                </p>
                            </li>
                        </ul>

                        {{-- <p>Salary: ${{ number_format($listing->salary, 2) }}</p>
                        <p>Address: {{ $listing->address }}</p>
                        <h4 class="mt-4">Description</h4>
                        <p class="card-text">{!! $listing->description !!}</p>

                        <h4>Roles and Responsibilities</h4>
                        <span>{!! $listing->roles !!}</span>

                        <p class="card-text mt-4 text-body-secondary">Application closing date: {{ $listing->application_close_date }}</p> --}}

                        @if (Auth::check())
                            @if (Auth::user()->resume)
                            <form action="{{ route('application.submit', $listing->id) }}" method="post">
                                @csrf
                                <button class="btn btn-primary mt-3">Apply Now</button>
                            </form>
                            @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Apply
                                </button>
                            @endif
                            @else
                            <p>Please login to apply!</p>
                        @endif

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

                            <form action="{{ route('application.submit', $listing->id) }}" method="post">
                                @csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload Resume</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" name="resume" id="resume">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="btnApply" disabled class="btn btn-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputElement = document.querySelector('input[type="file"]');
            const pond = FilePond.create(inputElement);

            pond.setOptions({
                server: {
                    url: '/resume/upload',
                    process: {
                        method: 'POST',
                        withCredentials: false,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        ondata: (formData) => {
                            formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file
                                .name);
                            return formData;
                        },
                        onload: (response) => {
                            document.getElementById('btnApply').removeAttribute('disabled');
                        },
                        onerror: (response) => {
                            console.log('Error while uploading...', response);
                        },
                    },
                },
                onprocessfile: (error, file) => {
                    if (!error) {
                        pond.getFile(file.id).status = 5;
                    }
                }
            });
        });






        //     const inputElement = document.querySelector('input[type="file"]');    
        //     const pond = FilePond.create(inputElement);

        //     pond.setOptions({
        //     server: {
        //         url: '/resume/upload',
        //         process: {
        //             method: 'POST',
        //             withCredentials: false,
        //             headers: {'X-CSRF-TOKEN':'{{ csrf_token() }}'},
        //             ondata:(formData)=>{
        //                 formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)
        //                 return formData
        //             },
        //             onload: (response)=>{
        //                 document.getElementById('btnApply').removeAttribute('disabled')
        //             },
        //             onerror: (response)=>{
        //                 console.log('error while uploading...', response)
        //             },
        //         },
        //     },
        // });
    </script>
@endpush
