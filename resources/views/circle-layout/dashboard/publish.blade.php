@extends('circle-layout.layout')
@section('title',"Publish Post")
@section('content')
    <div class="card">

        <div class="card-body">
            <form class="form-horizontal form-element" enctype="multipart/form-data" method="POST" action="{{url('Facebook/Create-Post')}}">
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
                                            <input type="text" class="form-control" name="title" value="{{old('old_password')}}" required/>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Content:*</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="height: 300px"></textarea>
                                        </div>
                                    </div>
                                    <br>



                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <strong>Platforms</strong>
                        <br>
                        <br>
                        <br>
                        <div>
                            <input style="zoom: 1.2;" type="checkbox">
                            <img src="{{asset('social-icons/fb.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Facebook</strong>
                        </div>

                        <div style="margin-top: 15px">
                            <input style="zoom: 1.2;" type="checkbox">
                            <img src="{{asset('social-icons/insta.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Instagram</strong>
                        </div>

                        <div style="margin-top: 15px">
                            <input style="zoom: 1.2;" type="checkbox">
                            <img src="{{asset('social-icons/linkedin.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Linkedin</strong>
                        </div>

                        <div style="margin-top: 15px">
                            <input style="zoom: 1.2;" type="checkbox">
                            <img src="{{asset('social-icons/twitter.png')}}" style="width: 30px; margin-top: -7px">
                            <strong>Twitter</strong>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-primary " style="width:100%">
                                <i class="ti-save-alt"></i> Post
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <br>

        </div>
    </div>

@stop
@section('js')

@endsection
