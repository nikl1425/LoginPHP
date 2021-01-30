<?php
session_start();

function display_login_form(){ ?>

<!-- STOP REFRESH -->
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }</script>
<!-- STOP REFRESH -->
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Opret bruger</title>
     <link rel="stylesheet" type="" href="controlStyle.css">
   </head>
   <body>
     <header>
       <h3>OPRET BRUGER</h3>
     </header>



<div class="main-content">
  <div class="maincontentcreateuser">
          <form  action="" method="POST">
            <h2>Brugernavn:</h2><input name="username" type="text" id="username" placeholder="Brugernavn"><br>
            <h2>Adgangskode:</h2><input name="password" type="password" id="password" placeholder="Adgangskode"><br>
            <input type="submit" value ="Opret" name="submit">
             <a href="login.php"><button type="button">Gå til startside</button></a>
          </form>
        </div>
</div>

   </body>
 </html>



<?php }
display_login_form();

if (isset($_POST['submit']))
      {
	$username = $_POST['username'];
  $password = $_POST['password'];
	  if (empty($username))
	     {
		echo '<script>alert("Indtast et brugernavn");</script>';
	     } else $username = $username;

	  if (empty($password))
	     {
		 	echo '<script>alert("Indtast en adgangs");</script>';
	     } else $password = $password;
	  $text = $username . ":" . $password . "\n";
	  $fp = fopen('accounts.txt', 'a+');
	  $path = 'accounts.txt';
    if (file_exists($path)){
		$contents = file_get_contents($path);
 		$contents = explode("\n", $contents);
   	$users = array();
    	foreach ($contents as $value) {
      			$user = explode(':', $value);
      			$users[$user[0]] = $user[1];
    			}
          if (isset($users[$_POST['username']])) {
	 			echo '<script>alert("That user already exists!");</script>';
      }else if(!empty($username) && !empty($password) && fwrite($fp, $text) && !isset($users[$_POST['username']]))  {
          echo '<script>alert("User created!"); window.location.href = "login.php";</script>';
    	}
	  fclose ($fp);
$path = 'accounts.txt';
}
}
?>
