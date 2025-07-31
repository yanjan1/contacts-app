@extends('layouts.app')

@section('title', 'Login Page')
@section('content')
    <section class="container mt-5" style="max-width: 400px;">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form class="my-4" action="{{ route('login.submit') }}" method="POST">
            @csrf

            <h2 class="mb-4 text-center">Login</h2>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberme" name="rememberme">
                <label class="form-check-label" for="rememberme">
                    Remember me ?
                </label>
            </div>


            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p>Forgot password? <a href="{{ route('Auth.resetpassword') }}"> Click here to reset</a> or Don't have an account yet ? <a
                href="{{ route('register') }}"> sign up here</a></p>
    </section>
@endsection
