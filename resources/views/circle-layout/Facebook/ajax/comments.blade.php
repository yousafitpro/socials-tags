


@foreach($data as $p)
    <h5>{{$p['from']['name']}}</h5>

    <small>{{$p['message']}}</small>
    <br>
@endforeach
