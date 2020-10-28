<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo-5/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Aug 2019 14:49:25 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
        
    <link rel="icon" type="image/x-icon" href="{{ url('/frontend') }}/assets/images/icons/favicon.ico">
    <link rel="stylesheet" href="{{ url('/frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/frontend') }}/assets/css/style.min.css">
    <link rel="stylesheet" href="{{ url('/frontend') }}/assets/css/main.css">
    <!-- <link rel="stylesheet" href="{{ url('/css') }}/bootstrap-3.3.7-dist/css/bootstrap.min.css"> -->
</head>
<body>
    <div class="page-wrapper">	
        <header class="header">
        @include('frontend.header.header_top')
        @include('frontend.header.header_middle')
        @include('frontend.header.header_bottom')
        </header><!-- End .header -->