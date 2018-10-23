<?php 
$errors =  array();
if (isset($_POST['login'])) {
	$username =$_POST['username'];
	
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	$folder = $_POST['username'];

     if (file_exists('users/'.$username. '.xml')) {
     	$errors[]='username already exists';
    }
    if ($username =='') {
    	$errors[] = 'username is blank';
    }
   /* if ($email =='') {
    	$errors [] ='Email is blank';
    }*/
    if($password ==''|| $c_password ==''){
     $errors[] = 'Password are blank';
    }
    if ($password != $c_password) {
    	$errors = 'password do not match';
    }
    if (count($errors) == 0) {
   
    	
    $xml = new SimpleXMLElement('<user></user>');
 

    $xml->addChild('password',  md5($password));
    $xml->addChild('username',$username);
    $xml->addChild('Folder',$username);
   $xml->asXML('users/' . $username . '.xml');

    if(mkdir('users/'.$username,777)){
   //$xml_src = 'test.xml'; 
}
/*include_once(dirname(__FILE__) . '/index.php?user='.'<?php $_GET[$username] ?>');*/
   header('Location: index.php?path=users'.'/'.$username);
    die;
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
 
 <form method="post" action="">
    <div class="header" style="width: auto;margin-top: 0px;">
      <h1>Register</h1>  
    </div>
 	<?php 
     if (count($errors) > 0) {
     	echo'<ul>';
     	foreach ($errors as $e) {
     		echo'<li>'. $e.'</li>';
     	}
     	echo'</ul>';
     }
 	 ?>
     <div class="input-group">
 	<p> Username <input type="text" name="username" size="20"></p>
 </div>
    <div class="input-group">
 	<p>Email <input type="text" name="email" size="20" /></p>
 </div>
 <div class="input-group">
 	<p>Password<input type="password" name="password" size="20"> </p>
 </div>
 <div class="input-group">
 	<p> Confirm Password <input type="password" name="c_password"> </p>
 </div>
 <div class="input-group">
 	<p><input type="submit" class="btn" name="login" value="Register" style="width: auto;margin-left: 35%;" ></p>
 </div>
 <p>
        Already a member? <a href="login.php">Sign in</a>
    </p>
 </form>
</body>
</html>