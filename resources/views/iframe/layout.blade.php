

@include('iframe.css')
@include('iframe.js')

@yield('content')
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "53151d56-24d8-4f77-8e29-6da4ffe42aa2",
        });
    });
</script>
