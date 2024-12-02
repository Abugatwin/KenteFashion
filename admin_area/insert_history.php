<?php

if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert history
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Insert history
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label"> History Title :</label>
                        <div class="col-md-6">
                            <input type="text" name="history_title" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> History Image :</label>
                        <div class="col-md-6">
                            <input type="file" name="history_image" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> History Description :</label>
                        <div class="col-md-6">
                            <textarea name="history_desc" class="form-control" rows="10" cols="19" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> History Button :</label>
                        <div class="col-md-6">
                            <input type="text" name="history_button" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> History URL :</label>
                        <div class="col-md-6">
                            <input type="url" name="history_url" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" value="Insert History" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {

    $history_title = mysqli_real_escape_string($con, $_POST['history_title']);
    $history_desc = mysqli_real_escape_string($con, $_POST['history_desc']);
    $history_button = mysqli_real_escape_string($con, $_POST['history_button']);
    $history_url = mysqli_real_escape_string($con, $_POST['history_url']);
    $history_image = $_FILES['history_image']['name'];
    $tmp_image = $_FILES['history_image']['tmp_name'];

    $sel_history = "SELECT * FROM history";
    $run_history = mysqli_query($con, $sel_history);
    $count = mysqli_num_rows($run_history);

    if ($count == 3) {
        echo "<script>alert('You Have already Inserted 3 history columns')</script>";
    } else {
        if (!empty($history_image) && move_uploaded_file($tmp_image, "admin_area/history_images/$history_image")) {
            $insert_history = "INSERT INTO history (history_title, history_image, history_desc, history_button, history_url)
                               VALUES ('$history_title', '$history_image', '$history_desc', '$history_button', '$history_url')";

            if (mysqli_query($con, $insert_history)) {
                echo "<script>alert('New History Column Has Been Inserted')</script>";
                echo "<script>window.open('index.php?view_history', '_self')</script>";
            } else {
                die("Database insertion failed: " . mysqli_error($con));
            }
        } else {
            echo "<script>alert('Image upload failed. Please try again.')</script>";
        }
    }
}

?>

<?php } ?>
