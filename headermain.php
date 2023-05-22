<?php //Öppnar en PHP-tag för att börja PHP-koden.
        if (session_status() == PHP_SESSION_NONE) //Kontrollerar om sessionsstatusen är PHP_SESSION_NONE, vilket indikerar att ingen session har startats ännu. 
        {
        session_start();
        } //Startar en sessionsom sessionen inte redan har startats.

        
        if(isset($_SESSION['name'])) //Kontrollerar om sessionenvariabeln 'name' är satt, vilket indikerar att användaren är inloggad.
        {
            echo '<h1>Hello, ' . $_SESSION['name'] . '</h1>'; //Skriver ut en hälsning med användarnamnet som lagrats i sessionen.
        }
        
        


        if(isset($_SESSION['username'])) //Kontrollerar om sessionenvariabeln 'username' är satt, vilket indikerar att användaren är inloggad.
        {
            echo '<style type="text/css">#signup, #login{display:none;}</style>'; // Skriver ut CSS-koden för att dölja elementen med id "signup" och "login".
        }
        else //Om användaren inte är inloggad.
        {
            echo '<style type="text/css">#logout, #hellouser{display:none;}</style>'; // Skriver ut CSS-koden för att dölja elementen med id "logout" och "hellouser".
        }
    ?>

<!DOCTYPE html> //Anger dokumenttypen som HTML.
<html> //Början av HTML-dokumentet.
<head> //Början av dokumentets huvudsektion.
    <title>Extreme Relaxation</title> //Anger titeln på webbsidan.
    <meta charset="UTF-8"> //Anger teckenkodningen för dokumentet.
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> // Anger viewport-inställningar för responsiv design.
    <link rel="stylesheet" type="text/css" href="föralla.css"> //Länkar till en CSS-stilmall för att formatera webbsidan.
</head>
<body> //Början av dokumentets kroppssektion.

    <header> //36-61: Detta är sidhuvudet för webbplatsen.
        Det innehåller ett logo-element med en länk till index.php-sidan.
        Det finns också en navigationsmeny med tre länkar: "Home", "Shop" och "Social Medias".
        Beroende på om sessionen innehåller en variabel med namnet 'name', visas antingen länkarna "Login" och "Sign Up" eller länken "Logout".
        
        <div class="header-container"> //Skapar en behållare för huvudsektionen.
            <div class="logo"> //Skapar en behållare för logotypen.
                <a href="index.php"><img src="img/loga.png" alt="Extreme Relaxation Logo"></a> //Skapar en länk med en bildlogotyp.
            </div>
            <div class="nav">//Skapar en behållare för navigationsmenyn.
            <ul>//Skapar en ordnad lista för navigationslänkar.
    <li><a href="index.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="socialmedias.php">Social Medias</a></li>
    <?php
    if(!isset($_SESSION['name'])) {
        echo '<li><a href="Loginsida.php">Login</a></li>';
        echo '<li><a href="Signup.php">Sign Up</a></li>';
    }
    ?>
    <?php
    if(isset($_SESSION['name'])) {
        echo '<li><a href="Logout.php">Logout</a></li>';
    }
    ?>
</ul>

            </div>
        </div>
    </header>

</body>
</html>
