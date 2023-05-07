<?php 
session_start();

if(isset($_SESSION['name'])) {


}else{
     header("Location: Loginsida.php");
     exit();
}

include('headermain.php');
 ?>