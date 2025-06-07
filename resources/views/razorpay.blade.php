<html>
<head>
    <title>Razorpay Payment</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
<script>
    var user_id = @json($user_id);
    var amount = @json($amount);

    var options = {
        "key": "rzp_test_Umh6C4mOz4m4yM",
        "amount": amount * 100,
        "currency": "INR",
        "handler": function (response){
            console.log("Razorpay payment ID:", response.razorpay_payment_id);

            if(response.razorpay_payment_id) {
                // Make an AJAX request to store the payment details
                var payment_success_route = @json(route('stripe.post'));

                $.ajax({
                    url: payment_success_route,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        user_id: user_id,
                        payment_id: response.razorpay_payment_id,
                        ip_address: response.ip_address,
                        amount: amount
                    },
                    success: function (data) {
                        console.log("AJAX request succeeded:", data);

                        if(data.success) {
                            // Redirect to success page
                            window.location.href = @json(route('payment_thankyou')); 
                        } else {
                            // Handle error
                            window.location.href = @json(route('payment_thankyou')); 
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Failed to store payment details:', error);
                        window.location.href = payment_fail_route.replace('__USERID__', user_id);
                    }
                });
            } else {
                window.location.href = payment_fail_route.replace('__USERID__', user_id);
            }
        },
        "modal": {
            "ondismiss": function() {
                window.location.href = 'https://mbihosting.in/healthy-belly/';
            }
        },
        "prefill": {},
        "theme": {
            "color": "#F37254"
        }
    };

    var rzp = new Razorpay(options);
    window.onload = function() {
        rzp.open();
        // e.preventDefault();
    }
</script>
</body>
</html>