@extends('layouts.ligiscan')
@section('sub1content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Regions
                       <a href="{{route('ligiscan.addState')}}" > <button class="btn btn-primary float-right">Add New</button></a>
                    </div>
                    <div class="table-responsive card-body tbl_container">
                        <table class="table  table-bordered table-hover dataTables-example " >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Abbr</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody >


                            @foreach($regions as $item)

                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$item->state_abbr}}</td>
                                    <td>{{$item->state_name}}</td>


                                    <td><a href="{{route('ligiscan.deleteState',$item->id)}}"><button  class="btn btn-danager">Delete</button></a></td>
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
