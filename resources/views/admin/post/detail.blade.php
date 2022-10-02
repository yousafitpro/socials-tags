
    @extends('layouts.app')


    @section('content')

           <div style="height:{{!request('top_nave',false)?'90vh':'100vh'}}; overflow: auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card shadow wallPostCard" >

                        <div class="row">
                            <div class="col-md-12 ">
                                <br>
                                <div style="width: 100%" class="myFlex">

                                    <img src="{{asset($post->image)}}" style=" max-height:40vh " class="wallPostModalImage">

                                </div>
                            </div>
                        </div>

<br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-2">
                                    <div class="row">
                                        @if($type=="image")
                                            <div class="col-1">
                                                <img src="https://www.placecage.com/640/360" style="width: 40px; height: 40px; border-radius: 50%">
                                            </div>
                                        @endif
                                        <div class="col-{{$type=='text'?'9':'7'}}">
                                            <label style="font-size: 13px; color: gray; font-weight: bold">{{$username}}</label><div></div>
                                            <small>{{ \Carbon\Carbon::parse($p->created_at)->diffForhumans() }}</small>
                                        </div>
                                        <div class="col-4">
                                            @if($category=="youtube")
                                                <img src="{{asset('wall/youtube.png')}}">
                                            @elseif($category=="native")
                                                <img src="{{asset('wall/comment.png')}}">
                                            @endif
                                        </div>
                                    </div>                                </div>
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
           </div>
    @endsection

