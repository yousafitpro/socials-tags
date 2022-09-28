
        <div class="col-md-3 mt-3" data-toggle="modal" data-target="#postPopup1">
            <div class="card shadow " style="border-radius: 5px">
              @if($type=="image")
                    <div class="row">
                        <div class="col-md-12">
                            <img src="https://placekitten.com/640/360" style="width: 100%; border-radius: 5px">
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="row">
                            <div class="col-md-12">

                                <small >MoT #211: As Stacey Abrams Sinks Bootlicks Attack Black Media
                                    Stacey Abrams is falling behind and the shills at MSNBC are blaming black male "patriarchy, misogyny" and attacking new black media by name.</small>
                            </div>
                        </div><br>


                    </div>
                  @elseif($type=="text")
                    <div class="p-3 text-center" style="color: gray">
                  <h3>2021 Wisconsin politics: Pandemic feuds, election reviews and resignations</h3>
                    </div>
                  @endif
                  <div class="p-3">
                  @include('iframe.postBottom')
                  </div>

            </div>
        </div>
        @include("iframe.postPopup")

