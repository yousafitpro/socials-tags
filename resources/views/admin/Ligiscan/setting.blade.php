@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('ligiscan.update_sessions')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Sessions</h3>
                        </div>
                        <div class="card-body">
                            @include('errorBars.errorsArray',['title' => 'Error','errors'=>$errors])


                            <div class="row">
                                <div class="col-md-12 ">
                                    <button class="btn btn-primary " type="submit" style="width: 100%">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
