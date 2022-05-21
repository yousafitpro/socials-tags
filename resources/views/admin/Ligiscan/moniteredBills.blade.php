@extends('layouts.ligiscan')
@section('sub1content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                  Monitered Bills
                </div>
                <div class="table-responsive card-body tbl_container">
                    <table class="table  table-bordered table-hover dataTables-example " >
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bill</th>
                            <th>State</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody >


                            @foreach($bills as $item)

                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->bill_number}}</td>
                                        <td>{{$item->state}}</td>
                                        <td>{{$item->title}}</td>

                                        <td> <a href="{{route('ligiscan.billDetail',$item['bill_id'])}}"><button  class="btn btn-primary">View Details</button></a></td>
                                    </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
