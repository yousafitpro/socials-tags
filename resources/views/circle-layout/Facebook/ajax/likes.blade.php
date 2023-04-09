


@if(count($data)>0)
    @foreach($data as $p)
        <div class="row">
            <div class="col-sm-12">
{{--                <small style="float: right">{{human_readable_time($p['created_time'])}}</small>--}}
                <a href="https://web.facebook.com/profile.php?id={{$p['id']}}" target="_blank"><h5>{{$p['name']}}</h5></a>

            </div>
        </div>

        <br>
    @endforeach
@else
    <h5 style="text-align: center; color: lightgrey">Empty</h5>
@endif


