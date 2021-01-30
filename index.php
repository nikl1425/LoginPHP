<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['ausername'])){
  echo '<script>alert("You have to login to view this page."); window.location.href = "login.php";</script>';
}
// session_start();
// echo $_SESSION['username'];

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="" href="indexStyle.css">
    <title>Blog</title>
  </head>
  <body>
    <!-- STOP REFRESH -->
      <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }</script>
    <!-- STOP REFRESH -->
    <header>
      <h3>Velkommen til bloggen <?php echo $_SESSION['username'];  echo $_SESSION['ausername'];?></h3>
    </header>
<div class="content">
  <div class="indlæg">
    <div class="indlæg-content">
      <div class="indlæg-tekst">
        <h2>Lav dit eget blogindlæg herunder!</h2>
      </div>
      <br>
      <form action="./Blogs/putBlogs.php" method="POST">
       <input id="titel" type="text" name="title" placeholder="Skriv din titel her">
      <textarea id="textarea" rows="10" cols="80" name="content" placeholder="Skriv dit indlæg (Maks. 550 tegn)" maxlength="550" style="resize: none"></textarea>
        <input id="opret" type="submit" name="Send" value="Opret blogindlæg">
      </form>
    </div>
  </div>


    <?php
echo '<div class="liste">';
echo '<ul>';
// set the path to the directory...
$dirname = "Blogs/";
// Array of all text files in blog folder
$files = glob($dirname."*.txt");


foreach($files as $key => $file) {
  //Åbner tekst filen og læser.. Læs linje 2 og "gem" den
  $f = fopen($file, 'r');
  $line = file($file)[1];
  $DELETE = $key;
  $EDIT = $key;
  $UPDATE = $key;
  fclose($f);
  echo '<br>';
  //////////////////////////////////
  //Begynd skrivning af blogindlæg//
  /////////////////////////////////
  echo '<li>';
  //Hent al text i txt-filen
  $readBlogs = file_get_contents($file);


  //POST AF INDLÆG////////////
  //Linje for linje, paste hvad som står i blog txt dok.
  echo '<div class="blogtekst">';
    print_r(nl2br($readBlogs));
  echo '</div>';
  ///////////////////////////

  //Hvis du er admin eller username = username i txt fil
  if($_SESSION['ausername'] || trim($line) === $_SESSION['username']){
    echo '<br>';
    echo '<br>';
    print_r (
    '<form name = "form1" action="" method="post">
    <input type="submit" id="rediger" name="' . $EDIT . '" value="Rediger indlæg">
    <input type="submit" id="slet" name="' . $DELETE . '" value="Slet indlæg">
    ');
    echo '<br>';
    echo '<br>';
  }

  //Edit blog
  if (isset($_POST[$EDIT]) && $_POST[$EDIT] == 'Rediger indlæg') {
    $readFile = fopen($files[$EDIT], 'a+');
    //Automatiser??
    $readTitle = file($files[$EDIT])[2];
    $readLine1 = file($files[$EDIT])[3];
    $readLine2 = file($files[$EDIT])[4];
    $readLine3 = file($files[$EDIT])[5];
    $readLine4 = file($files[$EDIT])[6];
    $readLine5 = file($files[$EDIT])[7];
    $readLine6 = file($files[$EDIT])[8];
    $readLine7 = file($files[$EDIT])[9];
    $readLine8 = file($files[$EDIT])[10];
    $readLine9 = file($files[$EDIT])[11];
    $readLine10 = file($files[$EDIT])[12];
    $readLine11 = file($files[$EDIT])[13];
    $readLine12 = file($files[$EDIT])[14];

    //Lav en update og cancel knap
    print_r (
    '<action="" method="post">
    <br>
   <input type="text" id ="title" name="title" placeholder=" '.$readTitle.' "> </input>
    <br>
    <textarea id="title2" rows="10" cols="80" name="updateBlog" maxlength="550" style="resize: none">'.$readLine1.$readLine2.$readLine3.$readLine4.$readLine5.$readLine6.$readLine7.$readLine8.$readLine9.$readLine10.$readLine11.$readLine12.'</textarea>
    <br>
    <input type="submit" id="rediger" name="' . $UPDATE .  '" value="Opdater indlæg">
    <input type="submit" id="rediger" name="cancel" value="Annuller">
    ');
  }

  //Delete blog
  if (isset($_POST[$DELETE]) && $_POST[$DELETE] == 'Slet indlæg') {
    unlink($files[$DELETE]);
    echo '<script>alert("Dit indlæg er nu slettet!"); window.location.href = "index.php";</script>';
}
  //Update blog
  if (isset($_POST[$UPDATE]) && $_POST[$UPDATE] == 'Opdater indlæg') {
    file_put_contents($files[$UPDATE], 'Dato for upload:' . date("G:i:s - d/m/y").PHP_EOL . $_SESSION['username'].PHP_EOL . 'Titel: ' . $_POST["title"].PHP_EOL . $_POST['updateBlog']);
    echo '<script>alert("Dit indlæg er nu opdateret!"); window.location.href = "index.php";</script>';
  }
  //Cancel update
  if (isset($_POST['cancel'])) {
    echo '<script>alert("Dit indlæg er ikke opdateret!"); window.location.href = "index.php";</script>';
}

echo '</form>';

}
  /////////////////////////////////
  //Slut skrivning af blogindlæg//
  ////////////////////////////////
  echo '</li>';

echo '</div>';
echo '</ul>';
echo '<br>';

?>

<footer>
  <!-- Log ud -->
  <form action="logout.php">
    <button type="submit" id="logud" name="button">Logout</button>
  </form>
  </footer>
  </div>
  </body>
</html>
