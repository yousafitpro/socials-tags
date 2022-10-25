@extends('iframe.layout')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Voters News | Wall</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="container-fluid">
    <div class="row" style="padding-bottom: 50px">


        @foreach($posts as $p)
            @include('iframe.Post',['type'=>$p->type,'category'=>$p->category,'id'=>$p->id,'username'=>$p->username])

        @endforeach

            <script>
               function shareNow(title,text,url){
alert("ok")
         navigator.share({
             title:title,
             text:text,
             url:url
         }).then(function (data){

         }).catch(function (error){

         })
                }
            </script>
{{--        @include('iframe.Post',['type'=>'text','category'=>'native','id'=>'3'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'4'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'5'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'6'])--}}
{{--        @include('iframe.Post',['type'=>'text','category'=>'native','id'=>'7'])--}}
{{--        @include('iframe.Post',['type'=>'text','category'=>'native','id'=>'8'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'9'])--}}
    </div>
</div>
</body>

</html>


@endsection
