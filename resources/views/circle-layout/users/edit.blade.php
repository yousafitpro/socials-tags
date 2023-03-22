@extends('circle-layout.layout')
@section('content')
    @include('circle-layout.errors.errorsArray')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Update User</h5>
                </div>
            <div class="card-body">

                  <div class="row">
                      <div class="col-md-8">
                          <form method="post" action="{{url('User/update',request('id'))}}">
                              @csrf
                              <div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Email</label><br>
                                          <input class="form-control" readonly required name="email" value="{{$user->email}}">
                                      </div>
                                      <div class="col-md-6">
                                          <label>Profile Photo</label><br>
                                          <input class="form-control"  name="photo" type="file">
                                      </div>
                                  </div><br>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>First Name</label><br>
                                          <input class="form-control" value="{{$user->fname}}" required name="fname">
                                      </div>
                                      <div class="col-md-6">
                                          <label>Last Name</label><br>
                                          <input class="form-control" value="{{$user->lname}}" required name="lname">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <button type="submit"  class="form-control btn btn-primary">Update Profile</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="col-md-4">
                          <form method="post" action="{{url('User/update-password',request('id'))}}">
                              @csrf
                              <div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <label>Password</label><br>
                                          <input class="form-control" type="password" required name="password" >
                                      </div>

                                  </div>

                                  <br>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <button type="submit"  class="form-control btn btn-primary">Change</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                <br>
                <br>
                <br>
                <br>
                </div>
            </div>
        </div>
    </div>
@endsection
