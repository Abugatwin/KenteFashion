<?php
// Include necessary files
include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");

?>

<?php
// Check if customer ID is passed via URL
if (isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
}

// Get the user's IP address
$ip_add = getRealUserIp();

// Set the order status to 'pending'
$status = "pending";

// Generate a random invoice number
$invoice_no = mt_rand();

// Select all items from the cart for the current user based on IP address
$select_cart = "select * from cart where ip_add='$ip_add'";
$run_cart = mysqli_query($con, $select_cart);

// Loop through each item in the cart
while ($row_cart = mysqli_fetch_array($run_cart)) {

    // Extract product details from the cart
    $pro_id = $row_cart['p_id'];
    $pro_size = $row_cart['size'];
    $pro_qty = $row_cart['qty'];

    // Calculate subtotal for the product
    $sub_total = $row_cart['p_price'] * $pro_qty;

    // Insert the customer's order into the customer_orders table
    $insert_customer_order = "
        insert into customer_orders (customer_id, due_amount, invoice_no, qty, size, order_date, order_status) 
        values ('$customer_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', NOW(), '$status')
    ";
    $run_customer_order = mysqli_query($con, $insert_customer_order);

    // Insert the order into the pending_orders table
    $insert_pending_order = "
        insert into pending_orders (customer_id, invoice_no, product_id, qty, size, order_status) 
        values ('$customer_id', '$invoice_no', '$pro_id', '$pro_qty', '$pro_size', '$status')
    ";
    $run_pending_order = mysqli_query($con, $insert_pending_order);

    // Delete the item from the cart after the order is placed
    $delete_cart = "delete from cart where ip_add='$ip_add'";
    $run_delete = mysqli_query($con, $delete_cart);

    // Display confirmation message
    echo "<script>alert('Your order has been submitted, Thanks')</script>";
    
    // Redirect the user to the 'my orders' page in their account
    echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
}
?>
