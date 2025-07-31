@extends('layouts.app')

@section('title', 'Signup Page')
@section('content')
    <section class="container mt-5" style="max-width: 400px;">

        <form class="my-4" action="{{ route('register.submit') }}" method="POST">
            
            @csrf
            
            <h2 class="mb-4 text-center">Signup</h2>
            
            @if (session('success') || session('error'))
              <div class="my-3">
                @include('partials.sucesserror')    
            </div>
            @endif
            
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>


            <button type="submit" class="btn btn-primary w-100">Signup</button>
        </form>
        @include('partials.formlinks')
    </section>
@endsection
