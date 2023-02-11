



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
                @if(!auth()->check())
                <div style="padding: 10px; color: darkred">
                    <label>Please <a href="{{url('register')}}">register</a> yourself before subscription or <a href="{{url('login')}}">Login here </a> </label>
                </div>
                @endif
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
                        <div style="width: 100%;">
                            <div style="width: 10%; float: left">

                                <input checked="true" onclick="setSubscriptionAmount(4.99,'year')" id="yearCheckBox" value="year" style="zoom: 1.2;  margin-top: 3px" type="radio" name="memberType">
                            </div>

                            <div style="width: 50%; float: left;text-align: left">
                                <strong>1 Year Membership</strong>
                            </div>

                            <span style="width: 40%; float: left; text-align: right">

                            <strong style="color: gray">$39.99</strong>
                            /
                            <strong>year</strong>
</span>


                        </div>

                        <br>
                        <br>
                        <div style="width: 100%;">
                            <div style="width: 10%; float: left">

                                <input value="month" onclick="setSubscriptionAmount(4.99,'month')" style="zoom: 1.2;  margin-top: 3px" type="radio" name="memberType">
                            </div>

                            <div style="width: 50%; float: left;text-align: left">
                                <strong>1 Month Membership</strong>
                            </div>

                            <span style="width: 40%; float: left; text-align: right">

                            <strong style="color: gray">$4.99</strong>
                            /
                            <strong>month</strong>
</span>


                        </div>

                        <br>
                        <br>
                        <br>
                        <div class="row">

                            <div class="col-12" >
                                {{--                            <div id="paypal-button-container"></div>--}}
                                <button class="btn form-control" onclick="{{auth()->check()?'submitSubcriptionNowStep1()':'alert("Please register or login first")'}}" style="background-color: #127764; color: white">Continue</button>


                            </div>

                        </div>
                        <br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var G_amount=39.99
    var type='year'
    function setSubscriptionAmount(amount,type)
    {
        G_amount=amount

    }
    function submitSubcriptionNowStep1()
    {
        window.location.href='{{url('paypal/complete-payment')}}/'+type
    }


    function showSubscription_Modal()
    {

            $(document).ready(function () {
                $("#subscriptionModal").modal();
            });

    }
</script>




