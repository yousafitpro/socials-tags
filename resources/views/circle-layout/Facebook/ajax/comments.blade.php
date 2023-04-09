


@foreach($data as $p)
    <h4>{{$p['from']['name']}}</h4>
    <br>
    <small>{{$p['message']}}</small>
    <br>
@endforeach
