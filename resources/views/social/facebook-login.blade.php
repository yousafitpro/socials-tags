<html>
<head>
    <title>Title of the document</title>
</head>

<body>
<button onclick="login()">Login</button>
</body>

</html>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1406523236791020',
            cookie     : true,
            xfbml      : true,
            version    : 'v15.0'
        });

        FB.AppEvents.logPageView();

    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
function login()
{

    FB.login()
}
</script>
