



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade"   id="subscriptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <img src="{{asset('icon/logo.png')}}" style="width: 70px">
                    Voters News </h5>

            </div>
            <div class="modal-body" style="padding: 0; margin: 0">
            <div style="background-color: #127764; min-height: 150px; width: 100%; color: white; padding: 10px">
               <small>
                   <label>Digital Subscribers Receive:</label><br>
                  -> Unlimited access to all of our great content from any device at any time.<br>
                  -> Become a member of a community that cares about the same things you do.<br>
                  -> The benefit of knowing you're supporting votersnews.com!
               </small>
            </div>
                <div style="min-height: 150px;">
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-1">

                            <input style="zoom: 1.5;  margin-top: 3px" type="radio" name="memberType">
                        </div>
                        <div class="col-6"  >
                            <strong>1 Year Membership</strong>
                        </div>
                        <div class="col-5" style="text-align: right;">
                            <strong style="color: gray">$39.99</strong>
                            /
                            <strong>year</strong>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-1">

                            <input style="zoom: 1.5;  margin-top: 3px" type="radio" name="memberType">
                        </div>
                        <div class="col-6" style="font-size: 15px">
                            <strong>1 Month Membership</strong>
                        </div>
                        <div class="col-5" style="text-align: right">
                            <strong style="color: gray">$4.99</strong>
                            /
                            <strong>month</strong>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">

                        <div class="col-4 offset-4">
                            <button class="btn form-control" style="background-color: #127764; color: white">Continue</button>
                        </div>

                    </div>
                    <br>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>

@if((auth()->check() && (auth()->user()->valid_till<today_date() || auth()->user()->valid_till=='renew' || auth()->user()->valid_till==null)) || !auth()->check())

    <script>

        $(document).ready(function(){
            $("#subscriptionModal").modal();
        });
    </script>
@endif
