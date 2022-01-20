<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donation - NV Foundation</title>
    <link rel="stylesheet" type="text/css" href="donation.css">
    <link rel="icon" type="image/png" href="ANSRCOACH.png">
</head>
<body>
    <div class="container">
        <nav>
            <label class="logo">NV Foundation</label>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="index.html#about">About Us</a></li>
                <li><a href="donate.php">Donate</a></li>
                <li>Contact</li>
            </ul>
        </nav>
        <section id="back">
            <div class="login-box">
                <h1 class="header">Donations</h1>
                <hr class="line3">
                    <form method="post" action="pay.php">
                        <label class="don">Name:</label><br><br>
                        <input type="text" name="name" placeholder="Enter Your Name" required><br><br>
                        <label class="don">Email id:</label><br><br>
                        <input type="email" name="email" placeholder="Enter your Email id" required><br><br>
                        <label class="don">Phone Number:</label><br><br>
                        <input type="text" name="phone" placeholder="Enter Your Phone Number" required><br><br>
                        <label class="don">Amount:</label><br><br>
                        <input type="text" name="amount" placeholder="Enter Amount to Donate" required><br><br>
                        <input type="submit" value="Donate"><br><br>
                    </form>
            </div>
        </section>
    </div>
</body>
</html>
