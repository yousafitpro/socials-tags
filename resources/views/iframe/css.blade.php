<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
</style>
