<?php
ob_start();
session_start();

// include header.php file
include ('header.php');
include './database/DBController.php';

?>

<?php

    /*  include products */
    include ('Template/_products.php');
    /*  include products */

    /*  include top sale section */
    include ('Template/_top-sale.php');
    /*  include top sale section */

?>

<?php
// include footer.php file
include ('footer.php');
?>

