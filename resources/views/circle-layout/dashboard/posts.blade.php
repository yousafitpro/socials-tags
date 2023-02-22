@extends('circle-layout.layout')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Posts</h5>
                    <button class="btn btn-primary" type="button"  style="zoom: 0.8; float: right"  >
                        <i data-feather="plus"></i> Add New
                    </button>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Platforms</th>
                            <th>date</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>some markup changes. Here’s how </td>
                            <td>some markup changes. Here’s how you can put them to work with eithersome markup changes. Here’s how you can put them to work with either</td>
                            <td style="min-width: 200px">
                                <button class="btn btn-primary" type="button" style="zoom: 0.8"  >
                                    <i data-feather="facebook"></i>
                                </button>
                                <button class="btn btn-primary" type="button"  style="zoom: 0.8; margin-top: 5px"  >
                                    <i data-feather="twitter"></i>
                                </button>
                            </td>
                            <td>12-12-2023</td>
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
                        <tr>
                            <td>some markup changes. Here’s how </td>
                            <td>some markup changes. Here’s how you can put them to work with eithersome markup changes. Here’s how you can put them to work with either</td>
                            <td style="min-width: 200px">
                                <button class="btn btn-primary" type="button" style="zoom: 0.8"  >
                                    <i data-feather="facebook"></i>
                                </button>
                                <button class="btn btn-primary" type="button"  style="zoom: 0.8; margin-top: 5px"  >
                                    <i data-feather="twitter"></i>
                                </button>
                            </td>
                            <td>12-12-2023</td>
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
@endsection
