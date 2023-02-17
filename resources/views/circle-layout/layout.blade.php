<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>|Promotomedia</title>
    <link rel="icon" href="{{asset('icons/logo.png')}}" type="image/x-icon"/>
    <!-- Styles -->
    @include('circle-layout.css')
</head>
<body>

<div class="page-container">
    @include('circle-layout.header')
    @include('circle-layout.sidebar')

    <div class="page-content">
        <div class="main-wrapper">
            @yield('content')
        </div>

    </div>
</div>

<!-- Javascripts -->
@include('circle-layout.js')
</body>
</html>
