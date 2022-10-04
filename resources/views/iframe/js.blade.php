<!-- jQuery library -->
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"
></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function fullScreen(id)
    {
        document.querySelector(id).requestFullscreen();

    }
    function exitFullScreen(type,data)
    {

        if(type=='close')
        {
            document.exitFullscreen();
        }
        if(type=='link')
        {

            document.exitFullscreen();
            window.open(data,'_blank')
        }
        if(type=='copy')
        {

            var copyText = document.getElementById(data+"myInput");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            document.exitFullscreen();
            alert("Coppied: "+copyText.value)

        }


    }
</script>
