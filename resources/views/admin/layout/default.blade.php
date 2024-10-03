<!DOCTYPE html>
<html>

<head>
    @include('admin.include.html_header')
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    @include('admin.include.header')
    @include('admin.include.main_sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('admin.include.footer')
</div>
<!-- ./wrapper -->

<!--All modal-->
@include('admin.include.html_footer')

@yield('script')

</body>
</html>