<center>
    <h1>Do You Really Want To Delete Your Account?</h1>

    <form action="" method="post">
        <input class="btn btn-danger" type="submit" name="yes" value="Yes, I want to delete">
        <input class="btn btn-primary" type="submit" name="no" value="No, I don't want to delete">
    </form>
</center>

<?php
$c_email = $_SESSION['customer_email'];

if (isset($_POST['yes'])) {
    // Delete the customer record
    $delete_customer = "DELETE FROM customers WHERE customer_email='$c_email'";
    $run_delete = mysqli_query($con, $delete_customer);

    if ($run_delete) {
        // Destroy session and redirect
        session_destroy();
        echo "<script>alert('Your Account Has Been Deleted! Goodbye.')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if (isset($_POST['no'])) {
    // Redirect back to the account page
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
?>
