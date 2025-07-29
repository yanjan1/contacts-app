<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="description" content="@yield('description', 'Default description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    @include('partials.header')
    @include('partials.user.navbar', ['username' => 'Steven Smith'])
    @yield('content')
    @include('partials.footer')
</body>
</html>
