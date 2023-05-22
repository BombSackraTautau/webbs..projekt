<?php 
session_start(); // Startar sessionen.
session_unset(); // Tömmer alla värden från sessionsvariablerna.
unset($_SESSION['name']);// Tar bort värdet för sessionsvariabeln 'name'.
unset($_SESSION['user_name']); // Tar bort värdet för sessionsvariabeln 'user_name'.
session_destroy();// Avslutar och raderar sessionen samt alla dess variabler.
header("Location: Loginsida.php");// Omdirigerar användaren till sidan "Loginsida.php".
?>
