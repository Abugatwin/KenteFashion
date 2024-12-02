<?php
session_start();
include("includes/db.php");
include("includes/header.php");
?>

<div class="container">
    <h1 class="text-center">Payment Successful!</h1>
    <p class="lead text-center">Thank you for your payment. Your order has been successfully processed.</p>
    <p class="text-center"><a href="index.php" class="btn btn-primary">Go to Home</a></p>
</div>

<?php include("includes/footer.php"); ?>
