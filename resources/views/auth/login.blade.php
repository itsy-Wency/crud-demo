@extends('layouts.admin-auth')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <h1 class="h4 text-gray-900 mb-2">Welcome Back!</h1>
                    <p class="mb-4">Login to access your account</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

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

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                               required>
                    </div>

                    <!-- Remember -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember"> Remember Me </label>
                    </div>

                    <div class="d-flex justify-content-between">
                        @if (Route::has('password.request'))
                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif

                        <button class="btn btn-primary">
                            Login
                        </button>
                    </div>

                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Create an Account</a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
