@if(count($bill['votes'])>0)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Roll Calls</h3>
                    @foreach($bill['votes'] as $v)
                        <small class="subtext">{{$v['date']}}-House-{{$v['desc']}}(Y:{{$v['yea']}} N: {{$v['nay']}} NV: {{$v['nv']}} abs: {{$v['absent']}})</small><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br>
@endif
