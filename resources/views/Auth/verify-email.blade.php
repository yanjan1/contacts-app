@extends('layouts.app')

@section('title', 'Request Email Verification')
@section('content')
    <section class="container mt-5" style="max-width: 400px;">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form class="my-4" action="{{ route('verification.resend') }}" method="POST">
            @csrf

            {{-- include like register the sucess and error --}}


            <h3 class="mb-4">Request Email Verification</h3>

            @if (session('success') || session('error'))
                <div class="my-3">
                    @include('partials.sucesserror')
                </div>
            @endif
            <p>In case, you have signed up for our service, and have not verified your email, you can request a verification mail by filling out the form below.</p>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>          

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
       
        @include('partials.formlinks')
        
    </section>
@endsection
