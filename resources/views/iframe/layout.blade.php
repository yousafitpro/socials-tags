

@include('iframe.css')
@include('iframe.js')

@yield('content')
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
    window.OneSignal = window.OneSignal || [];
    OneSignal.push(function() {
        OneSignal.init({
            appId: "c2c0ca86-dc55-4e00-a582-ee262634d4c3",
        });
    });
</script>
