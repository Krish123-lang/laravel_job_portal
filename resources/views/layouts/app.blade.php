<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    @stack('style')
</head>

<body>
    {{-- navbar  --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-center gap-2" href="{{ route('user.index') }}"><img src="{{ asset('assets/img/JOb sphere.png') }}" alt="{{config('app.name')}}" style="width: 25px; border-radius: 10px;"> {{config('app.name')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('user.index') }}">Home</a>
                    </li>

                    @if (Auth::check())
					<li class="nav-item dropdown">
						<a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							@if(auth()->user()->profile_pic)
							    <img src="{{Storage::url( auth()->user()->profile_pic)}}" width="40" height="40" class="rounded-circle">
							@else
							    <img src="{{ asset('assets/img/profile.png') }}" class="rounded-circle" width="40" height="40">
							@endif
						</a>
						<ul class="dropdown-menu">
                            @if (auth()->user()->user_type==='seeker')
                                <li class="nav-item">
                                    <a href="{{ route('seeker.profile') }}" class="nav-link text-light">{{ auth()->user()->name }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('job.applied') }}" class="nav-link text-light">Job Applied</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="logout" href="#">Logout</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" id="dashboard" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @endif

						</ul>
					</li>
                    @endif

                    {{-- @if (Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('seeker.profile') }}" class="nav-link text-light">{{ auth()->user()->name }}</a>
                        </li>
                    @endif --}}

                    @if (!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.seeker') }}">Job seeker</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.employer') }}">Employer</a>
                        </li>
                    {{-- @else
                        <li class="nav-item">
                            <a class="nav-link" id="logout" href="#">Logout</a>
                        </li> --}}
                        {{-- Here was the profile name --}}
                        {{-- @if (Auth::check())
                            <li class="nav-item">
                                <a href="{{ route('seeker.profile') }}" class="nav-link text-light">{{ auth()->user()->name }}</a>
                            </li>
                        @endif --}}
                    @endif

                    <form id="form-logout" method="POST" action="{{ route('logout') }}">@csrf</form>
                </ul>
            </div>
        </div>
    </nav>
    {{-- navbar  --}}

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        let logout = document.getElementById('logout');
        let form = document.getElementById('form-logout');
        logout.addEventListener('click', function() {
            form.submit();
        })
    </script>

    @stack('script')
</body>

</html>
