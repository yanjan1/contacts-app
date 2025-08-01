@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
    <section class="container mt-5" style="max-width: 400px;">

        <form class="my-4" action="{{ route('password.email') }}" method="POST">
            @csrf

            <h2 class="mb-4 text-center">Reset Password</h2>

            @if (session('success') || session('error'))
                <div class="my-3">
                    @include('partials.sucesserror')
                </div>
            @endif

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
        </form>

        @include('partials.formlinks')
    </section>

@endsection