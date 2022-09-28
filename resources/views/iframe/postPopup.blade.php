<div class="modal animated fadeIn "  id="postPopup1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-fullscreen" role="document" style=" width: 100vw; height: 100vh;">
        <div class="modal-content" style="background: transparent">

            <div class="modal-body" >

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <button style="color: white; font-size: 20px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <h1>X</h1>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div style="background-color: white; border-radius: 10px; min-height: 80vh;">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8 myFlex" style="background-color: lightgrey; min-height:80vh">
                                    <img src="https://placekitten.com/640/360" style="width: 80%">
                                </div>
                                <div class="col-md-4" style="background: white;">
                                    <div>
                                        <br>
                                        @if($category=="youtube")
                                            <img src="{{asset('wall/youtube.png')}}" style="width: 30px">
                                        @elseif($category=="native")
                                            <img src="{{asset('wall/comment.png')}}" style="width: 30px">
                                        @endif
                                        <label style="font-weight: bold;">Jaron Mays</label><br>
                                        <small>6 days ago</small>
                                    </div>
                                    <small></small>
                                    <span style="font-size: 35px; color: lightgrey">US Senate Candidate, Gary Chambers Jr, Panders to Black Voters By Smoking Weed</span>
                               <div style="bottom: 0px">
                                   <img src="{{asset('wall/youtube.png')}}" style="width: 30px">
                               </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
