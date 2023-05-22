<?php
    include('headermain.php');
?>
<!-- Inkluderar 'headermain.php'-filen i den här filen. -->
    <form action="Login.php" method="post">
         <h2>LOGIN</h2>
         <!-- Rubrik för inloggningsdelen. -->
         <?php if (isset($_GET['error'])) { ?>
             <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>
              <!-- Om det finns en 'error'-parameter i URL:en, visas ett felmeddelande på sidan. -->
         <label>User Name:</label>
              <!-- Etikett för användarnamnsfältet. -->
         <input type="text" name="uname" placeholder="User Name"><br>
     <!-- Textfält för användarnamnet med plats för användaren att skriva in sitt användarnamn. -->
         <label>Password:</label>
              <!-- Etikett för lösenordsfältet. -->
         <input type="password" name="password" placeholder="Password"><br>
     <!-- Textfält för lösenordet med plats för användaren att skriva in sitt lösenord. -->
         <button type="submit">Login</button>
              <!-- En knapp för att skicka inloggningsuppgifterna. -->
         <br>
     </form>

</body>
</html>