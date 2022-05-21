{!! $data['contentData'] !!}

@foreach($data['attachments'] as $at)
    @if($at!=null)
        <a href="{{$at}}">Download Attachment {{$loop->index+1}}</a>
    @endif
@endforeach
