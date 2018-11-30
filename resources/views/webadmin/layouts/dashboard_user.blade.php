<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Login User</title>
    @include('webadmin.includes.meta')
    @include('webadmin.includes.css')
</head>
<body>
    <div class="accountbg"></div>
    <div class="wrapper-page">
        @yield('content')
    </div>
    @include('webadmin.includes.js')
</body>
</html>
