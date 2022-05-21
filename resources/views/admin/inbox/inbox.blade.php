@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-4">
                 <a href="{{route('official.officials')}}" >   <button class="btn btn-primary btn-rounded btn-outline">Go Back</button></a>
             </div>
             <div class="col-md-4">
                 <h3 class="text-center">Messages</h3>
             </div>
             <div class="col-md-4">
                 <a href="{{route('admin.mail.compose',$id)}}"><button class="btn btn-primary float-right">Compose</button></a>
             </div>
         </div>
     </div>

        </div>
        <div class="card-body">
            <div class="table-responsive card-body tbl_container">
                <table class="table  table-bordered table-hover dataTables-example " >
                    <thead>
                    <tr>
                        <th>#</th>

                        <th>Official</th>
                        <th>Message</th>
{{--                        <th>Reply</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody >


                    @foreach($list as $item)

                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$item->official->name}}</td>
                            <td>{!! Str::limit($item->message,50) !!}</td>
{{--                            <td>{!! Str::limit($item->reply,50)!!}</td>--}}
                            <td>

                                    <a href="{{route('admin.mail.view',$item->id)}}">     <button  class="btn btn-primary">View</button></a>


                            </td>


                        </tr>

                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
