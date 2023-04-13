@extends('circle-layout.layout')
@section('content')
    <br><br>
    <h5 style="text-align: center">Please connect your google account</h5>
    <div style="width: 100%; height: 20vh" class="myFlex">
        <div>

            <a class="btn btn-primary btn-sm bg-success" href="{{url('Google/Login')}}" style="color: white">Connect</a>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            @if(my_social_profiles(auth()->user()->id)['Google']->access_token)
                <div class="row">
                    <div class="col-md-12">
                        <div style="float: right; color: green">
                            <small>Page ID: {{my_social_profiles(auth()->user()->id)['Google']->userid}}</small>
                        </div>
                        <div>

                            <h3>{{my_social_profiles(auth()->user()->id)['Google']->given_name}}</h3>
                            <small>Your Account is connected Now!</small>
                            <a href="{{url('My-Google/Manage-Business')}}" class="btn btn-outline-primary pull-right"> Manage </a>
                        </div>



                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
