<?php
session_start();



if (isset($_POST[title]) && !empty($_POST[title]) && isset($_POST[content]) && !empty($_POST[content])) {
  $filename = $_POST["title"] . " - " . date("Y-m-d - H:m:s") . ".txt";
  file_put_contents($filename, 'Dato for upload:' . date("G:i:s - d/m/y").PHP_EOL . /*'User: ' .*/ $_SESSION['username'].PHP_EOL .'Titel: ' . $_POST["title"].PHP_EOL . $_POST["content"].PHP_EOL);
  echo '<script>alert("Dit indlæg er nu oprettet!"); window.location.href = "../index.php";</script>';
}
else if(isset($_POST[title]) && empty($_POST[title]) || isset($_POST[content]) && empty($_POST[content]) ){
  echo '<script>alert("failed to create"); window.location.href = "../index.php";</script>';
}



?>
