@extends('layouts.app')
@section('title', 'Reset Password')
@section('content')
    <section class="container mt-5 " style="max-width: 400px;">
        <form class="my-4" action="{{ route('password.update') }}" method="POST">
            @csrf

            <h2 class="mb-4 text-center">Reset Password</h2>

            @if (session('success') || session('error'))
                <div class="my-3">
                    @include('partials.sucesserror')
                </div>
            @endif

            <div class="mb-3">
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <label for="password1" class="form-label">Enter your new Password</label>
                <input type="password" name="password" class="form-control" id="password1" required autofocus>

                <label for="password2" class="form-label">Re-type your new Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password2" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Change Password</button>
        </form>
        @include('partials.formlinks')
    </section>

@endsection
