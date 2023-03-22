@extends('circle-layout.layout')
@section('content')
    @include('circle-layout.errors.errorsArray')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Add New User</h5>
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

                  <form method="post" action="{{url('User/Add')}}">
@csrf
                      <div>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>Email</label><br>
                                  <input class="form-control" required name="email" value="{{old('email')}}">
                              </div>
                              <div class="col-md-6">
                                  <label>Profile Photo</label><br>
                                  <input class="form-control" required name="photo" type="file">
                              </div>
                          </div><br>
                          <div class="row">
                              <div class="col-md-6">
                                  <label>First Name</label><br>
                                  <input class="form-control" value="{{old('fname')}}" required name="fname">
                              </div>
                              <div class="col-md-6">
                                  <label>Last Name</label><br>
                                  <input class="form-control" value="{{old('lname')}}" required name="lname">
                              </div>
                          </div><br>

                          <div class="row">
                              <div class="col-md-6">
                                  <label>Password</label><br>
                                  <input class="form-control" required name="password" type="password" value="{{old('password')}}">
                              </div>
                              <div class="col-md-6">
                                  <label>Confirm Password</label><br>
                                  <input class="form-control" required type="password" name="confirm" value="{{old('confirm')}}">
                              </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-12">
                                  <button type="submit"  class="form-control btn btn-primary">Submit</button>
                              </div>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection
