@extends('layouts.ligiscan')
@section('sub1content')
    <style>
        .myflex {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .is-active{
            background-color: red;
        }
        .btnsubmit{
            background-color:#2a4b79 ;
            color: white;
        }
        .tbl_container{
            max-height: 450px;
            overflow: auto;
        }
        .leftTopBar{

            background-color:#2a4b79 ;
            padding: 15px;
            color: white;

        }
    </style>
    <div class="container-fluid"  >


        <div class="row" >
            <div class="col-md-4" >

                <div class="leftTopBar">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12"><a href="#" style="color:white"}>Search Bills</a></div>

                        </div>
                    </div>
                </div>
                <div style="background-color:white;height:60vh;overflow:auto">
                    <form  action="{{route('ligiscan.search')}}" method="post">
                        @csrf
                    <div class="container-fluid">
{{--                        <br>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                               @include('errorBars.errorsArray',['title'=>'Error'])--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <br/>
                        <div class="row">
                            <div class="col-md-4 myFlex">
                                <label style="padding:10px">State</label>
                            </div>
                            <div class="col-md-8">
                                <select  required class="form-control" name="state" id="state" onchange="stateChange()" >
                                    <option value="">---select---</option>
                                    @foreach($states as $s)
                                        <option value="{{$s->state_abbr}}">{{$s->state_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 myFlex">
                                <label style="padding:10px">Bill Number</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" value="{{$billNum}}" name="billNum" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 myFlex">
                                <label style="padding:10px">Full Text Search</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control"  name="searchText" style='height:100px' >{{$searchText}}</textarea>
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-4 myFlex">
                                <label style="padding:10px">Sesstion</label>
                            </div>
                            <div class="col-md-8">
                                <select class="form-control" name="ssession" id="session" >


                                </select>
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-12 myFlex">
                                <button  type="submit" class="form-control btnsubmit">Search</button>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Searched Results
                    </div>
                    <div class="table-responsive card-body tbl_container">
                        <table class="table  table-bordered table-hover dataTables-example " >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Match</th>
                                <th>State</th>
                                <th>Bill</th>

                                <th>Title</th>
                                <th>last Action</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody >

               @if($check=='1')
                   @foreach($list as $item)
                       @if($loop->index>0)
                           <tr>
                               <td>{{$loop->index}}</td>
                               <td>{{$item['relevance']}}</td>
                               <td>{{$item['state']}}</td>
                               <td>{{$item['bill_number']}}</td>
                               <td>{{Str::limit($item['title'],42)}}</td>
                               <td>{{$item['last_action_date']}}
                                   <br>
                                   <small>{{$item['last_action']}}</small>
                               </td>
                               <td>
                                   <button id="b{{$item['bill_number']}}" onclick="addToMoniter('{{$item['bill_number']}}','{{$item['state']}}','{{$item['title']}}','{{$item['bill_id']}}')" class="btn btn-primary">Add To Moniter</button>
                               <br>
                                   <br>

                                   <a href="{{route('ligiscan.billDetail',$item['bill_id'])}}"><button  class="btn btn-primary">View Details</button></a>
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

    </div>
    <script type="text/javascript">
        function stateChange(){
            if($('#state').val()=='')
            {
                return;
            }
            var sid=$('#state').val()
            $.ajax({
                type:'get',
                url:"{{route('ligiscan.get_sessions')}}",
                data:{id:sid},
                success:function(data){

                    var model = $('#session');
                    model.empty();
                    model.append(' <option value="">--All--</option>')
                    $.each(data.sessions, function (index, element) {
                        model.append("<option value='" + element.year_start + "'> Year " + element.year_end + "</option>");
                    });


                }
            });

        }
        function addToMoniter(bn,s,t,id)
        {

            $.ajax({
                type:'post',
                url:"{{route('ligiscan.addToMoniteredBill')}}",
                data:{id:bn,title:t,state:s,id1:id,"_token":"{{ csrf_token() }}"},
                success:function(data){
; $(document).ready(function() {
                        setTimeout(function () {
                            toastr.options = {
                                closeButton: true,
                                progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 2000
                            };
                            toastr.success(data.message, 'Success');

                        }, 1000);
                    });
                    $("#b"+bn).text("Added")

                }
            });
        }


    </script>
@endsection
