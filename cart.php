<?php
ob_start();
session_start();

// include header.php file
include ('header.php');
include './database/DBController.php';

?>

<?php

    /*  include cart items if it is not empty */
        count($product->getData('cart')) ? include ('Template/_cart-template.php') :  include ('Template/notFound/_cart_notFound.php');
    /*  include cart items if it is not empty */
         include('./message.php');


?>

<?php
// include footer.php file
include ('footer.php');
?>


