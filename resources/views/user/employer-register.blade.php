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
                <div class="card" id="card">
                    <div class="card-header fs-3 fw-semibold">Employer Registration</div>
                    <div class="card-body">
                        <form action="#" id="registrationForm" method="POST">
                            <div class="mb-3">
                                <label for="" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="name" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button id="btnRegister" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>

                <div id="message" class="mt-3"></div>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        var url = "{{ route('store.employer') }}";
        document.getElementById('btnRegister').addEventListener("click", function(event) {
            var form = document.getElementById('registrationForm')
            var messageDiv = document.getElementById('message')
            var card = document.getElementById('card')
            messageDiv.innerHTML = ''
            var formData = new FormData(form)
            var button = event.target
            button.disabled = true
            button.innerHTML = 'Sending email...'

            fetch(url, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            }).then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error')
                }
            }).then(data => {
                button.innerHTML = 'Register'
                button.disabled = false
                messageDiv.innerHTML = '<div class="alert alert-success" role="alert">Registration Successful! Please check your email.</div>'
                card.style.display = 'none'
            }).catch(error => {
                button.innerHTML = 'Register'
                button.disabled = false
                messageDiv.innerHTML = '<div class="alert alert-danger" role="alert">Something went wrong! Please try again.</div>'
            })
        })
    </script>
@endpush
