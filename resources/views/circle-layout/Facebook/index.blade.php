@extends('circle-layout.layout')
@section('content')
    <div class="row">
        <div class="col-md-12"  >
            <small style="color: gray">Tripe Advisor</small>
           <form action="{{url('Tripe-Advisor')}}" method="post">
               @csrf
               <div class="input-group" style="height: 40px">
                   <input type="text" name="searchKeywords" style="text-align: center" placeholder="Enter keywords here..." class="form-control" aria-label="Text input with segmented  button">
                   <div class="input-group-append">
                       <button type="submit" style="border-bottom-left-radius: 0px; border-top-left-radius: 0px" class="btn btn-outline-secondary">Search</button>

                   </div>
           </form>
        </div>
    </div>
        <br>
        <br>
        <br>
        <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>

                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email / Phone</th>
                            <th>Platform</th>
                            <th>date</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Muhamamd Yousaf</td>
                            <td>yousaf.itpro@gmail.com</td>
                            <td>Facebook</td>
                            <td>12-12-2023</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                        <li><a class="dropdown-item" href="#">Comlete Detail</a></li>

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
