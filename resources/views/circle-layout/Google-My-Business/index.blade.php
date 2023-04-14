@extends('circle-layout.layout')
@section('content')
    <br><br>
    <h5 style="text-align: center">Please connect your google account</h5>
    <div style="width: 100%; height: 20vh" class="myFlex">
        <div>

            <a class="btn btn-primary btn-sm bg-success" href="{{url('My-Google/Login')}}" style="color: white">Connect</a>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            @if(my_social_profiles(auth()->user()->id)['Google']->access_token)
                <div class="row">
                    <div class="col-md-2">
                        <div class="myflex">
                            <img src="{{my_social_profiles(auth()->user()->id)['Google']->profile_image}}">
                        </div>
                    </div>
                    <div class="col-md-10">
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

    <br>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Accounts</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Account Name</th>
                            <th>Type</th>
                            <th>Verification State</th>
                            <th>Vetted State</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                       @foreach($accounts as $a)
                           <tr>
                               <td>{{$a['accountName']}}</td>
                               <td>{{$a['type']}}</td>
                               <td>{{$a['verificationState']}}</td>
                               <td>{{$a['vettedState']}}</td>
                               <td>
                                   <div class="dropdown">
                                       <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                       </button>
                                       <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                           <li><a class="dropdown-item" href="{{url('My-Google/Locations',$a['name'])}}">Locations</a></li>


                                       </ul>
                                   </div>
                               </td>

                           </tr>
                       @endforeach

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

@endsection
