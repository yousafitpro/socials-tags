<div class="modal animated fadeInDown "  id='b{{$p->id}}' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-fullscreen" role="document" style=" width: 100vw; height: 100vh;">
        <div class="modal-content postPopupModal" style="background:black; height: 100vh">

            <div class="modal-body wallPostModalPopupBody"  >

                <div class="container-fluid">
                    <div class="row" style="margin-top: 30px">
                        <div class="col-md-8">

                                <img onclick="shareOnFacebook('{{Str::limit($p->content,100)}}','{{$p->link}}')" data-dismiss="modal" src="{{asset('icon/fb.png')}}" style="width: 30px; border-radius: 5px; border: solid 1px grey">
                                <img onclick="shareOnTwitter('{{Str::limit($p->content,100)}}','{{$p->link}}')" data-dismiss="modal" src="{{asset('icon/tw.png')}}" style="width: 30px; border-radius: 5px; border: solid 1px grey">
                                <img onclick="shareOnLinkedIn('{{Str::limit($p->content,100)}}','{{$p->link}}')" data-dismiss="modal" src="{{asset('icon/in.png')}}" style="width: 30px; border-radius: 5px;border:solid 1px grey">
                                <img src="{{asset('icon/link.png')}}"  data-dismiss="modal" id="copyIcon" onclick="exitFullScreen('copy','{{$p->id}}')" style="width: 30px; border-radius: 5px; border: solid 1px grey" class="coppyIcon">

                                <img onclick="exitFullScreen('link','{{$p->link}}')"  data-dismiss="modal" src="{{asset('icon/book2.png')}}"  style="width: 30px; border-radius: 5px; border: solid 1px grey">



                        </div>
                        <div class="col-md-4">


                                <span onclick="exitFullScreen('close','')" class="wallPostModalCloseBox" data-dismiss="modal" aria-label="Close" type="button" class="close " style="width: 30px; border-radius: 5px;  float: right; margin-top: -10px">X</span>

                        </div>
                    </div>

                    <div class="wallPostModalInner" style="{{$type=='text'?'height:auto;background-color:white':''}}">
                        @if($type=='text')
                           <div  style="width: 100%;">
                               <div class="container-fluid">
                                   <div class="row">
                                    <div class="col-md-12"  >

                                        <div style="height: 100%; width: 100%; font-size: 30px; min-height: 80vh; overflow: auto" class="myFlex" >
                                            <div style="max-height: 80vh; overflow: auto">
                                                @if($category=='native')
                                                    {{$p->content}}
                                                @else
                                                    {{Str::limit($p->content,150)}}
                                                    @endif

                                            </div>
                                        </div>
                                    </div>
                                   </div>
                               </div>
                           </div>
                        @else
                            <div class="container-fluid" >
                                <div class="row">
                                    <div class="col-md-8  wallPostModalInnerRight">

                                        <div class="myFlex" style="height: 100%; width: 100%; ">

                                            <img src="{{asset($p->image)}}" class="wallPostModalPopupImage">



                                        </div>
                                    </div>
                                    <div class="col-md-4 wallPostModalInnerLeft myScroller" >
                                        <div >
                                            <div>
                                                <br>
{{--                                                @if($category=="youtube")--}}
{{--                                                    <img src="{{asset('wall/youtube.png')}}" style="width: 30px">--}}
{{--                                                @elseif($category=="native")--}}
{{--                                                    <img src="{{asset('wall/comment.png')}}" style="width: 30px">--}}
{{--                                                @endif--}}
{{--                                                <label style="font-weight: bold;">{{$username}}</label><br>--}}
{{--                                                <small>{{ \Carbon\Carbon::parse($p->created_at)->diffForhumans() }}</small>--}}
{{--                                            --}}
                                            </div>

                                            <div>
                                                <br>
                                               <div style="overflow: auto; max-height: 60vh;"  >
                                                    <span  class="wallPostModalInnerLeftText">
                                                  @if($category=='native')
                                                            {{$p->content}}

                                                      <br> <br>
                                                        @else
                                                            {{Str::limit($p->content,150)}}

                                                        @endif



                                                </span>
                                                   <br>
                                               </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function myFunction(id) {

        // Get the text field
        var copyText = document.getElementById(id+"myInput");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);



        // Alert the copied text
        // document.exitFullscreen();
        // alert("Copied the text: " + copyText.value);
        {{--document.querySelector('#b{{$p->id}}').requestFullscreen();--}}
    }
 function toLink(link)
 {
     setTimeout(function (){
         document.exitFullscreen();
         window.open(link,'_blank')
     },1000)

 }
</script>
