<html>
<head>
    <title>Razorpay Payment</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <?php 
    $user_id = Auth::user()->id;
    ?>
    <script>
        var user_id = @json($user_id);
        var amount = @json($amount);

        //  var additional_amount = (18 / 100) * amount;

        //  var final_amount = Math.round(amount + additional_amount);


        var options = {
            "key": "rzp_test_hgCPI5BouNZi7L",
            "amount": amount * 100,
            
            "currency": "INR",
            "handler": function (response){
                if(response.razorpay_payment_id)
                {
                    var success_route_with_payment_id = payment_success_route.replace('__PAYMENT_ID__', response.razorpay_payment_id);

                    var final_success_route = success_route_with_payment_id.replace('__USERID__', user_id);

                    window.location.href = final_success_route;
                } 
                else 
                {
                    window.location.href = payment_fail_route.replace('__USERID__', user_id);
                }
            },
            "modal": {
                "ondismiss": function() {
                    window.location.href = 'https://mbihosting.in/healthy-belly/';
                }
            },
            "prefill": {
    // Add any prefill data here
  },
            "theme": {
    "color": "#F37254" // Change this value to your desired color
  }
        };

        var rzp = new Razorpay(options);
        window.onload = function() {
            rzp.open();
            e.preventDefault();
        }
    </script>
</body>
</html>