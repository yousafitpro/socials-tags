@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a  href="{{route('admin.mail.inbox',$official->id)}}">   <button class="btn btn-primary btn-rounded btn-outline">Go Back</button></a>
            </div>
        </div>
        <div class="row">

            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form action="{{route('admin.mail.sendMessage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3>Sent to ({{$official->name}})</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">

                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! $message->message !!}
                                        </div>

                                    </div>


                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <br>
{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3>Replies from ({{$official->name}})</h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-1"></div>--}}
{{--                                <div class="col-md-10">--}}

{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            {!! $message->reply !!}--}}
{{--                                        </div>--}}

{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="col-md-1"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>

        function addPost()
        {
            alert($('#summernote').code())
        }
        $(document).ready(function(){



        });

    </script>
@endsection
