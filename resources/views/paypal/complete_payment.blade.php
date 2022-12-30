
<head>
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<br>
<br>
<br>
<br>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <div style="border:solid 1px gray; padding: 10px">
                <h3 style="text-align: right; padding: 10px">
                    <a href="{{url('failure-redirect')}}">X</a>
                </h3>

            <h2 style="text-align: center"><span style="color: gray">{{$amount}}$</span>/ {{request('plan')}}</h2>
            <br>
            <div id="paypal-button-container"></div>
            </div>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD&intent=capture&enable-funding=venmo" data-sdk-integration-source="integrationbuilder"></script>
<script>

var G_amount='{{request('amount')}}'
    const paypalButtonsComponent = paypal.Buttons({
        // optional styling for buttons
        // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
        style: {
            color: "gold",
            shape: "rect",
            layout: "vertical"
        },

        // set up the transaction
        createOrder: (data, actions) => {
            // pass in any options from the v2 orders create call:
            // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
            const createOrderPayload = {
                purchase_units: [
                    {
                        amount: {
                            value: G_amount
                        }
                    }
                ]
            };

            return actions.order.create(createOrderPayload);
        },

        // finalize the transaction
        onApprove: (data, actions) => {
            const captureOrderHandler = (details) => {
                const payerName = details.payer.name.given_name;
                console.log('Transaction completed',details);
                var payer_id=details.payer.payer_id
                var first_name=details.payer.name.given_name
                var last_name=details.payer.name.surname
                var email_address=details.payer.email_address
                var payment_id=details.id
                var status=details.status
                var order_link=details.links[0].href
                var plan='{{request('plan')}}'
                var amount='{{request('amount')}}'
                $.ajax({
                    url:"{{url('paypal/init-payment')}}",
                    method:'post',
                    data: {"_token": "{{ csrf_token() }}",status,payment_id,email_address,payer_id,first_name,last_name,order_link,amount,plan},
                    beforeSend:function(){

                    },
                    success:function(response){

                    },
                    error: function (jqXHR, textStatus, errorThrown) {


                    },
                    complete:function(data){

                    }
                })
                window.location.href='{{url('success-redirect')}}'
            };

            return actions.order.capture().then(captureOrderHandler);
        },

        // handle unrecoverable errors
        onError: (err) => {
            console.error('An error ',err);
        }
    });

    paypalButtonsComponent
        .render("#paypal-button-container")
        .catch((err) => {
            console.error('PayPal Buttons failed to render');
        });
</script>
