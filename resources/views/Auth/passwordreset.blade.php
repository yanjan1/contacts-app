@extends('layouts.app')

@section('title', 'Password Reset')
@section('content')
    <section class="container mt-5" style="max-width: 400px;">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form class="my-4" action="{{ route('password.email') }}" method="POST">
            @csrf

            <h2 class="mb-4 text-center">Reset your password</h2>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>


            <button type="submit" class="btn btn-primary w-100">Request Password Reset Link</button>
        </form>

         @include('partials.formlinks')

    </section>
@endsection
