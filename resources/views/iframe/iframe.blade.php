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
    <div class="row">


        @include('iframe.Post',['type'=>'image','category'=>'youtube'])
        @include('iframe.Post',['type'=>'text','category'=>'native'])
        @include('iframe.Post',['type'=>'image','category'=>'youtube'])
        @include('iframe.Post',['type'=>'image','category'=>'youtube'])
        @include('iframe.Post',['type'=>'image','category'=>'youtube'])
        @include('iframe.Post',['type'=>'text','category'=>'native'])
        @include('iframe.Post',['type'=>'text','category'=>'native'])
        @include('iframe.Post',['type'=>'image','category'=>'youtube'])
    </div>
</div>
</body>

</html>


@endsection
