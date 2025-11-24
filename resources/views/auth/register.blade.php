@extends('layouts.admin-auth')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <h1 class="h4 text-gray-900 mb-2">Create an Account</h1>
                </div>

                <!-- Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name') }}" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password"
                               class="form-control" required>
                    </div>

                    <!-- Confirm -->
                    <div class="form-group mb-4">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control" required>
                    </div>

                    <button class="btn btn-primary w-100">Register</button>

                </form>

                <hr>

                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
