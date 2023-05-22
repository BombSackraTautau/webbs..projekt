
<!--Validera betyder att kontrollera och säkerställa att data är korrekt och säker att använda.-->

<?php 
session_start(); // Startar session
include "db_conn.php"; // Inkluderar en fil för att ansluta till databasen

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) { // Kontrollera om användarnamn, lösenord, namn och bekräfta lösenord har skickats med i POST-förfrågan

    function validate($data){
       $data = trim($data);  // Ta bort onödig mellanslag från början och slutet av strängen
       $data = stripslashes($data);// Ta bort omvandlingar som görs med funktionen addslashes()
       $data = htmlspecialchars($data);// Omvandla specialtecken till HTML-entiteter
       return $data;// Returnera den validerade datan
    }

    $uname = validate($_POST['uname']);// Validera användarnamnet
    $pass = validate($_POST['password']);// Validera lösenordet

    $re_pass = validate($_POST['re_password']);// Validera bekräfta lösenordet
    $name = validate($_POST['name']);// Validera namnet

    $user_data = 'uname='. $uname. '&name='. $name; // Skapa en sträng med användarnamn och namn för att skicka med i URL:en


    if (empty($uname)) {
        header("Location: Signup.php?error=User Name is required&$user_data");// Vid tomma användarnamn, omdirigera tillbaka till registreringssidan med felmeddelande
        exit();// Avslutar skriptet
    }else if(empty($pass)){
        header("Location: Signup.php?error=Password is required&$user_data"); // Vid tomt lösenord, omdirigera tillbaka till registreringssidan med felmeddelande
        exit();// Avslutar skriptet
    }
    else if(empty($re_pass)){
        header("Location: Signup.php?error=Re Password is required&$user_data");// Vid tomt bekräfta lösenord, omdirigera tillbaka till registreringssidan med felmeddelande
        exit();// Avslutar skriptet
    }

    else if(empty($name)){
        header("Location: Signup.php?error=Name is required&$user_data");// Vid tomt namn, omdirigera tillbaka till registreringssidan med felmeddelande
        exit();// Avslutar skriptet
    }

    else if($pass !== $re_pass){
        header("Location: Signup.php?error=The confirmation password  does not match&$user_data"); // Vid lösenord som inte matchar, omdirigera tillbaka till registreringssidan med felmeddelande
        exit();// Avslutar skriptet
    }

    else{

        $pass = md5($pass);// Kryptera lösenordet med md5-algoritmen

        $sql = "SELECT * FROM users WHERE user_name='$uname' "; // SQL-fråga för att kontrollera om användarnamnet redan finns i databasen
        $result = mysqli_query($conn, $sql);// Utför SQL-frågan mot databasen

        if (mysqli_num_rows($result) > 0) {
            header("Location: Signup.php?error=The username is taken try another&$user_data");// Om användarnamnet redan finns, omdirigera tillbaka till registreringssidan med felmeddelande
            exit();// Avslutar skriptet
        }else {
           $sql2 = "INSERT INTO users(user_name, password, name) VALUES('$uname', '$pass', '$name')";// SQL-fråga för att lägga till användaren i databasen
           $result2 = mysqli_query($conn, $sql2);// Utför SQL-frågan mot databasen
           if ($result2) {
             header("Location: Signup.php?success=Your account has been created successfully");// Om användaren har lagts till i databasen, omdirigera tillbaka till registreringssidan med framgångsmeddelande
             exit();// Avslutar skriptet
           }else {
                header("Location: Signup.php?error=unknown error occurred&$user_data");// Om det uppstår ett okänt fel, omdirigera tillbaka till registreringssidan med felmeddelande
                exit();// Avslutar skriptet
           }
        }
    }
    
}else{
    header("Location: Signup.php");// Om POST-förfrågan inte innehåller alla nödvändiga fält, omdirigera tillbaka till registreringssidan
    exit();// Avslutar skriptet
}