<?php
ob_start();
    include 'header.php';
?>

<?php
    
    /*  include banner area  */
    include ('Template/_banner-area.php');
    /*  include banner area  */

    /*  include top sale section */
    include ('Template/_top-sale.php');
    /*  include top sale section */

    /*  include banner ads  */
    include ('Template/_banner-ads.php');
    /*  include banner ads  */

    /*  include blog area  */
    include ('Template/_blogs.php');
    /*  include blog area  */

?>

<?php
    include 'footer.php';
?>