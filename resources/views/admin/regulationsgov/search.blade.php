@extends('layouts.regulationsgov')
@section('sub1content')
    <style>
        .brandTitle{
            font-weight: bold;
            font-size: 20px;
            color: var(--official-color);
        }
        .leftSide{

        }
        .rightSide{

        }
        .leftTopBar{

            background-color:#2a4b79 ;
            padding: 15px;
            color: white;

        }
        .inputBar{
            border:solid 2px #2a4b79;
            text-align: center;
            border-radius: 5px;
        }
        .leftRow{
            cursor:pointer;
        }
        .inputBottom{
            width: 100%;
            height: 100px;

            position: relative;
            z-index: 1;
        }
    </style>
    <div class="container-fluid"  >
        <form method="post" action="{{route('regulationsgov.search')}}">
            @csrf
            <div class="row" style='height:30px; padding: 0px; margin: 0px'>

                <div class="col-md-10 " style=" padding: 0px; margin: 0px">
                    <input value="{{$keywords}}" class="form-control inputBar" name="keywords" placeholder="Enter keywords here..."/>
                    {{--                <div class="inputBottom card">--}}

                    {{--                </div>--}}
                </div>
                <div class="col-md-2" style=" padding-left: 2px; margin: 0px" >
                    <button type="submit" class="btn btn-primary" style="width: 100%; height:35px; background: #2a4b79 ">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Searched Results
                    </div>
                    <div class="table-responsive card-body tbl_container">
                        <table class="table  table-bordered table-hover dataTables-example " >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Document ID</th>
                                <th>Title</th>
                                <th>Type</th>


                                <th>Agency</th>
                                <th>Post Date</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody >

                            @if($check=='1')
                                @foreach($list as $item)
                                    @if($loop->index>0)
                                        <tr>
                                            <td>{{$loop->index}}</td>
                                            <td>{{$item['attributes']['docketId']}}</td>
                                            <td>{{$item['attributes']['title']}}</td>
                                            <td>{{$item['attributes']['documentType']}}</td>

                                            <td>{{$item['attributes']['agencyId']}}</td>
                                            <td>{{$item['attributes']['postedDate']}}<td>
                                                <td>
                                               <a href="{{route('regulationsgov.detail',[$item['id'],$item['attributes']['objectId']])}}"> <button id="b{{$item['id']}}" onclick="addToMoniter('{{$item['id']}}')" class="btn btn-primary">View Details</button></a>
                                            </td>


                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
        <br/>


    </div>

@endsection
