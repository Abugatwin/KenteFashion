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
            <span class="nero__bold">shop</span> AT KENTEFASHION
        </div>
        <p class="nero__text"></p>
    </div>
</main>

<div id="content">
    <div class="container">
        <div class="col-md-12"></div>

        <div class="col-md-3">
            <?php include("includes/sidebar.php"); ?>
        </div>

        <div class="col-md-9">
            <div id="Products">
                <?php getProducts(); ?>
            </div>
            <center>
                <ul class="pagination">
                    <?php getPaginator(); ?>
                </ul>
            </center>
        </div>

        <div id="wait"></div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
    function getProducts() {
        var sPath = '';

        // Manufacturers
        var manufacturers = $('.get_manufacturer:checked');
        manufacturers.each(function () {
            sPath += 'man[]=' + $(this).val() + '&';
        });

        // Product Categories
        var productCategories = $('.get_p_cat:checked');
        productCategories.each(function () {
            sPath += 'p_cat[]=' + $(this).val() + '&';
        });

        // Categories
        var categories = $('.get_cat:checked');
        categories.each(function () {
            sPath += 'cat[]=' + $(this).val() + '&';
        });

        $('#wait').html('<img src="images/load.gif">');

        if (sPath !== '') {
            $.ajax({
                url: "load.php",
                method: "POST",
                data: sPath + 'sAction=getProducts',
                success: function (data) {
                    $('#Products').html(data);
                    $('#wait').empty();
                }
            });

            $.ajax({
                url: "load.php",
                method: "POST",
                data: sPath + 'sAction=getPaginator',
                success: function (data) {
                    $('.pagination').html(data);
                }
            });
        }
    }

    $('.get_manufacturer, .get_p_cat, .get_cat').click(function () {
        getProducts();
    });
});
</script>
</body>
</html>
