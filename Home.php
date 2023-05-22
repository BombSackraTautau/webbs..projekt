<?php 
session_start(); // Startar en session.


if(isset($_SESSION['name'])) { // Om sessionen med namnet 'name' finns, fortsätt koden nedan.


}else{
     header("Location: Loginsida.php"); // Skickar användaren till Loginsida.php.
     exit();// Avslutar scriptet för att förhindra att resten av koden exekveras.
}

include('headermain.php');// Inkluderar filen headermain.php i den aktuella filen.
 ?>