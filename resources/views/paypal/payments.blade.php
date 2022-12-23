@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>All Paypal Payments</h3>
        </div>
        <div class="card-body">
            <div class="row">

            </div>
            <br>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Payment User</th>

                        <th>Amount</th>
                        <th>Transaction ID</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($list as $item)
                        <tr class="center">
                            <td>{{$item->user->fname.' '.$item->user->lname}}({{$item->user->email}})</td>
                            <td>{{$item->first_name." ".$item->last_name}} ({{$item->email_address}})</td>

                            <td>{{$item->amount}}$</td>


                            <td>{{$item->payment_id}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->created_at}}</td>

                            <td width="50px">
                                <div class="dropdown dropdown-menu-bottom">
                                    <i class="fa fa-cogs" data-toggle="dropdown"></i>

                                    <ul class="dropdown-menu">
                                        <li><a href="#" >Payment Details</a></li>

                                    </ul>
                                </div>
                            </td>
                        </tr>
                        {{--            Delete Moel--}}
            @endforeach

                </table>
            </div>
            <script>


            </script>

        </div>
    </div>
@endsection
