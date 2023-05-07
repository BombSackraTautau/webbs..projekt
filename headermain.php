<?php
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }

        
        if(isset($_SESSION['name'])) {
            echo '<h1>Hello, ' . $_SESSION['name'] . '</h1>';
        }
        
        


        if(isset($_SESSION['username'])){
            echo '<style type="text/css">#signup, #login{display:none;}</style>';
        }
        else{
            echo '<style type="text/css">#logout, #hellouser{display:none;}</style>';
        }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Extreme Relaxation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="föralla.css">
</head>
<body>

    <header>
        <div class="header-container">
            <div class="logo">
                <a href="index.php"><img src="img/loga.png" alt="Extreme Relaxation Logo"></a>
            </div>
            <div class="nav">
            <ul>
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
