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
    <div class="row" style="padding-bottom: 30px">


        @foreach($posts as $p)
            @include('iframe.Post',['type'=>$p->type,'category'=>$p->category,'id'=>$p->id,'username'=>$p->username])

        @endforeach
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
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
