
        <div class="col-md-3 mt-3" onclick="fullScreen('#b{{$id}}')" data-toggle="modal" data-target="#b{{$id}}" >
            <div class="card shadow " style="border-radius: 5px">
              @if($type=="image")
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{asset($p->image)}}" style="width: 100%; border-radius: 5px">
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-12">

                                <small >
                              {{$p->content}}
                                </small>
                            </div>
                        </div><br>


                    </div>
                  @elseif($type=="text")
                    <div class="p-3 text-center" style="color: gray">
                  <h3>{{$p->content}}</h3>
                    </div>
                  @endif
                  <div class="p-3">
                  @include('iframe.postBottom')
                  </div>

            </div>
        </div>
        @include("iframe.postPopup")

