@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="{{route('official.officials')}}" >   <button class="btn btn-rounded btn-outline btn-primary">Go Back</button></a>
            </div>
        </div>
        <div class="row">

            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form action="{{route('admin.mail.sendMessage')}}" id="myForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3>Compose New Mail</h3>
                        </div>
                        <div class="card-body">
                            @include('errorBars.errorsArray',['title' => 'Error','errors'=>$errors])

                            <br>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
<input style="display: none" name="official_id" value="{{$official_id}}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="text-bold">
                                               Subject
                                            </label>
                                            <br>
                                        </div>
                                        <div class="col-md-10">
                                            <input name="subject" required value="{{old('title')}}" class="form-control">
                                        </div>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="text-right" >
                                                Content
                                            </label>
                                            <br>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="summernote" required name="contentdata" style="height: 40vh">{{old('contentdata')}}</textarea>


                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="text-bold">
                                              Attachment
                                            </label>
                                            <br>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="file" name="attachment"  class="form-control">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <button onclick="submit()" id="btnSubmit" class="btn btn-primary float-right" type="submit" ><i class="fa fa-send" style="margin-right: 10px"></i> Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>

        function submit()
        {
            document.getElementById("btnSubmit").disabled = true;
           $("#myForm").submit();

        }
        $(document).ready(function(){



        });

    </script>
@endsection
