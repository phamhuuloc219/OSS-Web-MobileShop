<?php

session_start();

if (empty($_SESSION["mail_success"])) $_SESSION["mail_success"] = false;
if (empty($_SESSION["mail_error"])) $_SESSION["mail_error"] = false;

$success = $_SESSION["mail_success"];
$error = $_SESSION["mail_error"];

?>
  <link rel="stylesheet" href="css/dist/contact.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<?php
ob_start();
    include 'header.php';
?>
<?php

include "template/_contact.php";

?>
<?php
    include 'footer.php';
?>