@extends('layouts.app')
@section('content')
@include('partials.user.navbar', [
    'username' => $user->email
])
<div class="container mt-5">
    <h1>Welcome to your Dashboard, {{ $user->email }}</h1>
    <p>This is your personal dashboard where you can manage your contacts and settings.</p>
    <p>Feel free to explore the features available.</p>
</div>

@endsection