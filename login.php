<?php 
$error = false;
if (isset($_POST['login'])) {
	$username = $_POST['username'];
		$password = md5($_POST['password']);
		if (file_exists('users/'. $username . '.xml')) {

			$xml = new SimpleXMLElement('users/'.$username. '.xml',0,true);
			if ($password == $xml->password && $username==$xml->username) {
				session_start();
				$_SESSION['username'] = $username;
				header('Location: index.php?path=users'.'/'.$username);
				die;
			}
			else{

			}
		}
		$error = true;
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<link rel="stylesheet" type="text/css" href="css/style1.css">
 </head>
 <body>

 
 <form method="post" action="">
 	<div class="header" style="width: auto;margin-top: 0px;">
 	<h1>Login</h1>
 </div>
 	<div class="input-group">
 	<p>Username <input type="text" name="username" size="20" /></p>
 </div>
 <div class="input-group">
 	<p>Password <input type="password" name="password" size="20" /></p>
 </div>
 	<?php 
 	if ($error) {
 	 	echo'<p>invalid username or password</p>';
 	 } 
 	 ?>
 	  <div class="input-group">
 	<p><input type="submit" value="Login" class="btn" name="login" style="width: auto; margin-left: 40%;" /></p>
 	 </div>
<a href="register.php">Register</a>
 </form>

 </body>
 </html>