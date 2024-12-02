<?php
require '../includes/db.php';

$query = "SELECT * FROM payments ORDER BY payment_date DESC LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $payment = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center">Invoice</h2>
        <table class="table table-bordered">
            <tr>
                <th>Invoice No</th>
                <td><?php echo $payment['invoice_no']; ?></td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>GHS <?php echo number_format($payment['amount'], 2); ?></td>
            </tr>
            <tr>
                <th>Payment Mode</th>
                <td><?php echo $payment['payment_mode']; ?></td>
            </tr>
            <tr>
                <th>Reference No</th>
                <td><?php echo $payment['ref_no']; ?></td>
            </tr>
            <tr>
                <th>Payment Date</th>
                <td><?php echo $payment['payment_date']; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php
} else {
    echo "No payment records found.";
}
?>
