<?php
// Start the session
session_start();

// Include necessary files
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<main>
    <!-- HERO Section -->
    <div class="nero">
        <div class="nero__heading">
            <span class="nero__bold">Forgot</span> password
        </div>
        <p class="nero__text"></p>
    </div>
</main>

<div id="content"> <!-- content Starts -->
    <div class="container"> <!-- container Starts -->

        <div class="col-md-12"> <!-- col-md-12 Starts -->

            <!-- Breadcrumb Navigation -->
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>Register</li>
            </ul> <!-- breadcrumb Ends -->

        </div> <!-- col-md-12 Ends -->

        <div class="col-md-12"> <!-- col-md-12 Starts -->

            <!-- Forgot Password Box -->
            <div class="box"> <!-- box Starts -->

                <div class="box-header"> <!-- box-header Starts -->
                    <center>
                        <h3> Enter Your Email Below, We Will Send You Your Password </h3>
                    </center>
                </div> <!-- box-header Ends -->

                <div align="center"> <!-- center div Starts -->

                    <!-- Forgot Password Form -->
                    <form action="" method="post"> <!-- form Starts -->
                        <input type="text" class="form-control" name="c_email" placeholder="Enter Your Email">
                        <br>
                        <input type="submit" name="forgot_pass" class="btn btn-primary" value="Send My Password">
                    </form> <!-- form Ends -->

                </div> <!-- center div Ends -->

            </div> <!-- box Ends -->

        </div> <!-- col-md-12 Ends -->

    </div> <!-- container Ends -->
</div> <!-- content Ends -->

<?php
// Include footer
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

<?php
// Check if the form is submitted
if (isset($_POST['forgot_pass'])) {

    // Get the email entered by the user
    $c_email = $_POST['c_email'];

    // Query to check if the email exists in the database
    $sel_c = "select * from customers where customer_email='$c_email'";
    $run_c = mysqli_query($con, $sel_c);
    $count_c = mysqli_num_rows($run_c);
    $row_c = mysqli_fetch_array($run_c);

    // Extract customer name and password
    $c_name = $row_c['customer_name'];
    $c_pass = $row_c['customer_pass'];

    // If no matching email found, display an alert
    if ($count_c == 0) {
        echo "<script> alert('Sorry, We do not have your email') </script>";
        exit();
    } else {
        // Create the message to send via email
        $message = "
            <h1 align='center'> Your Password Has Been Sent To You </h1>
            <h2 align='center'> Dear $c_name </h2>
            <h3 align='center'>
                Your Password is: <span><b>$c_pass</b></span>
            </h3>
            <h3 align='center'>
                <a href='localhost/ecom_store/checkout.php'>
                    Click Here To Login To Your Account
                </a>
            </h3>
        ";

        // Email settings
        $from = "sad.ahmed22224@gmail.com";
        $subject = "Your Password";
        $headers = "From: $from\r\n";
        $headers .= "Content-type: text/html\r\n";

        // Send the email
        mail($c_email, $subject, $message, $headers);

        // Display success message and redirect to checkout page
        echo "<script> alert('Your Password has been sent to you, check your inbox ') </script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}
?>
