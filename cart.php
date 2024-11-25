<?php

    ob_start();
    include ('header.php');

?>

<?php
    include ('template/_temp.php');
 
      /*  include cart items if it is not empty */
      count($product->getData('cart')) ? include 'template/_cart-template.php' :  include 'template/notFound/_cart_notFound.php';
      /*  include cart items if it is not empty */

      /*  include top sale section */
      count($product->getData('wishlist')) ? include ('template/_wishilist_template.php') :  include ('template/notFound/_wishlist_notFound.php');
      /*  include top sale section */
      
    /*  include top sale section */
    include ('Template/_new-phones.php');
    /*  include top sale section */
?>

<?php

    include ('footer.php');

?>