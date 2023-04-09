


@foreach($data as $p)
    <h4>{{$p['from']['name']}}</h4>
    <br>
    <small>{{$p['from']['message']}}</small>
    <br>
@endforeach
