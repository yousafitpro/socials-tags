<!DOCTYPE html>
<html>
<head>
    <title>Streaming</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{--<script href="{{asset('js/app.js')}}"></script>--}}
    <script>

    </script>
</head>
<script src="{{asset('agora/AgoraRTC-N-4.2.1.js')}}"></script>
<script>
    // CDN transcoding configurations.
    const LiveTranscoding = {
        // Width of the video (px). The default value is 640.
        width: 640,
        // Height of the video (px). The default value is 360.
        height: 360,
        // Bitrate of the video (Kbps). The default value is 400.
        videoBitrate: 400,
        // Frame rate of the video (fps). The default value is 15.
        videoFramerate: 15,
        audioSampleRate: AgoraRTC.AUDIO_SAMPLE_RATE_48000,
        audioBitrate: 48,
        audioChannels: 1,
        videoGop: 30,
        // Video codec profile. Choose to set as Baseline (66), Main (77), or High (100). If you set this parameter to other values, Agora adjusts it to the default value of 100.
        videoCodecProfile: AgoraRTC.VIDEO_CODEC_PROFILE_HIGH,
        userCount: 1,
        userConfigExtraInfo: {},
        backgroundColor: 0x000000,
        // Add an online PNG watermark image to the video. You can add more than one watermark image at the same time.
        watermark: {
            url: "http://www.com/watermark.png",
            x: 0,
            y: 0,
            width: 160,
            height: 160,
        },
        // Set the layout for each user.
        transcodingUsers: [{
            x: 0,
            y: 0,
            width: 640,
            height: 360,
            zOrder: 0,
            alpha: 1.0,
            // The uid must be identical to the uid used in AgoraRTCClient.join.
            uid: 1232,
        }],
    };

    // This is an asynchronous method. Please ensure that the asynchronous operation completes before conducting the next operation.
    AgoraRTCClient.setLiveTranscoding(LiveTranscoding).then(() => {
        console.log("set live transcoding success");
    });

    // Add a URL to which the host pushes a stream. Set the transcodingEnabled parameter as true to enable the transcoding service. Once transcoding is enabled, you need to set the live transcoding configurations by calling setLiveTranscoding. We do not recommend transcoding in the case of a single host.
    // This is an asynchronous method. Please ensure that the asynchronous operation completes before conducting the next operation.
    client.startLiveStreaming("your RTMP URL", true).then(() => {
        console.log("start live streaming success");
    })

    // Remove a URL and stop live streaming. This is an asynchronous method. Please ensure that the asynchronous operation completes before conducting the next operation.
    client.stopLiveStreaming("your RTMP URL").then(() => {
        console.log("stop live streaming success");
    })
</script>
<style>
    .topBox{



    }
    .myIframe{
        width: 100%;
        height: 85vh;
    }
</style>
<body>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>


</script>



