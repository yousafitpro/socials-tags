@extends('layout.master')
@section('title',"Membership")
@section('content')





{{--    start membership--}}
<?php

$setting=user_setting(auth()->id())
?>

@if($setting->card_number!=null)
    <div class="row">
        <div class="col-md-8 col-sm-12 offset-md-2">
            <h3>Membership</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-12 offset-md-2">
            <div class="box">
                <div class="box-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-2">


                                <img src="{{asset("icons/dc.png")}}" style="width:100%; min-width: 30px; max-width: 60px">

                            </div>
                            <div class="col-6" >
                                <label style="font-weight: bold; margin-top: 5px">XXXX XXXX XXXX X{{substr($setting->card_number?decrypt($setting->card_number):'',-3,3)}}</label><br>
                                <small>Last Date:{{$setting->last_paid}}</small>


                            </div>
                            <div class="col-4" >


                                <a onclick="confirm('Are you sure?')"  href="{{url('cancel-membership')}}" class="btn btn-rounded btn-danger btn-sm">
                                    Cancel Membership
                                </a>


                            </div>
                        </div><br>


                    </div>
                </div>
            </div>
        </div>

    </div>
@else
    <br>
    <br>
    <br>
    <h3 style="text-align: center">You cannot reactivate membership until your subscription expires</h3>
    @endif


{{--    end membership--}}



@stop
@section('js')

@endsection
