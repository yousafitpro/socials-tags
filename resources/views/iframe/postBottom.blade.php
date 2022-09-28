<div class="row">
    @if($type=="image")
        <div class="col-2">
            <img src="https://www.placecage.com/640/360" style="width: 40px; height: 40px; border-radius: 50%">
        </div>
        @endif
    <div class="col-{{$type=='text'?'9':'7'}}">
        <label style="font-size: 13px; color: gray; font-weight: bold">Prof BlackTruth</label><div></div>
        <small>6 days ago</small>
    </div>
    <div class="col-3">
        @if($category=="youtube")
        <img src="{{asset('wall/youtube.png')}}">
        @elseif($category=="native")
            <img src="{{asset('wall/comment.png')}}">
            @endif
    </div>
</div>
