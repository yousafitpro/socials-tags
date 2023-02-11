<div style="padding: 10px">
    <label style=" color: gray">Comments ({{post_comments($post->id)->count()}})</label>
    @foreach(post_comments($post->id) as $p)
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="p-2">
                <div class="row">

                    <div class="col-12">
                        <div style="float: left">

                            <img src="{{asset('profileimages/'.$p->user->profile_image)}}" style="width: 40px; height: 40px; border-radius: 50%;">
                            <label style="font-size: 13px; margin-left: 10px; color: gray; font-weight: bold">{{$p->user->fname.' '.$p->user->lname}}</label><div></div>

                        </div>
                        <small style="float: right">{{ \Carbon\Carbon::parse($p->created_at)->diffForhumans() }}</small>
                    </div>

                </div>                                </div>
        </div>
    </div>
    <small style=" color: grey; margin-left: 10px">
        {{$p->comment}}
    </small>
    @endforeach

    <br>
    <br>
    <br>
</div>
