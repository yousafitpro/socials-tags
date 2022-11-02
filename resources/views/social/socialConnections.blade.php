@extends('layouts.dashboard')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3 class="text-center">Social Connections</h3>
            <br>
            <?php
                $connections=\App\Models\socialconnection::where('user_id',auth()->user()->id)->get();
                ?>

                    @foreach($connections as $c)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{\App\Http\Controllers\socialConnectController::getIcon($c->name)}}" style="width: 50px">
                            </div>
                            <div class="col-md-7">
                                <label style="font-size: 20px">{{$c->name}}</label>
                            </div>
                            <div class="col-md-3">
                                @if($c->status=="Disconnected")
                                    <button class="btn btn-outline-primary form-control" onclick="connect('{{$c->name}}','{{$c->id}}')">Connect</button>
                                    @endif
                                    @if($c->status!="Disconnected")
                                        <a href="{{url('social-connect/disconnect-connection',$c->id)}}" onclick="return confirm('Are you sure you want to Disconnect  ?')" class="btn btn-outline-success form-control">Connected</a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                        <br>
                    @endforeach

        </div>
    </div>
</div>
    <script>

        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1957610567771338',
                cookie     : true,
                xfbml      : true,
                version    : 'v15.0'
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
            alert("ok")
            window.open('https://www.instagram.com/oauth/authorize?client_id=1063757440972100&redirect_uri=https://votersnews.com/social-connect/facebook/login&scope=user_profile,user_media&response_type=code')
        }
    </script>
@endsection
