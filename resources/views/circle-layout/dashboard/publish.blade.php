@extends('circle-layout.layout')
@section('title',"Publish Post")
@section('content')
    <div class="card">

        <div class="card-body">
            <form class="form-horizontal form-element" id="PostForm" enctype="multipart/form-data" method="POST" action="{{url('Facebook/Create-Post')}}">
                @csrf
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12">


                                    <br>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Title:*</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  name="title" value="{{old('title')}}" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Content:*</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="post_content" style="height: 200px">{{old('post_content')}}</textarea>
                                        </div>
                                    </div>
                                    <br>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Link (optional)</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="link" value="{{old('link')}}"/>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Photo ( optional )</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="photo" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <strong>Platforms</strong>
                        <br>
                        <br>
                        <br>
                        <div>
                            <input style="zoom: 1.2;" type="checkbox" name="facebook">
                            <img src="{{asset('social-icons/fb.png')}}"  style="width: 30px; margin-top: -7px">
                            <strong>Facebook</strong>
                        </div>

                        <div style="margin-top: 15px">
                            <input style="zoom: 1.2;" type="checkbox" name="instagram">
                            <img src="{{asset('social-icons/insta.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Instagram</strong>
                        </div>

                        <div style="margin-top: 15px">
                            <input style="zoom: 1.2;" type="checkbox" name="linkedin">
                            <img src="{{asset('social-icons/linkedin.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Linkedin</strong>
                        </div>

                        <div style="margin-top: 15px">
                            <input style="zoom: 1.2;" type="checkbox" name="twitter">
                            <img src="{{asset('social-icons/twitter.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Twitter</strong>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="box-footer text-center">
                            <a  href="#" onclick="CreatePost()" class="btn btn-primary " style="width:100%">
                                <i class="ti-save-alt"></i> Post
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <br>

        </div>
    </div>
<script>
    function CreatePost()
    {
        if(confirm("Are you Sure?"))
        {
            $("#PostForm").submit()
        }
    }
</script>
@stop
@section('js')

@endsection
