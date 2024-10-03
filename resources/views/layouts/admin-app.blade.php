<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="{{asset('site/assets/images/favicon/3.png')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('public'.mix('/admin/js/app.js')) }}" defer></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link href="{{ asset('public'.mix('/admin/css/app.css')) }}" rel="stylesheet">

</head>
    <body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        @include('admin.includes.header')

        @include('admin.includes.sidebar')

        @yield('content')

        @include('admin.includes.footer')

        @include('admin.includes.right-sidebar')

    </div>
    </body>
</html>
