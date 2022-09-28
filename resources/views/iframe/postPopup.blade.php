<div class="modal animated fadeInDown "  id="postPopup1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-fullscreen" role="document" style=" width: 100vw; height: 100vh;">
        <div class="modal-content postPopupModal" style="background:black">

            <div class="modal-body" >

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <button onclick="exitFullScreen()"  style="color: white; font-size: 20px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <h1>X</h1>
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="wallPostModalInner">
                        <div class="container-fluid" >
                            <div class="row">
                                <div class="col-md-8  wallPostModalInnerRight">
                                   <div class="myFlex" style="height: 100%; width: 100%">
                                       <img src="https://placekitten.com/640/360" class="wallPostModalImage">
                                   </div>
                                </div>
                                <div class="col-md-4 wallPostModalInnerLeft" >
                                 <div >
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

                                     <div>
                                         <span  class="wallPostModalInnerLeftText">US Senate Candidate, Gary Chambers Jr, Panders to Black Voters By Smoking Weed</span>

                                     </div>

                                 </div>
                                </div>
                            </div>
                        </div>
                        <div style="position: absolute;bottom: 20; right: 50;">

                            <img src="{{asset('icon/fb.png')}}" style="width: 30px">
                            <img src="{{asset('icon/tw.png')}}" style="width: 30px">
                            <img src="{{asset('icon/in.png')}}" style="width: 30px">
                            <img src="{{asset('icon/link.png')}}" style="width: 20px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
