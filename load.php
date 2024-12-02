<?php
session_start();

include("includes/db.php");
include("functions/functions.php");  // Ensure this is included so all functions from functions.php are accessible

switch ($_REQUEST['sAction']) {

    // Default case: fetching the products
    default:
        getProducts();  // Call the getProducts function
        break;

    // Get paginator case
    case 'getPaginator':
        getPaginator();  // Call the getPaginator function
        break;
}
?>
