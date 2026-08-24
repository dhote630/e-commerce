<?php
// Include the Razorpay PHP library
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

// Initialize Razorpay with your key and secret
$api_key = 'rzp_test_TSQ20whunzguIf';
$api_secret = 'AF7oTIXA6zCv1ZVHRpIE1XbR';

$api = new Api($api_key, $api_secret);
// Create an order
$order = $api->order->create([
    'amount' => 1000*100, // amount in paise (100 paise = 1 rupee)
    'currency' => 'INR',
    'receipt' => 'order_receipt_12asa3'
]);
// Get the order ID
$order_id = $order->id;

// Set your callback URL
$callback_url = "success.html";

// Include Razorpay Checkout.js library
echo '<script src="https://checkout.razorpay.com/v1/checkout.js"></script>';

// Create a payment button with Checkout.js


// Add a script to handle the payment
echo '<script>
startPayment();
    function startPayment() {
        var options = {
            key: "' . $api_key . '",
            amount: ' . $order->amount . ',
            currency: "' . $order->currency . '",
            name: "Ecommerce",
            description: "Payment for your order",
            image: "https://cdn.razorpay.com/logos/GhRQcyean79PqE_medium.png",
            order_id: "' . $order_id . '",
            theme:
            {
                "color": "#738276"
            },
            callback_url: "' . $callback_url . '"
        };
        var rzp = new Razorpay(options);
        rzp.open();
    }
</script>';
?>
