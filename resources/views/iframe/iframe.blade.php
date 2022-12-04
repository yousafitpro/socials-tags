@extends('iframe.layout')
@section('content')
    <!DOCTYPE html>
<html>
<head>
{{--    asdasd--}}
    <title>Voters News | Wall</title>
    <link rel="icon" type="image/x-icon" href="{{asset('icon/fabicon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <noscript><meta http-equiv="REFRESH" content="0; url=https://www.mediapass.com/subscription/noscriptredirect?key=7191&asset=7828&uri=votersnews.com"></noscript>
    <script type="text/javascript" src="https://www.mediapass.com/static/js/mm.js"></script>
    <script type="text/javascript">MediaPass.init(7191, { asset:7828 });</script>
{{--asdasd--}}
</head>
{{--//asdasd--}}
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
    <br>
    <div class="row">


        <div class="col-md-6 offset-md-3">
            <div class="input-group mb-2">

                <input type="text" onkeyup="resetSearchInput()" class="form-control" id="searchText" style="text-align: center" placeholder="type here..." aria-label="Username" aria-describedby="basic-addon1">
                <div class="input-group-prepend">

                         <button class="btn btn-primary btn1"  style="width: 80px">

                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">

                                 <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                             </svg>

                         </button>


                    <button class="btn btn-primary btn2" onclick="window.location.reload()" style="display: none" >

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                        </svg>

                    </button>

                </div>
            </div>
        </div>


    </div>
    <div class="row ajaxDiv" style="padding-bottom: 50px">



            @include('iframe.Ajax-posts')

{{--        @include('iframe.Post',['type'=>'text','category'=>'native','id'=>'3'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'4'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'5'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'6'])--}}
{{--        @include('iframe.Post',['type'=>'text','category'=>'native','id'=>'7'])--}}
{{--        @include('iframe.Post',['type'=>'text','category'=>'native','id'=>'8'])--}}
{{--        @include('iframe.Post',['type'=>'image','category'=>'youtube','id'=>'9'])--}}
    </div>


    <script>
        var currentPage=2
        var lastPage=parseInt('{{$lastPage}}')
        function searchPosts()
        {
            var searchText=$("#searchText").val()


            $.ajax({
                url:"{{url('wall/index?type=web')}}&searchText="+searchText,
                method:'get',
                data: {"_token": "{{ csrf_token() }}"},
                beforeSend:function(){
                    $(".ajaxDiv").empty()

                    $(".ajaxDiv").append('<div class="col-md-4 offset-md-4 text-center searchLoader" ><br><br><h4 style="color: gray">Loading...</h4></div>')
                    $(".loadMoreBtnOuter").css('display','none')

                    $(".btn1").css('display','none')
                    $(".btn2").css('display','block')
                },
                success:function(response){

                    $(".ajaxDiv").empty()
                    $(".ajaxDiv").append(response)
                    currentPage=currentPage+1;

                },
                error: function (jqXHR, textStatus, errorThrown) {


                },
                complete:function(data){
                    $(".loadMoreBtn").text("Load More")
                }
            })
        }
        var timer=null
        function resetSearchInput()
        {
            var searchText=$("#searchText").val()
            if(searchText=='')
            {
                window.location.reload()
            }
            else {
                clearTimeout(timer);
                timer=setTimeout(function (){
                    searchPosts()
                },2000)
            }
        }
        function loadMore()
        {

            if(currentPage>lastPage){
                alert("No More Posts")
                return;
            }

            $.ajax({
                url:"{{url('wall/index?type=web')}}&page="+currentPage,
                method:'get',
                data: {"_token": "{{ csrf_token() }}"},
                beforeSend:function(){
                    $(".loadMoreBtn").text("Loading...")
                },
                success:function(response){

                    $(".ajaxDiv").append(response)
                    currentPage=currentPage+1;

                },
                error: function (jqXHR, textStatus, errorThrown) {


                },
                complete:function(data){
                    $(".loadMoreBtn").text("Load More")
                }
            })
        }
        function shareOnFacebook(text,url){

            document.exitFullscreen();

            // const navUrl = 'https://www.facebook.com/sharer/sharer.php?u=' +url;
            // setTimeout(function (){
            //     window.location.assign(navUrl)
            // },2000)
            // const a = document.createElement("a");
            // a.setAttribute('href', navUrl);
            // a.setAttribute('target', '_blank');
            // a.click();
            //asdasd
            // window.open(navUrl,'_top');


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
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div style="width: 100%" class="myflex">
                <button class="btn-primary  btn-sm loadMoreBtnOuter" onclick="loadMore()">
                    <span class="loadMoreBtn">Load More</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <br>
</div>
</body>

</html>


@endsection
