
        <div class="col-md-3 mt-3" onclick="window.open('https://www.quackit.com/javascript/examples/sample_popup.cfm','popUpWindow','height=500,width=400,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');" data-toggle="modal" data-target="#b{{$id}}" >
            <div class="card shadow wallPostCard" >
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
                        </div><br>


                    </div>
                  @elseif($type=="text")
                    <div class="p-3 text-center" style="color: gray">
                  <h3>{{Str::limit($p->content,100)}}</h3>
                    </div>
                  @endif
                  <div class="p-3">
                  @include('iframe.postBottom')
                  </div>

            </div>
        </div>
        @include("iframe.postPopup")

