
    @if(count($bill['sponsors'])>0)
        <div class="card">
            <div class="card-body">
                <h3>Sponsors</h3><br>
                <div class="row">

                    @foreach($bill['sponsors'] as $s)

                        <div class="col-md-4" >





                            <div style="background-color: gray;  color: white; padding: 5px; color: white" >
                                <a style="color: white; "  data-toggle="collapse" data-target="#collapse{{$tabID}}{{$s['people_id']}}" aria-expanded="false" aria-controls="collapse{{$tabID}}{{$s['people_id']}}" href="{{route('ligiscan.getPerson',$s['people_id'])}}"> <label style="cursor: pointer; ">{{$s['name']}} [{{$s['party']}}]</label></a>
                            </div>
                            <div class="collapse" id="collapse{{$tabID}}{{$s['people_id']}}">
                                <div class="card card-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label><br><small>{{$s['name']}}</small>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nick </label><br><small>{{$s['nickname']}}</small>
                                            </div>
                                            <div class="col-md-4">
                                                <label>District</label><br><small>{{$s['district']}}</small>
                                            </div>
                                        </div><br>

                                    </div>
                                </div>
                            </div>
                            <br>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
    @endif

