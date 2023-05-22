<!--Validera betyder att kontrollera och säkerställa att data är korrekt och säker att använda.-->
<?php
session_start(); // Startar en session.
include "db_conn.php"; // Inkluderar en fil med en databasanslutning.

if (isset($_POST['uname']) && isset($_POST['password'])) { // Inkluderar en fil med en databasanslutning.

    function validate($data){// Funktion för att rensa och validera användardata.
       $data = trim($data);// Tar bort onödiga mellanslag i början och slutet av strängen.
       $data = stripslashes($data);// Tar bort eventuella escape-tecken (backslashes) från strängen.
       $data = htmlspecialchars($data);// Konverterar specialtecken till HTML-entiteter för att förhindra skadlig kodinjektion.
       return $data; //Returnerar den validerade datan.
    }

    $uname = validate($_POST['uname']); // Validerar användarnamnet.
    $pass = validate($_POST['password']); // Validerar lösenordet.

    if (empty($uname)) { // Kontrollerar om användarnamnet är tomt.
        header("Location: Loginsida.php?error=User Name is required"); // Skickar tillbaka till loginsidan med ett felmeddelande.
        exit();// Avslutar skriptet.
    }else if(empty($pass)){// Kontrollerar om lösenordet är tomt.
        header("Location: Loginsida.php?error=Password is required"); // Skickar tillbaka till loginsidan med ett felmeddelande.
        exit();// Avslutar skriptet.
    }else{
        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'"; // Skapar en SQL-fråga för att hämta användardata från databasen.

        $result = mysqli_query($conn, $sql);// Utför SQL-frågan mot databasen.

        if (mysqli_num_rows($result) === 1) {// Kontrollerar om det finns exakt en rad i resultatet.
            $row = mysqli_fetch_assoc($result);// Hämtar data från den första raden i resultatet och lagrar det i en associativ array.
            if ($row['user_name'] === $uname && $row['password'] === $pass) {// Kontrollerar om användarnamn och lösenord stämmer överens.
                $_SESSION['user_name'] = $row['user_name'];// Sätter sessionsvariabeln 'user_name' till användarnamnet.
                $_SESSION['name'] = $row['name'];// Sätter sessionsvariabeln 'name' till användarens namn.
                $_SESSION['id'] = $row['id'];// Sätter sessionsvariabeln 'id' till användarens ID.
                header("Location: Home.php");// Skickar vidare till Home.php.
                exit();// Avslutar skriptet.
            }else{
                header("Location: Loginsida.php?error=Incorect User name or password");// Skickar tillbaka till loginsidan med ett felmeddelande.
                exit();// Avslutar skriptet.
            }
        }else{
            header("Location: Loginsida.php?error=Incorect User name or password");// Skickar tillbaka till loginsidan med ett felmeddelande.
            exit();// Avslutar skriptet.
        }
    }

}else{
    header("Location: Loginsida.php");// Skickar tillbaka till loginsidan.
    exit();// Avslutar skriptet.
}
?>
