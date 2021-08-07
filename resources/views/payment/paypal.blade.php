@extends('frontEnd.layouts.master')
@section('title','payment')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading-success"><b>Paywith Paypal</b></div>
                <div class="panel-body">
                    <div class="col-md-6 col-md-offset-3">
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div style="margin-bottom: 20px;">
</div>


<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AeonKnJULGrxARO4MHvx9N1dajG0NcftOl4YfgUsiy2AbZ8VtIDMr98V9ZwgB1lT7qeB2rF9y9GCKCE1&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: "{{$amount}}"
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                if (transaction?.status === 'COMPLETED' && transaction.id) {
                    const url = "{{ route('paywithpaypalSuccess') }}?status=COMPLETED&invoice_code={{$invoice_code}}"
                    window.location.href = url;
                }
            });
        }


    }).render('#paypal-button-container');
</script>
@endsection