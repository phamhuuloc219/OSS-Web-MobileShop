<?php
ob_start();
    include 'header.php';
?>

<?php
    
    /*  include banner area  */
    include ('template/_banner-area.php');
    /*  include banner area  */

    /*  include top sale section */
    include ('template/_top-sale.php');
    /*  include top sale section */

    /*  include special price section  */
    include ('template/_special-price.php');
    /*  include special price section  */

    /*  include banner ads  */
    include ('template/_banner-ads.php');
    /*  include banner ads  */

    /*  include blog area  */
    include ('template/_blogs.php');
    /*  include blog area  */

?>

<?php
    include 'footer.php';
?>