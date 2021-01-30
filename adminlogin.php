<?php
session_start();
$myfile = "adminaccounts.txt";
$contents = file_get_contents($myfile);
$contents = explode("\n", $contents);


foreach($contents as $values){
     $loginInfo = explode(":", $values);
        $user = $loginInfo[0];
        $password = $loginInfo[1];
        if($user == $_POST['ausername'] && $password == $_POST['apassword'] && $user != $_POST[null] && $password != $_POST[null]){

            $_SESSION['ausername'] = $user;
            header("Location:controlpanel.php");
          }
}

 if ($user != $_POST1['ausername'] || $password != $_POST1['apassword'] && empty($_POST1['ausername']) || empty($_POST1['apassword'])) {
  echo '<script>alert("Please verify your adminusername and adminpassword."); window.location.href = "login.php";</script>';
 }


?>
