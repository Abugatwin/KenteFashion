<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
    exit;
}

if(isset($_GET['edit_history'])){
    $edit_id = $_GET['edit_history'];
    $get_history = "SELECT * FROM history WHERE history_id='$edit_id'";
    $run_history = mysqli_query($con, $get_history);
    $row_history = mysqli_fetch_array($run_history);
    $history_id = $row_history['history_id'];
    $history_title = $row_history['history_title'];
    $history_image = $row_history['history_image'];
    $history_desc = $row_history['history_desc'];
    $history_button = $row_history['history_button'];
    $history_url = $row_history['history_url'];
    $new_s_image = $row_history['history_image'];
}

if(isset($_POST['update'])){
    $history_title = $_POST['history_title'];
    $history_desc = $_POST['history_desc'];
    $history_button = $_POST['history_button'];
    $history_url = $_POST['history_url'];
    $history_image = $_FILES['history_image']['name'];
    $tmp_image = $_FILES['history_image']['tmp_name'];

    if(empty($history_image)){
        $history_image = $new_s_image;
    } else {
        move_uploaded_file($tmp_image, "history_images/$history_image");
    }

    $update_history = "UPDATE history SET history_title='$history_title', history_image='$history_image', history_desc='$history_desc', history_button='$history_button', history_url='$history_url' WHERE history_id='$history_id'";
    $run_history = mysqli_query($con, $update_history);

    if($run_history){
        echo "<script>alert('One History Column Has Been Updated')</script>";
        echo "<script>window.open('index.php?view_history','_self')</script>";
    }
}
?>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Edit History
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Edit History
                </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">History Title</label>
                        <div class="col-md-6">
                            <input type="text" name="history_title" class="form-control" value="<?php echo $history_title; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">History Image</label>
                        <div class="col-md-6">
                            <input type="file" name="history_image" class="form-control">
                            <br>
                            <img src="history_images/<?php echo $history_image; ?>" width="70" height="70">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">History Description</label>
                        <div class="col-md-6">
                            <textarea name="history_desc" class="form-control" rows="10" cols="19"><?php echo $history_desc; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">History Button</label>
                        <div class="col-md-6">
                            <input type="text" name="history_button" class="form-control" value="<?php echo $history_button; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">History URL</label>
                        <div class="col-md-6">
                            <input type="url" name="history_url" class="form-control" value="<?php echo $history_url; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <input type="submit" name="update" value="Update History" class="btn btn-primary form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
