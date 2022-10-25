<?php
session_start();
$_SESSION['user']=array();
header("location:../loginPrev.php");
session_destroy();
?>