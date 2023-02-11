<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Voters News</title>

    <link rel="icon" type="image/x-icon" href="{{asset('icon/small-logo.png')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"
    ></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="{{ asset('backend-theme/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
</head>
<style>
    .myFlex {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .clickOpacity:hover{
        opacity: 0.5;
    }
    .clickOpacity:active{
        opacity: 1;
    }
</style>
<body style="height: 100vh; overflow: hidden">
    <div id="app">
        @if(!request('top_nave',false))
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img style="min-width: 150px; width: 20vw" src="{{asset('icon/icon.png')}}">

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ml-auto" >
                            <li class="nav-item" sty>
                                <a class="nav-link"  href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link" href="{{url('privacy-policy')}}">Privacy Policy</a>
                            </li>
                            <!-- Authentication Links -->
                            @guest



                                {{--                            @if (Route::has('login'))--}}
                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                                {{--                                </li>--}}
                                {{--                            @endif--}}


                                {{--                            @if (Route::has('register'))--}}
                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                                {{--                                </li>--}}
                                {{--                            @endif--}}
                            @else
                                {{--                            <?php--}}
                                {{--                        if (auth()->check())--}}
                                {{--                        {--}}
                                {{--                            ?>--}}
                                {{--                        <li class="nav-item">--}}
                                {{--                            <a class="nav-link" href="{{route('user.showProfile')}}">Go to Dashboard</a>--}}
                                {{--                        </li>--}}
                                {{--                            <?php--}}
                                {{--                        }--}}
                                {{--                            ?>--}}


                            @endguest
                            @if(!auth()->check())
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{url('register')}}">Register</a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link" href="{{url('login')}}">Login</a>
                                </li>
                            @endif
                            @if(auth()->check())
                                <li class="nav-item pull-right" >
                                    <a class="nav-link "  href="{{url('logout')}}">Logout</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <main class="py-4">

            @yield('content')


        </main>
    </div>


</body>
</html>
