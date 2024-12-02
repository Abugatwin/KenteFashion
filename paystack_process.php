<?php

session_start();
include("includes/db.php");

// Get the payment reference from the URL
$reference = $_GET['reference'];

// Secret key for Paystack verification (server-side)
$secret_key = 'sk_test_b760c30790ce146961a806064f429cd005e0fd40';

// Initialize cURL to verify the transaction with Paystack
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference", // Paystack URL to verify the transaction
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $secret_key", // Use the secret key for verification
        "Cache-Control: no-cache",
    ),
));

$response = curl_exec($curl); // Execute cURL request
$err = curl_error($curl); // Check for cURL errors

curl_close($curl); // Close the cURL session

if ($err) {
    // Handle cURL error
    echo "cURL Error #:" . $err;
} else {
    // Decode the response from Paystack
    $response_data = json_decode($response, true);

    // Check if the transaction is successful
    if ($response_data['status'] == 'success') {
        // Transaction is successful, proceed with storing payment details

        // Customer's email address and payment reference from the response
        $email = $response_data['data']['email'];
        $transaction_ref = $response_data['data']['reference'];
        $amount = $response_data['data']['amount'] / 100; // Convert amount to GHS (or the main currency)
        
        // Insert payment data into the database
        $payment_date = date('Y-m-d H:i:s');
        $insert_payment = "INSERT INTO payments (invoice_no, amount, payment_mode, ref_no, code, payment_date)
                           VALUES ('$transaction_ref', '$amount', 'Paystack', '$transaction_ref', 'N/A', '$payment_date')";
        $run_insert = mysqli_query($con, $insert_payment);

        if ($run_insert) {
            // Redirect user to success page
            header("Location: success.php");
        } else {
            // If payment details could not be saved
            echo "Error processing payment.";
        }
    } else {
        // If the transaction wasn't successful
        echo "Transaction failed. Please try again.";
    }
}
?>
