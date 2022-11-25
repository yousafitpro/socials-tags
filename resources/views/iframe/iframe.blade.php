@extends('iframe.layout')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Voters News | Wall</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
@if(!request('top_nave',false))
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img style="min-width: 150px; width: 20vw" src="{{asset('icon/icon.png')}}">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                {{--SAs--}}
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto" style="float: right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item" >
                            <a class="nav-link" href="{{url('privacy-policy')}}">Privacy Policy</a>
                        </li>
                        {{--                            @if (Route::has('login'))--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endif--}}


                        {{--                            @if (Route::has('register'))--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endif--}}
                    @else
                            <?php
                        if (auth()->check())
                        {
                            ?>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.showProfile')}}">Go to Dashboard</a>
                        </li>
                            <?php
                        }
                            ?>


                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endif
<div class="container-fluid">
    <div class="row" style="padding-bottom: 50px">


        @foreach($posts as $p)
            @include('iframe.Post',['type'=>$p->type,'category'=>$p->category,'id'=>$p->id,'username'=>$p->username])

        @endforeach

            <script>
                function shareOnFacebook(text,url){

                    document.exitFullscreen();
                 setTimeout(function (){

                     const navUrl = 'https://www.facebook.com/sharer/sharer.php?u=' +url;

                     window.open(navUrl,'_top');

                 },1000)
                }
                function shareOnTwitter(text,url) {
                    document.exitFullscreen();
                    const navUrl =
                        'https://twitter.com/intent/tweet?text='+text+'&url=' +url;
                    window.open(navUrl, '_blank');
                }
                var i=1;
                function bookmarkTab() {
                    if(i==1)
                    {
                         window.bookmarkTab();
                    }
                    i=i+1;
                    // let createBookmark = browser.bookmarks.create({
                    //     title: "bookmarks.create() on MDN",
                    //     url: "https://developer.mozilla.org/Add-ons/WebExtensions/API/bookmarks/create",
                    // });

                    // createBookmark.then(onCreated);

                    // console.log(tabInfo)
                    // chrome.bookmarks.create({title: tabsTab.title, url: tabsTab.url}, function(bookmark) {
                    //     currentBookmark = bookmark;
                    //     // if(typeof callback === 'function'){
                    //     //     // callback(tabsTab);
                    //     // }
                    // });
                }
                    function shareOnLinkedIn(text,url)
                {
                    document.exitFullscreen();
                    var url="https://www.linkedin.com/shareArticle?mini=true&;url="+url+"&title="+text
                    window.open(url, '_blank');
                }
                function shareWithImage(title,text,url,image_url)
                {
                    makeImage(image_url).then(function (data){
                        navigator.share({
                            files: [
                                new File([data], 'file.png', {
                                    type: data.type,
                                }),
                            ],
                            title:title,
                            text:text,
                            url:url
                        }).then(function (data){
                            // alert("Success! Successfully Shared")
                        }).catch(function (error){
                            alert("Sorry! Cannot be shared")
                        })
                    })
                }
               function shareNow(title,text,url){

                   navigator.share({
             title:title,
             text:text,
             url:url
         }).then(function (data){
             // alert("Success! Successfully Shared")
         }).catch(function (error){
           alert("Sorry! Cannot be shared")
         })
                }
                async function makeImage(image_url)
                {
                    //adasdas
                    const blob = await fetch(image_url).then(r=>r.blob())
                   return blob;
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
