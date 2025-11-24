@extends('layouts.admin-auth')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">

                <div class="text-center mb-4">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">Enter your email and we’ll send reset instructions.</p>
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

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}" required autofocus>
                    </div>

                    <button class="btn btn-primary w-100">
                        Send Reset Link
                    </button>

                </form>

                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Back to Login</a>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
