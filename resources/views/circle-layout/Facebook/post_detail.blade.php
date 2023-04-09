@extends('circle-layout.layout')
@section('title',"Publish Post")
@section('content')
<div class="card">

    <div class="card-body">
        <a   href="{{url('My-Dashboard/posts')}}"><i data-feather="arrow-left" style="zoom: 1.4"></i></a>   <span style="font-size: 25px; margin-left: 10px">{{$post->title}}</span>
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
                             <small style="float: right">{{human_readable_time($p['created_time'])}}</small>
                             <a href="https://web.facebook.com/profile.php?id={{$p['from']['id']}}" target="_blank"><h5>{{$p['from']['name']}}</h5></a>


                             <small>{{$p['message']}}</small>
                         </div>
                     </div>

                     <br>
                     @endforeach
                     @else
                     <h5 style="text-align: center; color: lightgrey">Empty</h5>
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
                         <h5 style="text-align: center; color: lightgrey">Empty</h5>
                     @endif
                 </div>
             </div>
         </div>
    </div>
</div>
<script>

</script>
@stop
@section('js')

@endsection
