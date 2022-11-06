
        <div class="col-md-3 mt-3"  >
            <div class="card shadow wallPostCard" >
                <input value="{{$p->link}}" hidden id="{{$p->id}}myInput">
              @if($type=="image")
                 <div style="position: relative">
                     <div class="row">
                         <div class="col-md-12">
                             <img src="{{asset($p->image)}}" style="width: 100%" class="wallPostModalImage">
                         </div>
                     </div>
                     <div class="p-3">
                         <div class="row">
                             <div class="col-md-12">

                                 <small >
                                     {{Str::limit($p->content,100)}}
                                 </small>
                             </div>
                         </div>
                         <br>


                     </div>
                     <div style="position: absolute; top:10; right:10; opacity: 0.7; height: 25px; width: 100px; background-color:whitesmoke; padding: 5px; border-radius: 10px">

                     </div>
                     <div style="position: absolute; top:12; right:17;">
                         <small style="color: grey;">{{$p->created_at_readable}}</small>
                     </div>
                 </div>
                  @elseif($type=="text")
                    <div class="p-3 text-center" style="color: gray">
                  <h3>{{Str::limit($p->content,100)}}</h3>
                    </div>

                  @endif


                      <div class="row" style="margin-bottom: 12px">


                          <div class="col-4 myflex">
                              <img class="clickOpacity" onclick="fullScreen('#b{{$p->id}}')" data-toggle="modal" data-target="#b{{$p->id}}" src="{{asset('wall/view.png')}}" style="width: 65px">
                          </div>
                          <div class="col-4 myflex">

                              <img class="clickOpacity" onclick="bookmarkTab()" src="{{asset('wall/save.png')}}" style="width: 65px">
                          </div>
{{--                          xzZX--}}
                          <div class="col-4 myflex">
                              @if($type=="image")
                              <img class="clickOpacity" onclick="shareWithImage('This is one','{!! Str::limit($p->content,200) !!}','{{$p->link}}','{{asset($p->image)}}')" src="{{asset('wall/share.png')}}" style="width: 65px">
                              @else
                              <img class="clickOpacity" onclick="shareNow('This is one','{!! Str::limit($p->content,200) !!}','{{$p->link}}')" src="{{asset('wall/share.png')}}" style="width: 65px">
                               @endif
                          </div>
                      </div>



            </div>
        </div>

        @include("iframe.postPopup")


