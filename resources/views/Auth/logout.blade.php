@extends('layouts.app')
@section('content')
@include('partials.user.navbar', [
    'username' => $user->email
])

{{-- create a beautiful section tag ( bootstrap with a form for logout) --}}

<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-danger text-white text-center">
                    <h4 class="mb-0">Logout</h4>
                </div>
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('logout.submit') }}">
                        @csrf
                        <p class="mb-3">Are you sure you want to log out?</p>
                        {{-- put these two button in single row --}}
                        <div class="d-flex justify-content-center gap-3">
                            <button type="submit" class="btn btn-danger">Yes, Logout</button>
                            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">No, Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection