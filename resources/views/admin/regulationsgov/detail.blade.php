@extends('layouts.dashboard')
@section('content')
    <style>
        .title{
            font-size: 30px
        }
        .subtext{
            font-size: 20px
        }
    </style>
  <a href="{{route('regulationsgov.search')}}">  <button class="btn btn-dark">Go back</button></a>
  <br>
  <br>
    <div class="card">
        <div class="card-body">
            <label class="title">Title</label><br>
            <small class="subtext">{{$data['attributes']['title']}}</small>
        </div>
    </div>
    @if(isset($data['attributes']['highlightedContent']))
        <br>
        <div class="card">
            <div class="card-body">
                <label class="title">More</label><br>
                <p class="subtext">{{$data['attributes']['highlightedContent']}}</p>
            </div>
        </div>
        @endif

    <br>
    <div class="card">
        <div class="card-body">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-md-3">
                       <label class="title">Type</label><br>
                       <small class="subtext">{{$data['attributes']['documentType']}}</small>
                   </div>
                   <div class="col-md-3">
                       <label class="title">Agency-{{$data['attributes']['openForComment']}}</label><br>
                       <small class="subtext">{{$data['attributes']['agencyId']}}</small>
                   </div>
               </div>
           </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <label class="title">Subject</label><br>
            <small class="subtext">{{$data['attributes']['subject']}}</small>
        </div>
    </div>
    @if($data['attributes']['fileFormats']!=null && count($data['attributes']['fileFormats'])>0)
    <br>
    <div class="card">
        <div class="card-body">
            <label class="title">Attachments</label><br>
           @foreach($data['attributes']['fileFormats'] as $a)

                   <a style="background: gray; padding: 5px; color: white" href="{{$a['fileUrl']}}">Attachment-{{$loop->index+1}}</a>

            @endforeach
        </div>
    </div>
    @endif

    @if($comments!=null && count($comments)>0)
        <br>
        <div class="card">
            <div class="card-body">
                <label class="title">Comments</label><br>
                @foreach($comments as $a)
                    <div style="background-color: gray;  color: white; padding: 5px; color: white; cursor: pointer" onclick="getCommentData('{{$a['id']}}')"  data-toggle="collapse" data-target="#collapse{{$a['id']}}" aria-expanded="false" aria-controls="collapse{{$a['attributes']['title']}}">
                        <a style="color: white; "  href="#">
                            <label style="cursor: pointer; ">{{$a['attributes']['title']}} </label></a>
                    </div>
                    <div class="collapse" id="collapse{{$a['id']}}">
                        <div class="card card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                     <div id="b{{$a['id']}}">
                                        <h3 style="text-align:left">Loading....</h3>
                                     </div>
                                    </div>

                                </div><br>

                            </div>
                        </div>
                    </div>
                    <br>
{{--                    <div>--}}
{{--                        <label style="font-size: 15px; font-weight: bold;">{{$a['attributes']['title']}}:</label>--}}
{{--                        <small style="font-size: 12px"> {{$a['attributes']['title']}} </small>--}}
{{--                    </div>--}}

                @endforeach
            </div>
        </div>
    @endif
    @if($data['attributes']['openForComment']==true)
    <form method="post" action="{{route('regulationsgov.postComment')}}">
        @csrf
        <br>
        <div class="card">
            <div class="card-body">
                <label class="title">Create a Comment</label><br>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="comment" style="height: 100px; " class="form-control"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" style="width: 100%">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    @endif
    <script type="text/javascript">

            function getCommentData(id) {

                    $.ajax({
                    type: 'get',
                    url: "{{route('regulationsgov.commentDetail')}}",
                    data: {id: id, "_token": "{{ csrf_token() }}",obid:'{{$obid}}'},
                    success: function (data) {
                        $("#b" + id).html(data)
                    }
                });


            }

    </script>
@endsection
