@extends('circle-layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">

                     <div class="myFlex">
                         <button class="btn btn-primary" type="button"  style="zoom: 1.2; margin-top: 5px"  >
                             <i data-feather="facebook"></i>
                         </button>
                     </div>
                    <br>
                    <h5 class="card-title" style="text-align: center">Facebook</h5>
                    <div class="myFlex">
{{--                        <button onclick="connect('Facebook','{{auth()->user()->id}}')" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >--}}
{{--                            Connect--}}
{{--                        </button>--}}
                        <a href="{{url('Facebook')}}" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >
                            Manage
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">

                    <div class="myFlex">
                        <button class="btn btn-primary" type="button"  style="zoom: 1.2; margin-top: 5px"  >
                            <img style="width: 50px" src="{{asset('icon-images/binglogo.png')}}">
                        </button>
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align: center">Bing</h5>
                    <div class="myFlex">
{{--                        <button onclick="connect('Twitter','{{auth()->user()->id}}')" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >--}}
{{--                            Connect--}}
{{--                        </button>--}}
                        <a href="{{url('Bing')}}" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >
                            Manage
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">

                    <div class="myFlex">
                        <button class="btn btn-primary" type="button"  style="zoom: 1.2; margin-top: 5px"  >
                            <img style="width: 20px" src="{{asset('icon-images/google-my-bussines-logo.png')}}">

                        </button>
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align: center">Google My Business</h5>
                    <div class="myFlex">
{{--                        <button onclick="connect('Instagram','{{auth()->user()->id}}')" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >--}}
{{--                            Connect--}}
{{--                        </button>--}}


                        <a href="{{url('google-my-business')}}" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >
                            Manage
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">

                    <div class="myFlex">
                        <button class="btn btn-primary" type="button"  style="zoom: 1.2; margin-top: 5px"  >
                            <img style="width: 80px" src="{{asset('icon-images/tripe-advisor.svg')}}">
                        </button>
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align: center">Tripe Advisor</h5>
                    <div class="myFlex">
{{--                        <button onclick="connect('Instagram','{{auth()->user()->id}}')" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >--}}
{{--                            Connect--}}
{{--                        </button>  --}}
                        <a href="{{url('Tripe-Advisor')}}" class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >
                            Manage
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">

                    <div class="myFlex">
                        <button class="btn btn-primary" type="button"  style="zoom: 1.2; margin-top: 5px"  >
                            <i data-feather="linkedin"></i>
                        </button>
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align: center">linkedin</h5>
                    <div class="myFlex">
                        <button class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >
                            Connect
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card stat-widget">
                <div class="card-body">

                    <div class="myFlex">
                        <button class="btn btn-primary" type="button"  style="zoom: 1.2; margin-top: 5px"  >
                            <i data-feather="youtube"></i>
                        </button>
                    </div>
                    <br>
                    <h5 class="card-title" style="text-align: center">Facebook</h5>
                    <div class="myFlex">
                        <button  class="btn btn-primary btn-sm" type="button"  style="zoom: 1.2; width: 150px; margin-top: 5px"  >
                            Connect
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '{{config('myconfig.FB.app_id')}}',
                cookie     : true,
                xfbml      : true,
                version    : '{{config('myconfig.FB.api_version')}}'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        function connect(name,id)
        {
            if(name=="Facebook")
            {
                facebookLogin(id);
            }
            if(name=="Instagram")
            {
                instagramLogin(id);
            }
            if(name=="Instagram")
            {
                instagramLogin(id);
            }
            if(name=="Twitter")
            {
                twitterLogin(id)
            }
        }
        function twitterLogin(id)
        {
            window.location.href='https://twitter.com/i/oauth2/authorize?response_type=code&client_id={{config("myconfig.TW.client_id")}}&redirect_uri={{url("social-connect/index")}}&scope=tweet.read+tweet.write+users.read+offline.access&state=twitter&code_challenge=challenge&code_challenge_method=plain'
        }
        function facebookLogin(con_id)
        {

            FB.login(function(response) {
                console.log("data",response)
                if (response.authResponse) {
                    console.log("Success",response)
                    $.ajax({
                        url:"{{url('social-connect/save-facebook-token')}}",
                        method:'post',
                        data: {"_token": "{{ csrf_token() }}",'con_id':con_id,'access_token':response.authResponse.accessToken,'userid':response.authResponse.userID,'expire_in':response.authResponse.expiresIn,'expire_at':response.authResponse.expiresIn,'expire_at':response.authResponse.data_access_expiration_time},
                        beforeSend:function(){

                        },
                        success:function(response){



                        },
                        error: function (jqXHR, textStatus, errorThrown) {


                        },
                        complete:function(data){
                            window.location.reload()
                        }
                    })
                    // The person logged into your app
                } else {
                    console.log("error".response)
                    // The person cancelled the login dialog
                }
            });
        }
        function instagramLogin(con_id)
        {

            window.location.href='https://www.instagram.com/oauth/authorize?client_id=1063757440972100&redirect_uri=https://votersnews.com/social-connect/index&scope=user_profile,user_media&response_type=code'
        }
    </script>
@endsection
