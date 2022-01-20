<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation - NV Foundation</title>
    <link rel="stylesheet" type="text/css" href="donation.css">
</head>
<body>
<div class="container">
    <nav>
        <label class="logo">NV Foundation</label>
        <ul>
            <li>Home</li>
            <li><a href="#about">About Us</a></li>
            <li><a href="donate.php">Donate</a></li>
            <li>Contact</li>
        </ul>
    </nav>
    <section id="back">
        <div class="login-box">
            <h1 class="header">Donation Summary</h1>
            <hr class="line3">
            <div style="padding:50px 30px; line-height:28px;">
                <label class="don">Name:</label>&nbsp <u><?php echo $_SESSION['name'];?></u><br><br>
                <label class="don">Email id:</label>&nbsp <u><?php echo $_SESSION['email'];?></u><br><br>
                <label class="don">Phone Number:</label>&nbsp <u><?php echo $_SESSION['phone'];?></u><br><br>
                <label class="don">Amount:</label> &nbsp <u><?php echo $_SESSION['amount'];?></u>   <br><br>
                <button id="rzp-button1">Continue to Payment</button>
            </div>
        </div>
    </section>
</div>
</body>
</html>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
