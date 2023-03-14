<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Promotamedia | Login">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Promotamedia | Login</title>

    <!-- Styles -->
    @include('circle-layout.css')

</head>
<body class="login-page">
<div class='loader'>
    <div class='spinner-grow text-primary' role='status'>
    </div>
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-12 col-lg-4">
            <div class="card login-box-container">
                <div class="card-body">
                    <div class="authent-logo">
                        <img src="{{asset('theme/assets/images/logo@2x.png')}}" alt="">
                    </div>
                    <div class="authent-text">
                        <p>Welcome to Promotamedia</p>
                        <p>Please Sign-in to your account.</p>
                    </div>

                    <form method="POST" action="{{ route('postLogin') }}">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInput">Email address</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>





                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Remeber me</label>
                        </div>

                            @if(session('message',false))
                                <div style="text-align: center; color: darkred">
                                    <strong>{{session('message')}}</strong>
                                    {{\Illuminate\Support\Facades\Session::forget('message')}}
                                </div>

                                @endif
                        <br>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                            <button class="btn btn-primary">Facebook</button>
                        </div>
                    </form>
                    <div class="authent-reg">
                        <p>Not registered? <a href="register.html">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Javascripts -->
@include('circle-layout.js')
</body>
</html>
