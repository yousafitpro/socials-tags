@extends('auth.layout')
@section('content')
    <div class="row justify-content-center no-gutters">
        <div class="col-lg-4 col-md-6 col-12 p-30 rounded10 b-2 b-dashed border-info">
            <div class="content-top-agile p-10">
                <a href="#" class="aut-logo">
                    <img src="{{$business->headerLogo()}}" style="width: 150px" alt="">
                </a>
                <h2 class="text-primary" style="color: {{$business->theme_color}} !important;">Phone Verification </h2>
                <p class="text-black-50">Verification code has been Sent to Registered Mobile Number</p>
            </div>
            <div class="">
                <form action="{{route('security.Verify2FACode')}}" method="post" class="web-form">
                    @csrf
                    @include('includes.form-errors')


                    <div class="form-group">
                        <div class="input-group mb-3">

                            <input  type="text" class="form-control pl-15 bg-transparent plc-black" style="text-align: center"  placeholder="Code" name="code" autocomplete="false" required>
                        </div>



                    </div>

                    <a class="btn btn-link" href="#" onclick="resendCode()">
                     resend code
                    </a>
                    <a class="btn btn-link pull-right" href="{{url('logout')}}">
                        logout
                    </a>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-info mt-10 theme-bg">Verify</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        function resendCode()
        {
            window.location.reload()
        }
    </script>
@stop
