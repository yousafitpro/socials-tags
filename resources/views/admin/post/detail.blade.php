
    @extends('layouts.app')


    @section('content')
<style>
    .likeDiv {
        border: solid 1px grey;
        width: 40px;

        border-radius: 10px;
        padding: 5px
    }
    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .likeDiv {
            width: 40px;
            zoom: 0.8;
            padding: 3px;

        }
    }
</style>
  @include('functional_components.subscription2')
           <div style="height:{{!request('top_nave',false)?'90vh':'100vh'}}; overflow: auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{url('/')}}"><img src="{{asset('icon/arrow-back.png')}}" style="width: 20px"> Go Back To Home</a>
                   <br><br>
                    <div class="card  wallPostCard" >

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

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-3">
                                    <div class="row">
                                        <div class="col-1" style="padding: 0;">
                                            <img class="clickOpacity" style="max-width: 40px; min-width: 25px; width: 8vw; padding: 5px; border-radius: 20%; border:solid 1px lightgrey" src="{{asset('icon/comment.png')}}">
                                        </div>

                                        <div class="col-9" style="padding: 0;">
                                            <input id="commentInput" class="form-control" style="height: 40px" placeholder="Enter comment here...">
                                        </div>
                                        <div class="col-1" style="padding: 0;">
                                            <div id="addCommentBtn" onclick="addComment('{{$post->id}}')">
                                                <img class="clickOpacity" style="max-width: 40px;min-width: 25px; width: 8vw; padding: 5px; border:solid 1px lightgrey" src="{{asset('icon/send.png')}}">

                                            </div>

                                        </div>
                                        <div class="col-1" style="padding: 0;">
                                             <div class="likeDiv" style="color: {{$post->like?'dodgerblue':'gray'}}" id="btnLike" class="clickOpacity"  onclick="addLike('{{$post->id}}')" >
{{--                                                 <img  style="max-width: 40px;min-width: 25px; width: 8vw; padding: 5px; border-radius: 20%; border:solid 1px lightgrey" src="{{asset('icon/like.png')}}">--}}
                                                 <i class="fa fa-thumbs-up" style="zoom: 2.1"></i>
                                             </div>
                                        </div>

                                    </div>                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="commentMsg">

                                </div>

                            </div>
                        </div>
                        <div style="padding: 10px">
                            <div class="row">
                                <div class="col-md-12">
                                    <b><h4 style="font-weight: bold">{!! $post->content !!}</h4></b>
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
                        <br>
                        <div id="commentSection">
                        @include('admin.post.comments')
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <br>
                    <br>
                    <div class="card" >
                     <div class="card-header">
                         <div class="card-title">
                             Related News
                         </div>
                     </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                @foreach(related_posts($post->id) as $p)
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{asset($p->image)}}" style="width:70px; height: 60px" class="wallPostModalImage">
                                    </div>
                                    <div class="col-md-8">
                                        <a href="{{url('admin/post/post-detail',$p->id)}}">
                                            <h6>{!! substr($p->content ,0,100)!!}</h6>
                                        </a>
                                    </div>
                                </div>
                                    <br>
                                    @endforeach
                            </div>
                        </div>

                        <br>


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

    <script>
            function addComment(id)
            {

                var comment=$("#commentInput").val()
                $("#commentInput").val('')


                $.ajax({
                    url:"{{route('admin.post.comment',$post->id)}}",
                    method:'post',
                    data: {"_token": "{{ csrf_token() }}",'comment':comment},
                    beforeSend:function(){
                        $("#commentMsg").html('<h6  style="text-align: center">Posting Comment...</h6>')
                    },
                    success:function(response){


                             $("#commentMsg").html('<h6  style="text-align: center; color: green">Comment Successfully Added</h6>')
                             $("#commentSection").empty()
                             $("#commentSection").append(response)





                    },
                    error: function (res) {
                        console.log(res)
                        $("#commentMsg").html('<h6  style="text-align: center; color:darkred">'+res.responseJSON+'</h6>')


                    },
                    complete:function(data){
                        setTimeout(function (){
                            $("#commentMsg").text('')
                        },5000)
                    }
                })
            }
            function addLike(id)
            {



               $("#btnLike").css('color','dodgerblue')
                $.ajax({
                    url:"{{route('admin.post.like',$post->id)}}",
                    method:'post',
                    data: {"_token": "{{ csrf_token() }}"},
                    beforeSend:function(){
                        $("#commentMsg").html('<h6  style="text-align: center">Please wait...</h6>')
                    },
                    success:function(response){


                        $("#commentMsg").html('<h6  style="text-align: center; color: green">Like Successfully Added</h6>')






                    },
                    error: function (res) {
                        console.log(res)
                        $("#commentMsg").html('<h6  style="text-align: center; color:darkred">'+res.responseJSON+'</h6>')


                    },
                    complete:function(data){
                        setTimeout(function (){
                            $("#commentMsg").text('')
                        },5000)
                    }
                })
            }
        </script>
    @endsection

