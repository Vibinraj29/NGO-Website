<?php

require('config.php');
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'nvfoundation';

$conn = mysqli_connect($server,$username,$password,$database);

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $payment = $_POST['razorpay_payment_id'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];
    $amount = $_SESSION['amount'];


    $sql = "insert into donationdetails (payment_id,name,email,phoneno,amount) values('$payment','$name','$email','$phone','$amount')";
    $query = mysqli_query($conn,$sql);
    if($query){
        header('location:http://localhost/Task1/greet.php');
    }

}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
