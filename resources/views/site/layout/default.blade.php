<!DOCTYPE html>
<html lang="en">

<head>
    @include('site.include.html_header')
</head>

<body class="bg-effect">

    <!-- Loader Start -->
    <!-- <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div> -->
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="pb-md-4 pb-0">
        @include('site.include.header')
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Footer Section Start -->
    <footer class="section-t-space">
        @include('site.include.footer')
    </footer>
    <!-- Footer Section End -->

    @yield('model')
    @yield('script')

    @include('site.include.html_footer')
</body>

</html>