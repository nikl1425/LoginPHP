<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="" href="style.css">
    <meta charset="utf-8">
    <title>Log ind</title>
  </head>

  <header>
  <h3>Miniprojekt - blog</p>
  <p>Af: Jesper, Niklas og Jacob.
  </header>


  <body>



      <div class="main-content">
        <div class="main1">
          <h1>LOG IND</h1>
          <form id ="fsubmit" action="log.php" method="POST">
            <h2>Brugernavn:</h2><input name="username" type="text" id="username" placeholder="Brugernavn"><br>
            <h2>Adgangskode:</h2><input name="password" type="password" id="password" placeholder="Adgangskode"><br>
          <div class="submitinputs">
            <input id="loginid" type="submit" value ="log ind">
             <button type="button"><a href="createuser.php" style="text-decoration: none;">Opret bruger</a></button>
                 </div>
          </form>
        </div>



        <div class="main2">
          <div class="adminlogin">
                  <h1>ADMIN LOG IND</h1>
                  <form id ="fsubmit" action="adminlogin.php" method="POST">
                    <h2>Brugernavn:</h2><input name="ausername" type="text" id="ausername" placeholder="Brugernavn"><br>
                    <h2>Adgangskode:</h2><input name="apassword" type="password" id="apassword" placeholder="Adgangskode"><br>
                    <input type="submit" value ="Log ind">
                  </form>
                </div>
        </div>
      </div>



    <div class="footer">
      <div class="footer-text">
        <div class="footer-items">
          <p></p>
        </div>
      </div>
    </div>
  </body>
</html>

<?php
echo $_SESSION['username'];
?>
<!--  -->
