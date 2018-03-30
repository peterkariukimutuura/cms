<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
$url='http://localhost/courtcasesystem/login/';
$_SESSION['errormessage']="Kindly login To Proceed!";
header('location:'.$url);
?>
