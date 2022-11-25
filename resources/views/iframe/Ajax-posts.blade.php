@foreach($posts as $p)
    @include('iframe.Post',['type'=>$p->type,'category'=>$p->category,'id'=>$p->id,'username'=>$p->username])

@endforeach
