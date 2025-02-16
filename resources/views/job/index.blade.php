@extends('layouts.admin.main')
@section('title')
    List Job
@endsection

@section('content')
    <div class="row justify-content-center">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <span>List of Jobs</span>
                <a href="{{ route('job.create') }}" class="btn btn-sm btn-primary float-end">Create Job</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Featured Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Roles</th>
                            <th>Job Type</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Featured Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Roles</th>
                            <th>Job Type</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($job_listings as $listing)
                            <tr>
                                <td>
                                    <span data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        @if($listing->feature_image)
                                            <img src="{{ asset('storage/' . $listing->feature_image) }}" alt="Feature Image" class="img-thumbnail mb-2" width="80">
                                        @endif
                                    </span>

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $listing->title }}</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $listing->feature_image) }}" alt="Feature Image" width="1000">
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </td>
                                <td>{{ $listing->title }}</td>
                                <td>{{ Str::limit($listing->description, 20, '...') }}</td>
                                <td>{{ $listing->roles }}</td>
                                <td>{{ $listing->job_type }}</td>
                                <td>{{ $listing->address }}</td>
                                <td>${{ $listing->salary }}</td>
                                <td>{{ $listing->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('job.edit', $listing->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('job.delete', $listing->id) }}" class="btn btn-sm btn-danger"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal{{ $listing->id }}">Delete</a>

                                    <form action="{{ route('job.delete', $listing->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal fade" id="exampleModal{{ $listing->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete |
                                                            {{ $listing->title }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you want to delete this record?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
