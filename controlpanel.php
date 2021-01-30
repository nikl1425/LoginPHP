<?php
session_start();
if(!isset($_SESSION['ausername'])){
  echo '<script>alert("Denne side er for admins!"); window.location.href = "login.php";</script>';
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" type="" href="controlStyle.css">
    <meta charset="utf-8">
    <title>Admin kontrolpanel</title>
  </head>
  <body>

    <header id="adminpanelheader">
      <h3>Velkommen til kontrolpanelet: <?php echo $_SESSION['ausername']; ?></h3>
    </header>


    <div class="adminpaneldiv">

  <div class="submit">
    <form action="index.php">
      <button type="submit" name="button">Blogs</button>
    </form>
  </div>
  <div class="logout">
    <form action="logout.php">
      <button type="submit" name="button">Log ud</button>
    </form>
  </div>

      </div>
  </body>
</html>
