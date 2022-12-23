@extends('layout.master')
@section('title',"Renew Plan")
@section('content')
    @if(!request('plan'))
        <script>
            window.location.href='{{url('security/packages')}}'
        </script>
        @endif
    <script src="{{config('myconfig.Converge.script_url')}}"></script>
    {{--    <script src="https://api.convergepay.com/hosted-payments/Checkout.js"></script>--}}

    <script type="text/javascript" src="https://js.verygoodvault.com/vgs-collect/2.17.0/vgs-collect.js"></script>
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
    <div class="box">


        <br>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <h3>Activate Your  Membership</h3>
            </div>
        </div>

        @if(!$is_has_pending)
            <br>
            <div class="row">
                <div class="offset-sm-3 col-sm-6">
                    <div class="box-body">
                        <br>


                        <div class="row " >
                            <div class="col-md-6  ">
                                <label>Duration</label><br>
                                <input value="{{request('plan')}}" id="plan" disabled class="form-control">
                            </div>
                            <div class="col-md-6  ">
                                <br>

                                <a href="{{url('security/packages')}}" style="color: var(--primary)">Change Plan</a>
                            </div>
                        </div>
                        <br>

                        <div class="row " >
                            <div class="col-md-12  ">
                                <label>Total Charges</label><br>
                                <input id="mytotal" disabled class="form-control">
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">

                            <div class="col-6">
                                <input id="ssl_first_name" type="text" placeholder="First Name" class="form-control" name="ssl_first_name" required/>
                            </div>
                            <div class="col-6">
                                <input id="ssl_last_name" type="text" placeholder="Last NAme" class="form-control" name="ssl_first_name" required/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form id="collect-form">
                                    <input id="token" hidden>
                                    <input id="card" hidden>
                                    <input id="exp" hidden>
                                    <input id="tamount" hidden  value="0" >

                                    <input id="cvv" hidden>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="cardBox">


                                                <div id="cc-number" class="form-field"></div>
                                                <div class="form-field-group" style="margin-top: 6px">
                                                    <div id="cc-expiration-date" class="form-field"></div>

                                                    <div id="cc-cvc" class="form-field" ></div>
                                                </div>
                                                <div id="ExpDateErrorBox" class="text-danger">
                                                    Enter a Valid Expiration Date
                                                </div>
                                                <br>
                                                <!--Submit credit card form button-->

                                                <div class="text-danger " id="result">
                                                </div>

                                            </div>
                                                <?php
                                                $setting=user_setting(auth()->id())
                                                ?>


                                            @if($setting->is_trial_used=='false')
                                                <button type="submit" onclick="setType('late_subscription')"  class="btn form-control " style="color: white; background-color:#f28038">Get Started with Your 30-Day Free Trial</button>

                                            @else
                                                <button type="submit" onclick="setType('subscription')"  class="btn form-control " style="color: white; background-color:#f28038">Submit</button>
                                                @endif
                                            <br>
                                            <br>
                                            {{--                                        <form id="payment-form">--}}
                                            {{--                                            <div id="card-container"></div>--}}

                                            {{--                                                <button id="card-button" class="btn btn-primary form-control" style="color: white; background-color: var(--primary)" type="button">Submit</button>--}}

                                            {{--                                        </form>--}}

                                            {{--                                        <div id="payment-status-container"></div>--}}
                                        </div>
                                    </div>

                                    <?php
                                        $setting=user_setting(auth()->id())
                                        ?>
{{--                                    @if($setting->is_trial_used=="false")--}}
{{--                                        <button id="card-button" class="btn btn-primary form-control" style="color: white" type="button">Get Started with Your 30-Day Free Trial </button>--}}
{{--                                    @else--}}
{{--                                        <button id="card-button" class="btn btn-primary form-control" style="color: white" type="button">Submit </button>--}}
{{--                                    @endif--}}
                                </form>
                                @if($setting->is_trial_used=="false")
                                    <br>
                                    <p>
                                        This no cost 30 day trial period allows you to evaluate our platform and all great benefits we offer to you. When you sign up for free trial, you are enrolling in an Zpayd subscription product. If you do not cancel your product before the trial period ends, you will be charged for your account on a monthly or annual basis until you cancel. If you wish to cancel your subscription, you can do so by emailing us at support@zpayd.com or contact us through inquiry box straight from your Zpayd account. </p>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 myFlex" >
                                        <img src="{{asset('smallicons/3D-Secure.jpeg')}}" style="width: 200px; height: 60px">
                                    </div>
                                </div>
                                <div id="payment-status-container"></div>
                            </div>
                        </div>




                    </div>

                </div>
            </div>
        @else
            <br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <small>You have Charged already and waiting for Payment Approval</small>
                </div>
            </div>
        @endif

        <br>

        @include('notes.payment-footer')
        <br>
        <br>
    </div>
    @endif

@stop

@section('js')


    @include('bills.script')
    <script type="text/javascript" src="https://web.squarecdn.com/v1/square.js"></script>
    <script>
             var server_payment=null;
             var failed_attempts=0;
        {{--var applicationId='sq0idp-Gua2JKWIUJSr76Df0HvmEA'--}}
        {{--var locationId='LE1CNHP6MQ8B0'--}}
        {{--async function initializeCard(payments) {--}}
        {{--    const card = await payments.card();--}}
        {{--    await card.attach('#card-container');--}}
        {{--    return card;--}}
        {{--}--}}
        {{--async function createPayment(token) {--}}
        {{--    console.log("My Token",token)--}}
        {{--    // const body = JSON.stringify({--}}
        {{--    //     locationId,--}}
        {{--    //     sourceId: token,--}}
        {{--    // });--}}
        {{--    // const paymentResponse = await fetch('/payment', {--}}
        {{--    //     method: 'POST',--}}
        {{--    //     headers: {--}}
        {{--    //         'Content-Type': 'application/json',--}}
        {{--    //     },--}}
        {{--    //     body,--}}
        {{--    // });--}}
        {{--    // if (paymentResponse.ok) {--}}
        {{--    //     return paymentResponse.json();--}}
        {{--    // }--}}
        {{--    // const errorBody = await paymentResponse.text();--}}
        {{--    // throw new Error(errorBody);--}}
        {{--}--}}

        {{--// This function tokenizes a payment method.--}}
        {{--// The ‘error’ thrown from this async function denotes a failed tokenization,--}}
        {{--// which is due to buyer error (such as an expired card). It is up to the--}}
        {{--// developer to handle the error and provide the buyer the chance to fix--}}
        {{--// their mistakes.--}}
        {{--async function tokenize(paymentMethod) {--}}

        {{--    const tokenResult = await paymentMethod.tokenize();--}}
        {{--    if (tokenResult.status === 'OK') {--}}
        {{--        return tokenResult.token;--}}
        {{--    } else {--}}
        {{--        let errorMessage = `Tokenization failed-status: ${tokenResult.status}`;--}}
        {{--        if (tokenResult.errors) {--}}
        {{--            errorMessage += ` and errors: ${JSON.stringify(--}}
        {{--                tokenResult.errors--}}
        {{--            )}`;--}}
        {{--        }--}}
        {{--        throw new Error(errorMessage);--}}
        {{--    }--}}
        {{--}--}}

        {{--// Helper method for displaying the Payment Status on the screen.--}}
        {{--// status is either SUCCESS or FAILURE;--}}
        {{--function displayPaymentResults(status) {--}}
        {{--    const statusContainer = document.getElementById(--}}
        {{--        'payment-status-container'--}}
        {{--    );--}}
        {{--    if (status === 'SUCCESS') {--}}
        {{--        statusContainer.classList.remove('is-failure');--}}
        {{--        statusContainer.classList.add('is-success');--}}
        {{--    } else {--}}
        {{--        statusContainer.classList.remove('is-success');--}}
        {{--        statusContainer.classList.add('is-failure');--}}
        {{--    }--}}

        {{--    statusContainer.style.visibility = 'visible';--}}
        {{--}--}}

        {{--document.addEventListener('DOMContentLoaded', async function () {--}}
        {{--    if (!window.Square) {--}}
        {{--        throw new Error('Square.js failed to load properly');--}}
        {{--    }--}}
        {{--    const payments = window.Square.payments(applicationId, locationId);--}}
        {{--    let card;--}}
        {{--    try {--}}
        {{--        card = await initializeCard(payments);--}}
        {{--        console.log('card',card)--}}
        {{--    } catch (e) {--}}
        {{--        console.error('Initializing Card failed', e);--}}
        {{--        return;--}}
        {{--    }--}}

        {{--    // Step 5.2: create card payment--}}
        {{--    // Checkpoint 2.--}}
        {{--    async function handlePaymentMethodSubmission(event, paymentMethod) {--}}
        {{--        event.preventDefault();--}}

        {{--        try {--}}
        {{--            // disable the submit button as we await tokenization and make a--}}
        {{--            // payment request.--}}
        {{--            cardButton.disabled = true;--}}
        {{--            const token = await tokenize(paymentMethod);--}}
        {{--            console.log('token',token)--}}
        {{--            var name=$("#cardholder_name").val()--}}
        {{--            var amount=$("#mytotal").val()--}}
        {{--            $("#mainLoader1").modal("show")--}}
        {{--            $.ajax({--}}
        {{--                type: 'post',--}}
        {{--                url: "{{route('sqaure.save_token')}}",--}}
        {{--                data: {"_token": "{{ csrf_token() }}","token":token,'duration':$("#plan").val(),"amount":amount,"name":name,'type':'debit'},--}}
        {{--                success: function (data) {--}}
        {{--                    console.log('Data',data)--}}
        {{--                    if (data.code==1)--}}
        {{--                    {--}}
        {{--                        $("#mainLoader1").modal("hide")--}}
        {{--                        alert(data.message)--}}
        {{--                        $("#SubscribeWaitingBox").modal("show")--}}
        {{--                        setTimeout(function (){--}}
        {{--                            $("#SubscribeWaitingBox").modal("hide")--}}
        {{--                            window.location.href='{{url('dashboard')}}'--}}
        {{--                        },3000)--}}
        {{--                    }--}}
        {{--                    else--}}
        {{--                    {--}}
        {{--                        $("#mainLoader1").modal("hide")--}}
        {{--                        alert('Something going wrong Please try Again')--}}
        {{--                        --}}{{--window.location.href='{{url('dashboard')}}'--}}
        {{--                    }--}}


        {{--                }})--}}
        {{--            // const paymentResults = await createPayment(token);--}}
        {{--            displayPaymentResults('SUCCESS');--}}

        {{--            console.debug('Payment Success', paymentResults);--}}
        {{--        } catch (e) {--}}
        {{--            cardButton.disabled = false;--}}
        {{--            displayPaymentResults('FAILURE');--}}
        {{--            console.error(e.message);--}}
        {{--        }--}}
        {{--    }--}}

        {{--    const cardButton = document.getElementById(--}}
        {{--        'card-button'--}}
        {{--    );--}}
        {{--    cardButton.addEventListener('click', async function (event) {--}}
        {{--        var name=$("#cardholder_name").val()--}}
        {{--        if (name=='' || name.length<3)--}}
        {{--        {--}}
        {{--            alert("Please Enter Card Holder Name Correctly .")--}}
        {{--            return;--}}
        {{--        }--}}
        {{--        await handlePaymentMethodSubmission(event, card);--}}
        {{--    });--}}
        {{--});--}}

        var is_ok=false;
        var is_done=false;
        var payment_type="subscription"
             function setType(type)
             {
                 payment_type=type;

             }
        const form=VGSCollect.create("{{config('myconfig.VGS.key')}}", "{{config('myconfig.VGS.env')}}",function
            (state){
            if(!state.isValid){

                if (state.card_expirationDate.errorMessages.length > 0) {
                    console.log(state.card_expirationDate.errorMessages)
                    $("#ExpDateErrorBox").css("display",'block')
                    is_ok=false;
                }else{
                    $("#ExpDateErrorBox").css("display",'none')
                    is_ok=true;
                }

            }
//xzxczxc
        });

        // Create VGS Collect field for credit card number asd
        form.field('#cc-number', {
            type: 'card-number',
            name: 'disbursementNumber',
            // placeholder: 'Card number',
            validations: ['required','validCardNumber'],
            showCardIcon: true,
            successColor: '#f28038',
            errorColor: '#D8000C',
            placeholder: 'XXXX XXXX XXXX XXXX'

        });

        // Create VGS Collect field for CVC
        form.field('#cc-cvc', {
            type: 'card-security-code',
            name: 'card_cvc',
            placeholder: 'XXX',
            validations: ['required', 'validCardSecurityCode'],
        });

        // Create VGS Collect field for credit card expiration date
        form.field('#cc-expiration-date', {
            type: 'card-expiration-date',
            name: 'card_expirationDate',
            placeholder: 'XX / XX',
            validations: ['validCardExpirationDate']
        });


        document.getElementById('collect-form')
            .addEventListener('submit', function (e) {
                if(!is_done)
                {

                }
                e.preventDefault();

                if(!is_ok)
                {

                    e.preventDefault();
                    alert("Please fill all data correctly")
                    return;
                }
                swal({
                    title:"",
                    text:"Submitting...",
                    icon: "{{asset('loaders/loader1.gif')}}",
                    buttons: false,
                    closeOnClickOutside: false,
                    timer: 3000000000,
                    //icon: "success"
                });

                form.submit('/post', {}, function (status, data) {
                    console.log(data)
                    $("#card").val(data.json.disbursementNumber)
                    var str=data.json.card_expirationDate;
                    str=str.replace('/','')
                    str=str.replace(/ /g,'')
                    $("#exp").val(str)

                    $("#cvv").val(data.json.card_cvc)
                    is_done=true;

                    initiateCheckoutJS()
                },function (){
                    swal("Very Good Security Error . Please Check Your internet Connection")
                })

            }, function (errors) {

                // document.getElementById('result').innerHTML = errors;
            })
        var myamount=0;
        function initiateCheckoutJS() {
            if(failed_attempts>2)
            {
                $.get('{{url('IP/block')}}',function (data){
                    swal('Blocked',"Payment restricted for 24 hours due to multiple failed attempts. ",'error')
                    setTimeout(function (){
                        window.location.href="{{url('/dashboard')}}"
                    },2000)
                })
                return;
                //asdasd
            }
            {{--if($("#cardholder_name").val()!='{{auth()->user()->name}}')--}}
                {{--{--}}
                {{--    swal('Error!','Card holder name must be  same as you have on {{config("app.name")}} account','error')--}}
                {{--    return ;--}}
                {{--}--}}


            var amountT=parseFloat($("#tamount").val())

            myamount=document.getElementById('tamount').value
            if(amountT>parseInt('{{converge_max_amount()}}'))
            {
                swal("Error!",'Sorry amount cannot be greater than'+'{{converge_max_amount()}}','error')
                return;
            }

            var tokenRequest = {
                ssl_amount:amountT,
                _token:"{{ csrf_token() }}",
                first_name:$("#ssl_first_name").val(),
                currency:'{{default_currency()}}',
                last_name:$("#ssl_last_name").val()
            };

            swal({
                title: "Confirmation!",
                text: "{{$setting->is_trial_used=="false"?'30 Day trial starts from today. Please confirm submission':'Please confirm submission'}}",
                icon: "success",
                buttons: ["Cancel", "Confirm"],
                dangerMode: false,
            })
                .then((res) => {
                    if (res) {
                        swal({
                            title:"",
                            text:"Submitting...",
                            icon: "{{asset('loaders/loader1.gif')}}",
                            buttons: false,
                            closeOnClickOutside: false,
                            timer: 3000000000,
                            //icon: "success"
                        });

                        if(payment_type=="subscription")
                        {
                            $.post("{{url('converge/live/get_payment_token')}}", tokenRequest, function (data) {
                                document.getElementById('token').value = data.token;
                                server_payment = data.payment;
                                transactionToken = data.token;

                                pay()
                            });
                        }
                        if(payment_type=="late_subscription")
                        {

                            $.post("{{url('converge/live/get_auth_token')}}", tokenRequest, function (data) {
                                document.getElementById('token').value =data;

                                transactionToken =data;

                                pay_later()
                            });
                        }


                    } else {

                    }
                });

        }
        function pay() {

            var token = document.getElementById('token').value;
            var card = document.getElementById('card').value;
            var exp = document.getElementById('exp').value;
            var cvv = document.getElementById('cvv').value;
            var gettoken = 'y'
            var addtoken = 'y';
            var firstname =$("#ssl_first_name").val();
            var lastname =$("#ssl_last_name").val();
            var merchanttxnid = '{{random_int(10,100)}}';

            var paymentData = {
                ssl_txn_auth_token:token,
                ssl_card_number: card,
                ssl_exp_date: exp,
                ssl_get_token: gettoken,
                ssl_add_token: addtoken,
                ssl_first_name: firstname,
                ssl_last_name: lastname,
                ssl_cvv2cvc2: cvv,
                ssl_merchant_txn_id: merchanttxnid
            };
            var callback = {
                onError: function (error) {
                    failed_attempts=failed_attempts+1
                    console.log(error)

                    swal('Error!','Payment Cannot be Completed. there is something going wrong','error')
                },
                onDeclined: function (response) {
                    failed_attempts=failed_attempts+1
                    console.log("Result Message=" + response['ssl_result_message']);


                    swal('Payment Declined!',"Please fill enter all data correctly",'error')
                },
                onApproval: function (response) {

                    console.log("Approval Code=" + response['ssl_approval_code']);
                    var tempData=response;

                    // asdasd

                    //asdasd


                    var payload = {
                        actual_amount:document.getElementById('tamount').value,
                        amount:document.getElementById('tamount').value,
                        card_number:$("#card").val(),
                        card_cvv:$("#cvv").val(),
                        card_exp:$("#exp").val(),
                        payment_id:server_payment.id,
                        ssl_ps2000_data:tempData.ssl_ps2000_data,
                        ssl_approval_code:tempData.ssl_approval_code,
                        ssl_card_type:tempData.ssl_card_type,
                        ssl_txn_id:tempData.ssl_txn_id,
                        duration:$("#plan").val(),
                        type:payment_type,
                        _token:"{{ csrf_token() }}"
                    };
//asdasdasdasdasd

                    $.post("{{url('cards/confirm_subscription_payment')}}",payload, function (data) {

                        swal('Success!','Payment Successfully Completed','success')

                        setTimeout(function (){
                            window.location.href='{{url('dashboard')}}'
                        },2000)
                    });

                }
            };
            ConvergeEmbeddedPayment.pay(paymentData, callback);
            return false;
        }
             function pay_later() {


                 var token = document.getElementById('token').value;
                 var card = document.getElementById('card').value;
                 var exp = document.getElementById('exp').value;
                 var cvv = document.getElementById('cvv').value;
                 var gettoken = 'y'
                 var addtoken = 'y';
                 var firstname =$("#ssl_first_name").val();
                 var lastname =$("#ssl_last_name").val();
                 var merchanttxnid = '{{random_int(10,100)}}';

                 var paymentData = {
                     ssl_txn_auth_token:token,
                     ssl_card_number: card,
                     ssl_exp_date: exp,
                     ssl_get_token: gettoken,
                     ssl_add_token: addtoken,
                     ssl_first_name: firstname,
                     ssl_last_name: lastname,
                     ssl_cvv2cvc2: cvv,
                     ssl_merchant_txn_id: merchanttxnid
                 };
                 var callback = {
                     onError: function (error) {
                         console.log(error)

                         swal('Error!','Payment Cannot be Completed. there is something going wrong','error')
                     },
                     onDeclined: function (response) {
                         console.log("Result Message=" + response['ssl_result_message']);


                         swal('Payment Declined!',"Please fill enter all data correctly",'error')
                     },
                     onApproval: function (response) {
                         console.log("Approval Code=" + response['ssl_approval_code']);
                         var tempData=response;

                         // asdasd

                         //asdasd


                         var payload = {
                             actual_amount:document.getElementById('tamount').value,
                             amount:document.getElementById('tamount').value,
                             card_number:$("#card").val(),
                             card_cvv:$("#cvv").val(),
                             card_exp:$("#exp").val(),
                             ssl_ps2000_data:tempData.ssl_ps2000_data,
                             ssl_approval_code:tempData.ssl_approval_code,
                             ssl_card_type:tempData.ssl_card_type,
                             ssl_txn_id:tempData.ssl_txn_id,
                             duration:$("#plan").val(),
                             type:payment_type,
                             _token:"{{ csrf_token() }}"
                         };

                         $.post("{{url('cards/confirm_subscription_payment')}}",payload, function (data) {
                             swal('Success!','Payment Successfully Completed','success')
                             setTimeout(function (){
                                 window.location.href='{{url('dashboard')}}'
                             },2000)
                         });

                     }
                 };
                 ConvergeEmbeddedPayment.pay(paymentData, callback);
                 return false;
             }
        setTimeout(function (){
            planChnage()
        },2000)
        function planChnage()
        {

            if ('{{request('plan')}}'=='monthly')
            {
                $("#mytotal").val('{{user_package_price('monthly')}}'+'( {{default_currency()}} )')
                $("#tamount").val('{{user_package_price('monthly')}}')
            }
            else {
                $("#mytotal").val('{{user_package_price('yearly')}}'+'( {{default_currency()}} )')
                $("#tamount").val('{{user_package_price('yearly')}}')
            }


        }
    </script>

@endsection
