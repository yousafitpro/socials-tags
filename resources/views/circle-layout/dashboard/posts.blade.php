@extends('circle-layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Posts</h5>
                    <a href="{{url('My-Dashboard/publish-post')}}" class="btn btn-primary" type="button"  style="zoom: 0.8; float: right"  >
                        <i data-feather="plus"></i> Add New
                    </a>
<br>
<br>
<br>
<br>
<br>
<br>
                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Title </th>
<th>Description</th>
                            <th>Platforms</th>
                            <th>date</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $p)
                        <tr>
                            <td>{{$p->title}}</td>
                            <td>{!! $p->post_content !!}</td>
                            <td style="min-width: 200px">
                                @if($p->facebook_post_id)
                                    <div >
                                        <div class="dropdown">
                                            <button class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false" type="button"  >
                                                <i data-feather="facebook"></i>
                                            </button>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#">Edit /  View</a></li>
                                                <li><a class="dropdown-item" href="#">Hide</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                @endif
                                    @if($p->twitter_post_id)
                                <button class="btn btn-primary" type="button"  style="zoom: 0.8; margin-top: 5px"  >
                                    <i data-feather="twitter"></i>
                                </button>
                                        @endif
                            </td>
                            <td>{{$p->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">

                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Edit /  View</a></li>
                                        <li><a class="dropdown-item" href="#">Hide</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>

                                    </ul>
                                </div>
                            </td>

                        </tr>
                       @endforeach

                        </tbody>

                    </table>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
