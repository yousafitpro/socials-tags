@extends('circle-layout.layout')
@section('title',"User Profile")
@section('content')
<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal form-element" enctype="multipart/form-data" method="POST" action="/profile/update">
                        @csrf


                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Avatar</label>
                                        <div class="col-md-9">
                                            <input type="file" accept="image/*" class="form-control" name="avatar" value="{{$record->name}}" />
                                        </div>
                                    </div>
                        <br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text"  class="form-control" name="fname" value="{{$record->fname}}" required/>
                                        </div>
                                    </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="lname" value="{{$record->lname}}" required/>
                            </div>
                        </div>
                        <br>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  value="{{$record->email}}" disabled/>
                                        </div>
                                    </div>
                        <br>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="phone" value="{{$record->phone}}" />
                                        </div>
                                    </div>
                        <br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="address" value="{{$record->address}}" />
                                        </div>
                                    </div>

                        <br>



<br>
                                <div class="box-footer text-center" >
                                    <button type="submit" class="btn btn-primary pull-right " style="width: 100%">
                                        <i class="ti-save-alt"></i> Update
                                    </button>

                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal form-element" enctype="multipart/form-data" method="POST" action="{{route('changePasswordPost')}}">
                                @csrf
                            <div class="box-header with-border text-center">
                                <h4 class="box-title">Change Password</h4>
                            </div>
                                <hr>
                                <br>
                                <br>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Old Password</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="old_password" value="{{old('old_password')}}" required/>
                                </div>
                            </div>
                                <br>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="password" value="{{old('password')}}" required/>
                                </div>
                            </div>
                                <br>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary " style="width:100%">
                                    <i class="ti-save-alt"></i> Update
                                </button>
                            </div>
                            </form>

                        </div>
                    </div>

{{--                  @if(auth()->user()->company)--}}
{{--                        <br>--}}
{{--                    <br>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-12">--}}
{{--                      <form action="{{url('merchant/offer/update-offer-note')}}" method="post">--}}
{{--                          @csrf--}}
{{--                          <label>Offer Note</label>--}}
{{--                          <textarea class="form-control" name="offer_note" style="min-height: 200px">@if(auth()->user()->company->offer_note!=null){{auth()->user()->company->offer_note}}@else Please find attached your invoice. Once you you review it, come back to this email and click pay button. Please note, convenience fee is extra charge that is charged by zpayd.com and is seperate from the enclosed bill--}}
{{--                              @endif--}}
{{--</textarea>--}}
{{--                          <br>--}}
{{--                          <button class="btn btn-primary pull-right">Update</button>--}}
{{--                      </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                      @endif--}}
                </div>
            </div>
        </div>
        <br>

    </div>
</div>

@stop
@section('js')

@endsection
