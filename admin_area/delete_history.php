<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php', '_self')</script>";
    exit();
}

if (isset($_GET['delete_history'])) {
    $delete_id = $_GET['delete_history'];

    $delete_history_query = "DELETE FROM history WHERE history_id='$delete_id'";
    $run_delete = mysqli_query($con, $delete_history_query);

    if ($run_delete) {
        echo "<script>alert('One history record has been deleted')</script>";
        echo "<script>window.open('index.php?view_history', '_self')</script>";
        exit();
    }
}
?>
