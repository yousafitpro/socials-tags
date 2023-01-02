<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/wall.css')}}">
<style>
    .myFlex {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
    .modal-body {
        overflow:hidden;
        transition:transform 19s ease-out; // note that we're transitioning transform, not height!
    height:auto;
        transform:scaleY(1); // implicit, but good to specify explicitly
    transform-origin:top; // keep the top of the element in the same place. this is optional.
    }
    .coppyIcon:active {
        width: 10px;
    }
    :root{
        --primary: #A32F38;
    }
    .btn-primary{
        background-color: var(--primary);
        outline: none;
        border: none;
    }
    .btn-primary:hover{
        opacity: 0.8;
        background-color: var(--primary);
    }
    .btn-primary:active{
        opacity: 1;
        background-color: var(--primary);
        border: solid 1px darkred;
    }
    .btn-primary:visited{
        opacity: 1;
        background-color: var(--primary);
        border: solid 1px darkred;
    }
    /*aSAs*/
    .myFlex {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    @keyframes zoom-in-zoom-out {
        0% {
            transform: scale(1, 1);
        }
        100% {
            transform: scale(1.2, 1.2);
        }
    }
</style>
