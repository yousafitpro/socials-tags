
        <div class="col-md-3 mt-3" onclick="fullScreen('#b{{$p->id}}')" data-toggle="modal" data-target="#b{{$p->id}}" >
            <div class="card shadow wallPostCard" >
                <input value="{{$p->link}}" hidden id="{{$p->id}}myInput">
              @if($type=="image")
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
                  @elseif($type=="text")
                    <div class="p-3 text-center" style="color: gray">
                  <h3>{{Str::limit($p->content,100)}}</h3>
                    </div>

                  @endif

{{--                  <div class="pl-3">--}}
{{--                  @include('iframe.postBottom')--}}
{{--                  </div>--}}

            </div>
        </div>
        @include("iframe.postPopup")

