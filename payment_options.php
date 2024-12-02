<div class="box"><!-- box Starts -->

<?php
// Get the session email of the customer
$session_email = $_SESSION['customer_email'];

// Fetch customer details from the database based on the email
$select_customer = "select * from customers where customer_email='$session_email'";
$run_customer = mysqli_query($con, $select_customer);
$row_customer = mysqli_fetch_array($run_customer);

// Get the customer ID
$customer_id = $row_customer['customer_id'];
?>

<h1 class="text-center">Payment Options For You</h1>

<p class="lead text-center">
    <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>
</p>

<center><!-- center Starts -->

<!-- Paystack Payment Form -->
<form id="paymentForm" method="post">
    <div class="form-group">
        <label for="email-address">Email Address:</label>
        <input type="email" id="email-address" name="email-address" class="form-control" required placeholder="example@domain.com">
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" class="form-control" required placeholder="Enter amount" value="1000">
    </div>
    <div class="form-group mt-3 text-center">
        <button type="submit" id="payWithPaystack" class="btn btn-success btn-lg">
            <i class="fas fa-credit-card"></i> Pay with Paystack
        </button>
    </div>
</form>

</center><!-- center Ends -->

</div><!-- box Ends -->

<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
// Paystack payment script
document.getElementById("payWithPaystack").addEventListener("click", function (e) {
    e.preventDefault(); // Prevent default form submission

    var handler = PaystackPop.setup({
        key: 'pk_test_dfbedadc368efaa8d21f4417d905c3a76a0bc348', // Public key
        email: document.getElementById('email-address').value,
        amount: document.getElementById('amount').value * 100, // Amount in the smallest currency unit
        currency: 'GHS', // Currency (GHS for Ghana Cedi)
        ref: "" + Math.floor(Math.random() * 1000000000 + 1), // Random transaction reference
        callback: function(response) {
            // Callback function after payment completion
            window.location.href = "paystack_process.php?reference=" + response.reference;
        },
        onClose: function() {
            alert('Transaction was not completed, window closed.');
        }
    });

    handler.openIframe(); // Open the Paystack payment iframe
});
</script>
