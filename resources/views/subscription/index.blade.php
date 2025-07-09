@extends('layouts.app')
@section('title')
    Subscription
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <div class="row mt-5">
        @if (Session::has('message'))
            <div class="alert alert-warning">{{ Session::get('message') }}</div>
        @endif

        <div class="container my-5">
			<div class="row align-items-center align-items-xl-stretch flex-column flex-xl-row">
				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
						<h2>Essential</h2>
						<div class="my-2">
							<span class="fs-1 text-body-secondary fw-bold">$</span>
							<span class="fs-1 text-dak fw-bolder essential">20</span>
							<span class="fs-3 text-body-secondary">/week</span>
						</div>
						<p class="lead">
							Better insights for growing businesses that want more customers.
						</p>
						<hr class="opacity-10">
						<h4 class="my-4">Features include:</h4>
						<div class="my-1 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								50 Placeholder text commonly
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Incoming Transfers
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Traffic Tracking
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Automate Tasks
							</span>
						</div>
						<div class="mt-auto">
							<a href="{{ route('pay.weekly') }}" class="btn btn-primary text-white mt-4 w-100">
								Select plan
							</a>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 mt-5 position-relative">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
						<span class="badge position-absolute translate-middle top-0 start-75 text-bg-success px-3 py-2 rounded-4">Most Popular</span>
						<h2>Premium</h2>
						<div class="my-2">
							<span class="fs-1 text-body-secondary fw-bold">$</span>
							<span class="fs-1 text-dak fw-bolder premium">80</span>
							<span class="fs-3 text-body-secondary">/mo</span>
						</div>
						<p class="lead">
							Better insights for growing businesses that want more customers.
						</p>
						<hr class="opacity-10">
						<h4 class="my-4">All features of Essential plus:</h4>
						<div class="my-1 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								100 placeholder text commonly
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Incoming Transfers
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Traffic Tracking
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Automate Tasks
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Placeholder text commonly used
							</span>
						</div>
						<div class="mt-auto">
							<a href="{{ route('pay.monthly') }}" class="btn btn-primary text-white mt-4 w-100">
								Select plan
							</a>
						</div>
					</div>
				</div>

				<div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 mt-5">
					<div class="p-5 h-100 d-flex flex-column bg-body-tertiary shadow rounded-4">
						<h2>Advanced</h2>
						<div class="my-2">
							<span class="fs-1 text-body-secondary fw-bold">$</span>
							<span class="fs-1 text-dak fw-bolder advanced">200</span>
							<span class="fs-3 text-body-secondary">/year</span>
						</div>
						<p class="lead">
							Better insights for growing businesses that want more customers.
						</p>
						<hr class="opacity-10">
						<h4 class="my-4">All features of Essential plus:</h4>
						<div class="my-1 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								200 placeholder text commonly
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Incoming Transfers
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Traffic Tracking
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Automate Tasks
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Voluptate velit esse cillum
							</span>
						</div>
						<div class="mt-2 text-body-secondary">
							<span class="text-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
									<path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
								</svg>
							</span>
							<span>
								Placeholder text commonly used
							</span>
						</div>
						<div class="mt-auto">
							<a href="{{ route('pay.yearly') }}" class="btn btn-primary text-white mt-4 w-100">
								Select plan
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
