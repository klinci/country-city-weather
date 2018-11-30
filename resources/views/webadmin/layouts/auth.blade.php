<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title }}</title>
    @include('webadmin.includes.meta')
    @include('webadmin.includes.css')
    @yield('stylesheet')
</head>
<body>
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-body">
                @yield('content')
            </div>
        </div>
    </div>
    @include('webadmin.includes.modal')
    @include('webadmin.includes.js')
    @yield('scripts')
</body>
</html>
