<?php
$aMan = array();
$aPCat = array();
$aCat = array();

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
    foreach($_REQUEST['man'] as $sKey=>$sVal){
        if((int)$sVal!=0){
            $aMan[(int)$sVal] = (int)$sVal;
        }
    }
}

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
        if((int)$sVal!=0){
            $aPCat[(int)$sVal] = (int)$sVal;
        }
    }
}

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
    foreach($_REQUEST['cat'] as $sKey=>$sVal){
        if((int)$sVal!=0){
            $aCat[(int)$sVal] = (int)$sVal;
        }
    }
}
?>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Manufacturers<div class="pull-right"><a href="#" style="color:black;"><span class="nav-toggle hide-show">Hide</span></a></div></h3>
    </div>
    <div class="panel-collapse collapse-data">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturer" placeholder="Filter Manufacturers">
                <a class="input-group-addon"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
                <?php
                    $get_manfacturer = "select * from manufacturers where manufacturer_top='yes'";
                    $run_manfacturer = mysqli_query($con,$get_manfacturer);
                    while($row_manfacturer = mysqli_fetch_array($run_manfacturer)){
                        $manufacturer_id = $row_manfacturer['manufacturer_id'];
                        $manufacturer_title = $row_manfacturer['manufacturer_title'];
                        $manufacturer_image = $row_manfacturer['manufacturer_image'];
                        if($manufacturer_image != ""){
                            $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";
                        }
                        echo "<li style='background:#dddddd;' class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input " . (isset($aMan[$manufacturer_id]) ? "checked='checked'" : "") . " type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
                                    <span>$manufacturer_image $manufacturer_title</span>
                                </label>
                            </a>
                        </li>";
                    }
                    $get_manfacturer = "select * from manufacturers where manufacturer_top='no'";
                    $run_manfacturer = mysqli_query($con,$get_manfacturer);
                    while($row_manfacturer = mysqli_fetch_array($run_manfacturer)){
                        $manufacturer_id = $row_manfacturer['manufacturer_id'];
                        $manufacturer_title = $row_manfacturer['manufacturer_title'];
                        $manufacturer_image = $row_manfacturer['manufacturer_image'];
                        if($manufacturer_image != ""){
                            $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";
                        }
                        echo "<li class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input " . (isset($aMan[$manufacturer_id]) ? "checked='checked'" : "") . " type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
                                    <span>$manufacturer_image $manufacturer_title</span>
                                </label>
                            </a>
                        </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Products Categories<div class="pull-right"><a href="#" style="color:black;"><span class="nav-toggle hide-show">Hide</span></a></div></h3>
    </div>
    <div class="panel-collapse collapse-data">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">
                <a class="input-group-addon"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
                <?php
                    $get_p_cats = "select * from product_categories where p_cat_top='yes'";
                    $run_p_cats = mysqli_query($con,$get_p_cats);
                    while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        $p_cat_title = $row_p_cats['p_cat_title'];
                        $p_cat_image = $row_p_cats['p_cat_image'];
                        if($p_cat_image != ""){
                            $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20'> &nbsp;";
                        }
                        echo "<li class='checkbox checkbox-primary' style='background:#dddddd;'>
                            <a>
                                <label>
                                    <input " . (isset($aPCat[$p_cat_id]) ? "checked='checked'" : "") . " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat'>
                                    <span>$p_cat_image $p_cat_title</span>
                                </label>
                            </a>
                        </li>";
                    }
                    $get_p_cats = "select * from product_categories where p_cat_top='no'";
                    $run_p_cats = mysqli_query($con,$get_p_cats);
                    while($row_p_cats = mysqli_fetch_array($run_p_cats)){
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        $p_cat_title = $row_p_cats['p_cat_title'];
                        $p_cat_image = $row_p_cats['p_cat_image'];
                        if($p_cat_image != ""){
                            $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20'> &nbsp;";
                        }
                        echo "<li class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input " . (isset($aPCat[$p_cat_id]) ? "checked='checked'" : "") . " type='checkbox' value='$p_cat_id' name='p_cat' class='get_p_cat'>
                                    <span>$p_cat_image $p_cat_title</span>
                                </label>
                            </a>
                        </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">Categories<div class="pull-right"><a href="#" style="color:black;"><span class="nav-toggle hide-show">Hide</span></a></div></h3>
    </div>
    <div class="panel-collapse collapse-data">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">
                <a class="input-group-addon"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-cats">
                <?php
                    $get_cat = "select * from categories where cat_top='yes'";
                    $run_cat = mysqli_query($con,$get_cat);
                    while($row_cat = mysqli_fetch_array($run_cat)){
                        $cat_id = $row_cat['cat_id'];
                        $cat_title = $row_cat['cat_title'];
                        $cat_image = $row_cat['cat_image'];
                        if($cat_image != ""){
                            $cat_image = "<img src='admin_area/other_images/$cat_image' width='20'>&nbsp;";
                        }
                        echo "<li class='checkbox checkbox-primary' style='background:#dddddd;'>
                            <a>
                                <label>
                                    <input " . (isset($aCat[$cat_id]) ? "checked='checked'" : "") . " type='checkbox' value='$cat_id' name='cat' class='get_cat'>
                                    <span>$cat_image $cat_title</span>
                                </label>
                            </a>
                        </li>";
                    }
                    $get_cat = "select * from categories where cat_top='no'";
                    $run_cat = mysqli_query($con,$get_cat);
                    while($row_cat = mysqli_fetch_array($run_cat)){
                        $cat_id = $row_cat['cat_id'];
                        $cat_title = $row_cat['cat_title'];
                        $cat_image = $row_cat['cat_image'];
                        if($cat_image != ""){
                            $cat_image = "<img src='admin_area/other_images/$cat_image' width='20'>&nbsp;";
                        }
                        echo "<li class='checkbox checkbox-primary'>
                            <a>
                                <label>
                                    <input " . (isset($aCat[$cat_id]) ? "checked='checked'" : "") . " type='checkbox' value='$cat_id' name='cat' class='get_cat'>
                                    <span>$cat_image $cat_title</span>
                                </label>
                            </a>
                        </li>";
                    }
                ?>
            </ul>
        </div>
    </div>
</div>