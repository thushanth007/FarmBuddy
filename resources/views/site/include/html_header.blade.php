<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Farm Buddy - Organic Food">
<meta name="keywords" content="Farm Buddy ">
<meta name="author" content="Thusanth">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="{{asset('site/assets/images/favicon/3.png')}}" type="image/x-icon">
<title>@yield('title')</title>

<!-- Google font -->
<link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@<version>/dist/iconly.min.css">

<!-- bootstrap css -->
<link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('site/assets/css/vendors/bootstrap.css')}}">

<!-- wow css -->
<link rel="stylesheet" href="{{asset('site/assets/css/animate.min.css')}}">

<!-- Iconly css -->
<link rel="stylesheet" type="text/css" href="{{asset('site/assets/css/bulk-style.css')}}">

<!-- Template css -->
<link id="color-link" rel="stylesheet" type="text/css" href="{{asset('site/assets/css/style.css')}}">
<link id="color-link" rel="stylesheet" type="text/css" href="{{asset('site/assets/css/custom.css')}}">

<?php
    echo '<script> window.PHP_TO_JS = '.json_encode([
        'CURRENT_URL' => URL::to('/'),
        'STORAGE_URL' => Storage::url('/')
    ]).' </script>';
?>
