@extends('circle-layout.layout')
@section('title',"Publish Post")
@section('content')
<div class="card">

    <div class="card-body">
        <a   href="{{url('My-Dashboard/posts')}}"><i data-feather="arrow-left" style="zoom: 1.4"></i> Go Back</a>
        <a   href="#" onclick="DeletePost('{{url('Facebook/Post-Delete',app_encrypt($post->id))}}')" style="float: right; color: darkred"><i data-feather="trash-2" style="zoom: 1.4; color: darkred"></i> Delete</a>
        <br>
        <br>
        <img src="{{asset('social-icons/insta.png')}}"  style="width: 30px; margin-top: -7px"> <span style="font-size: 25px; margin-left: 10px">{{$post->title}}</span>
        <br>
        <br>
        <br>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6">
                     <h5 style="color: lightgrey">Comments ( {{count($comments)}} )</h5>
                     <hr>
<br>


                     @if(count($comments)>0)
                     @foreach($comments as $p)
                     <div class="row">
                         <div class="col-sm-12">
                             <small style="float: right">{{human_readable_time($p['timestamp'])}}</small>
                             <a href="https://www.instagram.com/{{$p['username']}}" target="_blank"><h5>{{$p['username']}}</h5></a>


                             <h6>{{$p['text']}}</h6>
                         </div>
                     </div>

                     <br>
                     @endforeach
                     @else
                     <h5 style="text-align: center; color: lightgrey">No Comments</h5>
                     @endif
                 </div>
                 <div class="col-md-3">
                 </div>
                 <div class="col-md-3">
                     <h5 style="color: lightgrey">Liked By ( {{count($likes)}} )</h5>
                     <hr>
                     <br>


                     @if(count($likes)>0)
                         @foreach($likes as $p)
                             <div class="row">
                                 <div class="col-sm-12">
{{--                                     <small style="float: right">{{human_readable_time($p['created_time'])}}</small>--}}
                                     <a href="https://web.facebook.com/profile.php?id={{$p['id']}}" target="_blank"><h5>{{$p['name']}}</h5></a>


{{--                                     <small>{{$p['message']}}</small>--}}
                                 </div>
                             </div>

                             <br>
                         @endforeach
                     @else
                         <h5 style="text-align: center; color: lightgrey">None</h5>
                     @endif
                 </div>
             </div>
             <br>
             <div class="row">

                 <div class="col-md-9">
                 </div>
                 <div class="col-md-3">
                     <h5 style="color: lightgrey">Reacted By ( {{count($reactions)}} )</h5>
                     <hr>
                     <br>


                     @if(count($reactions)>0)
                         @foreach($reactions as $p)

                             <div class="row">
                                 <div class="col-sm-12">
                                     {{--                                     <small style="float: right">{{human_readable_time($p['created_time'])}}</small>--}}
                                     <a href="https://web.facebook.com/profile.php?id={{$p['id']}}" target="_blank"><h5>{{$p['name']}}
                                             @if($p['type']=='LIKE')
                                                 <i data-feather="thumbs-up" style="float: right"></i>
                                             @elseif($p['type']=='LOVE')
                                                 <i data-feather="heart"  style="float: right; color: darkred"></i>
                                             @else
                                                 <small style="float: right;">{{$p['type']}}</small>
                                             @endif
                                         </h5></a>





                                     {{--                                     <small>{{$p['message']}}</small>--}}
                                 </div>
                             </div>

                             <br>
                         @endforeach
                     @else
                         <h5 style="text-align: center; color: lightgrey">None</h5>
                     @endif
                 </div>
             </div>
         </div>
    </div>
</div>
<script>
    function DeletePost(url)
    {
        if(confirm("Are you sure?"))
        {
            window.location.href=url;
        }
    }
</script>
@stop
@section('js')

@endsection
