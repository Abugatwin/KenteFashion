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
      <span class="nero__bold">Kente </span> Knowledge
    </div>
    <p class="nero__text"></p>
  </div>
</main>

<div id="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="history row">

        <?php
        $get_history = "SELECT * FROM history";
        $run_history = mysqli_query($con, $get_history);

        while ($row_history = mysqli_fetch_array($run_history)) {
            $history_id = $row_history['history_id'];
            $history_title = htmlspecialchars($row_history['history_title']);
            $history_image = htmlspecialchars($row_history['history_image']);
            $history_desc = htmlspecialchars($row_history['history_desc']);
            $history_button = htmlspecialchars($row_history['history_button']);
            $history_url = htmlspecialchars($row_history['history_url']);
        ?>

        <div class="col-md-4 col-sm-6 box">
          <img src="admin_area/history_images/<?php echo $history_image; ?>" class="img-responsive" alt="History Image">
          <h2 align="center"><?php echo $history_title; ?></h2>
          <p><?php echo $history_desc; ?></p>
          <center>
            <a href="<?php echo $history_url; ?>" class="btn btn-primary"><?php echo $history_button; ?></a>
          </center>
        </div>

        <?php } ?>

      </div>
    </div>
  </div>
</div>

<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
