<?php
session_start();
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
?>

<!-- MAIN -->
<main>
    <div class="nero">
        <div class="nero__heading">
            <span class="nero__bold">Checkout</span>
        </div>
        <p class="nero__text"></p>
    </div>
</main>

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <?php
            // Check if the customer is logged in
            if (!isset($_SESSION['customer_email'])) {
                include("customer/customer_login.php");
            } else {
                // Show cart items and proceed to payment
                include("payment_options.php");
            }
            ?>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
