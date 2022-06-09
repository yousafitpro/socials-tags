<!DOCTYPE html>
<html>
<head>
    <title>Streaming</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    .topBox{



    }
    .myIframe{
        width: 100%;
        height: 85vh;
    }
</style>
<body>
<div class="topBox" ></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <a href="{{route('daily.delete',$room->name)}}" class="form-control btn btn-danger">End Room</a>
        </div>
        <div class="col-4">

                <a   class="form-control btn btn-info">Streaming</a>

        </div>
        <div class="col-4">

            <a onclick="coppyLink('{{$room->url}}')" id="btnCoppy" class="form-control btn btn-success">Coppy Link</a>

        </div>

    </div>
</div>
</body>

</html>
    <script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function getLocalStream() {
        navigator.mediaDevices.getUserMedia({video: true, audio: true}).then( stream => {
            console.log("stream",stream)
            window.localStream = stream; // A
            window.localAudio.srcObject = stream; // B
            window.localAudio.autoplay = true; // C
        }).catch( err => {
            console.log("u got an error:" + err)
        });
    }
    getLocalStream();
    function coppyLink(url)
    {

        navigator.clipboard.writeText(url);
        $("#btnCoppy").text("Coppied")
        setTimeout(function (){
            $("#btnCoppy").text("Coppy Link")
        },2000)
    }
    const MY_IFRAME = document.createElement('iframe');
    MY_IFRAME.setAttribute('class','myIframe')
    MY_IFRAME.setAttribute(
        'allow',
        'microphone; camera; autoplay; display-capture'
    );

    const iframeProperties = { url: '{{$room->url}}' };

    document.body.appendChild(MY_IFRAME);

    let callFrame = DailyIframe.wrap(MY_IFRAME, iframeProperties);

    callFrame.join();
 {{--var callFrame = window.DailyIframe.createFrame({--}}
 {{--       audioSource: true,--}}
 {{--       videoSource: false,--}}
 {{--      showLeaveButton:true,--}}
 {{--       iframeStyle: {--}}
 {{--           position: 'fixed',--}}
 {{--           border: '1px solid white',--}}
 {{--           width: '100%',--}}
 {{--           height: '88%',--}}
 {{--           right: '0%',--}}
 {{--           left: '0%',--}}
 {{--           bottom: '0%',--}}

 {{--           top: '0%',--}}
 {{--       },--}}
 {{--       showFullscreenButton: true,--}}
 {{--       // showLeaveButton: true,--}}
 {{--   });--}}
 {{--callFrame.join({ url:'{{$room->url}}' });--}}

</script>



