<?php

    ob_start();
    include ('header.php');

?>

<?php

 
      /*  include cart items if it is not empty */
      count($product->getData('cart')) ? include ('template/_cart-template.php') :  include ('template/notFound/_cart_notFound.php');
      /*  include cart items if it is not empty */

?>

<?php

    include ('footer.php');

?>