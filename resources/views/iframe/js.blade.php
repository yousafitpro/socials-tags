<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function fullScreen(id)
    {
        // document.querySelector(id).requestFullscreen();
        setTimeout(function (){
            window.open('https://votersnews.com/wall/iframe','_self','fullscreen=yes,location=yes,toolbar=yes')

        },1000)
    }
    function exitFullScreen()
    {
        document.exitFullscreen();
    }
</script>
