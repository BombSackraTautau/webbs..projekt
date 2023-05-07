<?php 
session_start(); 
session_unset();
unset($_SESSION['name']);
unset($_SESSION['user_name']);
session_destroy();
header("Location: Loginsida.php");
?>
