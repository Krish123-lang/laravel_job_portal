@extends('layouts.admin.main')
@section('title')
    Dashboard
@endsection

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    {{-- <div class="row row-cols-1 row-cols-md-4 g-4"> --}}
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">

                <div class="mt-3 ">
                    <h4>Hello, {{ auth()->user()->name }}</h4>
                </div>

                @if (!auth()->user()->billing_ends)
                    @if (Auth::check() && auth()->user()->user_type == 'employer')
                        <p>Your trial
                            {{ now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expired' : 'will expire' }} on
                            <b>{{ auth()->user()->user_trial }}</b></p>
                    @endif
                @endif

                @if (Auth::check() && auth()->user()->user_type == 'employer')
                    <p>Your membership
                        {{ now()->format('Y-m-d') > auth()->user()->billing_ends ? 'was expired' : 'will expire' }} on
                        <b>{{ auth()->user()->billing_ends }}</b></p>
                @endif
            </li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total jobs ({{\App\Models\Listing::where('user_id', auth()->id())->count()}})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('job.index') }}">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Profile</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('user.profile') }}">View</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Plan ({{\App\Models\User::where('id', auth()->id())->first()->plan}})</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('subscribe') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> --}}
        </div>
        {{-- <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart Example
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Bar Chart Example
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div> --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                List of jobs
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
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Created on</th>
                            <th>Total applicants</th>
                            <th>View job</th>
                            <th>View applicants</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($jobs as $job)
                            <tr>
                                <td><strong>{{ Str::limit(strip_tags($job->title), 50, '...') }}</strong></td>
                                <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                <td>{{ $job->users()->count() }}</td>
                                <td>View Job</td>
                                <td><a href="{{ route('applicants.show', $job->slug) }}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
