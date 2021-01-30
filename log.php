<?php
session_start();
$myfile = "accounts.txt";
$contents = file_get_contents($myfile);
$contents = explode("\n", $contents);


foreach($contents as $values){
     $loginInfo = explode(":", $values);
        $user = $loginInfo[0];
        $password = $loginInfo[1];
        if($user == $_POST['username'] && $password == $_POST['password'] && $user != $_POST[null] && $password != $_POST[null]){

            $_SESSION['username'] = $user;
            header("Location:index.php");
          }
}

if ($user != $_POST['username'] || $password != $_POST['password'] && empty($_POST['username']) || empty($_POST['password'])) {
  echo '<script>alert("Please verify your username and password."); window.location.href = "login.php";</script>';
  // header("Location: login.php");
}




?>
