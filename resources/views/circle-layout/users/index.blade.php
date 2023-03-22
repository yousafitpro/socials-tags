@extends('circle-layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Users</h5>
                    <a class="btn btn-primary" style="float: right" href="{{url('User/Add')}}" >Add New User</a>
                </div>
                <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    <div>
                        <table id="zero-conf" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email / Phone</th>

                                <th>date</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <div class="modal fade" id="ChangePassword{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                .<div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td>{{$item->fname.' '.$item->lname}}</td>
                                    <td>{{$item->email}}</td>

                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
{{--                                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#ChangePassword{{$item->id}}">Change Password</a></li>--}}
{{--                                                <li><a class="dropdown-item" href="#">Unblock</a></li>--}}
                                                <li><a class="dropdown-item" href="{{url('User/edit',app_encrypt($item->id))}}">Edit / View</a></li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email / Phone</th>
                                <th>Platform</th>
                                <th>date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
