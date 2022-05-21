@extends('layouts.officcial')
@section('sub1content')
    <div class="card">
        <div class="card-header">
            <h3>Officials</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive card-body tbl_container">
                <table class="table  table-bordered table-hover dataTables-example " >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Post</th>

                        <th>State</th>
                        <th>Web Link</th>
                        <th>address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody >


                    @foreach($list as $item)

                        <tr>
                            <td>{{$loop->index}}</td>
                            <td><img style="width: 60px; height: 60px" src="{{$item->image}}"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->post}}</td>
                            <td>{{$item->state}}</td>
                            <td><a href="{{$item->web}}" target="_blank">Open on his Personal Web</a></td>
                            <td>{{$item->address}}</td>
                            <td>

                                <a href="{{route('admin.mail.inbox',$item->id)}}"> <button  class="btn btn-primary">Inbox</button></a><br>


                                @if($item->email!='undefined' && $item->email!='')
                                    <a href="{{route('admin.mail.compose',$item->id)}}"> <button  class="btn btn-primary " style="margin-top:10px">Message</button></a>

                                @elseif($item->web!='undefined' && $item->web!='')
                                    <a href="{{$item->web}}" target="_blank" >     <button  class="btn btn-primary" style="margin-top:10px">Contact</button></a>
                                @endif

                            </td>


                        </tr>

                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
