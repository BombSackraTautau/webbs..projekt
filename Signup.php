<?php
    include('headermain.php')
?>
<!-- Inkluderar filen 'headermain.php' -->
<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title><!--Titeln på webbsidan är "SIGN UP".-->
    <link rel="stylesheet" href="föralla.css"><!-- // Länkar till en CSS-fil som heter 'föralla.css'.-->
</head>
<body>
     <form action="Sign.php" method="post"><!-- En formulär som skickar data till 'Sign.php' via HTTP POST-metoden.-->
         <h2>SIGN UP</h2><!--En rubrik som visar "SIGN UP".-->
         <?php if (isset($_GET['error'])) { ?> <!-- Om variabeln 'error' är satt i URL-parametrarna, visas en paragraf med värdet av 'error'.-->
             <p class="error"><?php echo $_GET['error']; ?></p>
         <?php } ?>

          <?php if (isset($_GET['success'])) { ?><!-- Om variabeln 'success' är satt i URL-parametrarna, visas en paragraf med värdet av 'success'.-->
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label> <!-- En etikett för att ange användarens namn.-->
          <?php if (isset($_GET['name'])) { ?><!-- Om variabeln 'name' är satt i URL-parametrarna, visas en inmatningsruta för namnet med värdet av 'name'.-->
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?><!-- Annars visas en tom inmatningsruta för namnet.-->
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>User Name:</label><!-- En etikett för att ange användarens användarnamn.-->
          <?php if (isset($_GET['uname'])) { ?><!-- Om variabeln 'uname' är satt i URL-parametrarna, visas en inmatningsruta för användarnamnet med värdet av 'uname'.-->
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?><!-- Annars visas en tom inmatningsruta för användarnamnet.-->
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>


         <label>Password:</label><!-- En etikett för att ange användarens lösenord.-->
         <input type="password" 
                 name="password" 
                 placeholder="Password"><br><!-- En inmatningsruta för lösenordet av typen "password".-->


          <label>Confirm Password:</label><!-- En etikett för att bekräfta användarens lösenord.-->
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br><!-- En inmatningsruta för att bekräfta lösenordet av typen "password".-->


         <button type="submit">Sign Up</button><!-- En knapp för att skicka formuläret.-->
          <a href="Logainsida.php" class="ca">Already have an account?</a><!-- En länk till Logainsida.php för användaren om hen redan har ett konto-->
     </form>
</body>
</html>