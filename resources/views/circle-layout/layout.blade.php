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
    <title>@yield('title','Promotomedia')</title>
    <link rel="icon" href="{{asset('icons/logo.png')}}" type="image/x-icon"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
        id="theme-styles"
    />
    <!-- Styles -->
    @include('circle-layout.css')
    @include('circle-layout.js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .myFlex {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
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

<script>
    $("#zero-conf").DataTable();
    function CloseModel(id){
        $(id).modal("hide")
    }
</script>
@php
    $toast=session('toast');
@endphp
<script>

    $(document).ready(function (){
        @if($toast)
        Swal.fire(
            '{{$toast['heading']}}',
            '{{$toast['message']}}',
            '{{$toast['type']}}'
        )
        @endif
    })
</script>
</body>
</html>
