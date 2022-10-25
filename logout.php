<?php
session_start();
$_SESSION['user']=array();
header("location:login.php");
session_destroy();
?>