<!DOCTYPE html>
<html>
<head>
    <title>Streaming</title>
</head>
<body>


</body>
</html>
    <script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>
<script>
 var callFrame = window.DailyIframe.createFrame({
        audioSource: true,
        videoSource: false,
        iframeStyle: {
            position: 'fixed',
            border: '1px solid white',
            width: '100%',
            height: '88%',
            right: '0%',
            left: '0%',
            bottom: '0%',

            top: '0%',
        },
        showFullscreenButton: true,
        // showLeaveButton: true,
    });
 callFrame.join({ url:'{{$url}}' });
</script>



