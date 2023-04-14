@extends('circle-layout.layout')
@section('title',"Publish Post")
@section('content')
    <div class="card">

        <div class="card-body">
            <a   href="{{url('My-Dashboard/posts')}}"><i data-feather="arrow-left" style="zoom: 1.4"></i> Go Back</a>
{{--            <a   href="#" onclick="DeletePost('{{url('Facebook/Post-Delete',app_encrypt($post->id))}}')" style="float: right; color: darkred"><i data-feather="trash-2" style="zoom: 1.4; color: darkred"></i> Delete</a>--}}
            <br>
            <br>
            <img src="{{asset('social-icons/google.png')}}"  style="width: 30px; margin-top: -7px"> <span style="font-size: 25px; margin-left: 10px">Reviews</span>
            <br>
            <br>
            <br>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h5 style="color: lightgrey">Comments ( {{count($totalReviewCount)}} )</h5>
                        <hr>
                        <br>


                        @if(count($reviews)>0)
                            @foreach($reviews as $p)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <small style="float: right">{{human_readable_time($p['createTime'])}}</small>
                                        <a href="#" target="_blank"><h5>{{$p['reviewer']['displayName']}}</h5></a>


                                        <h6>{{$p['comment']}}</h6>
                                    </div>
                                </div>

                                <br>
                            @endforeach
                        @else
                            <h5 style="text-align: center; color: lightgrey">No Reviews</h5>
                        @endif
                    </div>
{{--                    <div class="col-md-3">--}}
{{--                    </div>--}}

                </div>
                <br>

            </div>
        </div>
    </div>
    <script>
        function DeletePost(url)
        {
            if(confirm("Are you sure?"))
            {
                window.location.href=url;
            }
        }
    </script>
@stop
@section('js')

@endsection
