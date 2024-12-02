<?php
// Check if admin is logged in
if(!isset($_SESSION['admin_email'])){
   echo "<script>window.open('login.php','_self')</script>";
} else {
?>

<div class="panel panel-default">
   <!-- Panel Header -->
   <div class="panel-heading">
       <h3 class="panel-title">View History</h3>
   </div>

   <!-- Panel Body -->
   <div class="panel-body">
       <?php
       // Get all history items from database
       $get_history = "select * from history";
       $run_history = mysqli_query($con,$get_history);

       while($row_history = mysqli_fetch_array($run_history)){
           // Get history details
           $history_id = $row_history['history_id'];
           $history_title = $row_history['history_title'];
           $history_image = $row_history['history_image'];
           $history_desc = substr($row_history['history_desc'],0,400); // Limit description to 400 chars
           $history_button = $row_history['history_button'];
           $history_url = $row_history['history_url'];
           ?>

           <!-- History Item Card -->
           <div class="col-lg-4 col-md-4">
               <div class="panel panel-primary">
                   <!-- Card Header -->
                   <div class="panel-heading">
                       <h3 class="panel-title text-center">
                           <?php echo $history_title; ?>
                       </h3>
                   </div>

                   <!-- Card Body -->
                   <div class="panel-body">
                       <img src="history_images/<?php echo $history_image; ?>" 
                            class="img-responsive">
                       <br>
                       <p><?php echo $history_desc; ?></p>
                   </div>

                   <!-- Card Footer -->
                   <div class="panel-footer">
                       <a href="index.php?delete_history=<?php echo $history_id; ?>" 
                          class="pull-left">
                           <i class="fa fa-trash-o"></i> Delete
                       </a>
                       <a href="index.php?edit_history=<?php echo $history_id; ?>" 
                          class="pull-right">
                           <i class="fa fa-pencil"></i> Edit
                       </a>
                       <div class="clearfix"></div>
                   </div>
               </div>
           </div>

       <?php } ?>
   </div>
</div>

<?php } ?>