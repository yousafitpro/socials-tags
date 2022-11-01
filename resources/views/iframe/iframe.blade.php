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
                function shareOnFacebook(text,url){
                    document.exitFullscreen();
                    const navUrl = 'https://www.facebook.com/sharer/sharer.php?u=' +url;
                    window.open(navUrl , '_blank');
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
