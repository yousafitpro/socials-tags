@extends('circle-layout.layout')
@section('content')

    @if(my_social_profiles(auth()->user()->id)['Facebook']->access_token)
        <br><br>
        <h5 style="text-align: center">Please connect your facebook account to go further</h5>
       <div style="width: 100%; height: 20vh" class="myFlex">
<div>

    <button class="btn btn-primary btn-sm bg-success" style="color: white" onclick="facebookLogin()">Connect Facebook</button>
</div>

       </div>
    @else
        <div class="row">
            <div class="col-md-12"  >
                <small style="color: gray">Tripe Advisor</small>
                <form action="{{url('Tripe-Advisor')}}" method="post">
                    @csrf
                    <div class="input-group" style="height: 40px">
                        <input type="text" name="searchKeywords" style="text-align: center" placeholder="Enter keywords here..." class="form-control" aria-label="Text input with segmented  button">
                        <div class="input-group-append">
                            <button type="submit" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px" class="btn btn-outline-secondary">Search</button>

                        </div>
                </form>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>

                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email / Phone</th>
                                <th>Platform</th>
                                <th>date</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Muhamamd Yousaf</td>
                                <td>yousaf.itpro@gmail.com</td>
                                <td>Facebook</td>
                                <td>12-12-2023</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                            <li><a class="dropdown-item" href="#">Comlete Detail</a></li>

                                        </ul>
                                    </div>
                                </td>

                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email / Phone</th>
                                <th>Platform</th>
                                <th>date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '191326023654222',
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
        {{--if(!'{{my_social_profiles(auth()->user()->id)['Facebook']->access_token}}')--}}
        {{--{--}}

        {{--    --}}
        {{--}--}}
        function facebookLogin()
        {

            FB.login(function(response) {
                console.log("data",response)
                if (response.authResponse) {
                    console.log("Success",response)
                    $.ajax({
                        url:"{{url('social-connect/save-facebook-token')}}",
                        method:'post',
                        data: {"_token": "{{ csrf_token() }}",'access_token':response.authResponse.accessToken,'userid':response.authResponse.userID,'expire_in':response.authResponse.expiresIn,'expire_at':response.authResponse.expiresIn,'expire_at':response.authResponse.data_access_expiration_time},
                        beforeSend:function(){

                        },
                        success:function(response){

                       alert("Facebook Successfully Connected")

                        },
                        error: function (jqXHR, textStatus, errorThrown) {


                        },
                        complete:function(data){
                           // window.location.reload()
                        }
                    })
                    // The person logged into your app
                } else {
                    console.log("error".response)
                    // The person cancelled the login dialog
                }
            });
        }
    </script>
@endsection
