
    @extends('layouts.app')


    @section('content')
        <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous">
        </script>
        @include('functional_components.subscription')
           <div style="height:{{!request('top_nave',false)?'90vh':'100vh'}}; overflow: auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="{{url('/')}}"><img src="{{asset('icon/arrow-back.png')}}" style="width: 20px"> Go Back To Home</a>
                   <br><br>
                    <div class="card shadow wallPostCard" >

                        <div class="row">
                            <div class="col-md-12 ">
                                <br>
                                <div style="width: 100%; overflow: hidden; margin-top: -25px; max-height: 40vh; overflow: hidden" class="myFlex">

                                    <img src="{{asset($post->image)}}" style="width: 100%; height: 100% " class="wallPostModalImage">

                                </div>
                            </div>
                        </div>

<br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-2">
                                    <div class="row">

                                        <div class="col-12">
                                           <div style="float: left">
                                               <img src="{{url($post->user?$post->user->profile_image:'')}}" style="width: 40px; height: 40px; border-radius: 50%;">
                                               <label style="font-size: 13px; margin-left: 10px; color: gray; font-weight: bold">{{$post->username}}</label><div></div>

                                           </div>
                                            <small style="float: right">{{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}</small>
                                        </div>

                                    </div>                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $post->longcontent !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
               <br>
               <br>
           </div>
        @if(is_membershipExpired())
            <script>
                showSubscription_Modal()
            </script>
            @endif
    @endsection

