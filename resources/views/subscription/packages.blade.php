@extends('layout.master')
@section('title',"Packages")
@section('content')
    <style>
        .pHeader{
            height: 80px;

        }
        .pHeaderFooter{
            background-color: #eee;
            height: 80px;
        }
        .box:hover {
            box-shadow: 0px 10px 20px 15px rgba(0,0,0,0.2)
        }
    </style>

    <?php
    $setting=user_setting(auth()->id())
    ?>
 @if($setting->last_paid==today_date())
     <div class="row">
         <div class="col-md-12 text-center">
             <h2>Sorry!</h2>
         </div>
     </div>
     <br>
     <br>
     <h3 style="text-align: center">Check Back Soon!  </h3>
 @else
     <div class="row">
         <div class="col-md-12 text-center">
             <h2>Popular Packages</h2>
         </div>
     </div>
     <br>
     <br>
     <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-4" >
             <div class="box" style="padding: 0; min-height: 470px">

                 <div class="pHeader myFlex" style="background-color: lightgrey; color: white">
                     <h3 style="color: black">Basic</h3>
                 </div>
                 <div class="pHeaderFooter myFlex" >
                     <h3>${{user_package_price('monthly')}} / Monthly </h3>

                 </div>
                 <br>
                 <div class="pDiv myFlex" >
                     <h4>  0% Off</h4>
                 </div>
                 @if($setting->is_trial_used=="false")
                     <br>
                     <div class="pDiv myFlex" style="color: orangered" >
                         <h4>  30 Day Free Trial Included</h4>
                     </div>
                 @endif
                 <br>
                 <div class="pDiv myFlex" >
                     <h4>  Unlimited Transactions</h4>
                 </div>
                 <div class="pDiv myFlex" >
                     <h4>  3 Cards Allowed</h4>
                 </div>
                 <div class="pDiv myFlex" >
                     <h4>  Free Support</h4>
                 </div>
                 <div class="pDiv myFlex" >
                     <h4>  Send Funds Internationally</h4>
                 </div>
                 <br>
                 <br>
                 <br>
                 <a href="{{url('security/renew-package').'?plan=monthly'}}" style="margin-top: 6px">
                     <button class="btn form-control" style="background-color: #0A246A; color: white">Continue</button>
                 </a>
             </div>
         </div>
         <div class="col-md-4">
             <div class="box" style="padding: 0; min-height: 470px">
                 <div style="background-color: var(--primary);  color: white; text-align: center">
                     <h5 style="margin-top: 5px;">Most Popular Option</h5>
                 </div>
                 <div class="pHeader myFlex" style="background-color: lightgrey; color: white">
                     <h3 style="color: black">Pro</h3>
                 </div>
                 <div class="pHeaderFooter myFlex" >
                     <h3>${{user_package_price('yearly')}} / Yearly </h3>

                 </div>
                 <br>
                 <div class="pDiv myFlex" >
                     <h4>  33% Off</h4>
                 </div>
                 @if($setting->is_trial_used=="false")
                     <br>
                     <div class="pDiv myFlex" style="color: orangered" >
                         <h4>  30 Day Free Trial Included</h4>
                     </div>
                 @endif
                 <br>
                 <div class="pDiv myFlex" >
                     <h4>  Unlimited Transactions</h4>
                 </div>
                 <div class="pDiv myFlex" >
                     <h4>  5 Cards Allowed</h4>
                 </div>
                 <div class="pDiv myFlex" >
                     <h4>  Free Support</h4>
                 </div>
                 <div class="pDiv myFlex" >
                     <h4>  Send Funds Internationally</h4>
                 </div>
                 <br>
                 <br>
                 <a href="{{url('security/renew-package').'?plan=yearly'}}">
                     <button class="btn  form-control" style="background-color: #0A246A; color: white">Continue</button>
                 </a>

             </div>
         </div>
     </div>
 @endif

@stop
@section('js')

@endsection
