@if(count($posts)>0)
@foreach($posts as $p)
    @include('iframe.Post',['type'=>$p->type,'category'=>$p->category,'id'=>$p->id,'username'=>$p->username])

@endforeach
@else

    <div class="col-md-4 offset-md-4 text-center">
        <br>
        <br>
        <h4>No More Posts</h4>
    </div>
@endif
