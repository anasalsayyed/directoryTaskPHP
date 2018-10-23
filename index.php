<?php 

session_start();
if (!file_exists('users/'.$_SESSION['username']. '.xml')) {
 header('Location:login.php');
 die;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>File System</title>
	   <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
	<div class="header" style="width: 90%;">
  <h2>File System</h2>
  <a href="logout.php">Logout</a>
</div>
<div class="content" style="width: 90%;">
	<div >
<?php include('upload.php'); ?>
</div>
<div style="margin-top: -170px;">
<?php include('create.php'); ?>
</div>
<br>
<br>
<div class="container">

	<div class="row">
 <table class="table">
      <tr>
        <th>Delete</th>
        <th>Name</th>
        <th>file type</th>      
        <th> Data/file time </th>
        <th>
  <?php

if(isset($_GET['path'])) {
  $path = $_GET['path']; 
}
else {
 // var_dump($_SESSION['username']);
  $path = 'users/' .$_SESSION['username'];  
}


$content = scandir($path);


    foreach ($content as $entry) {
         if ($entry != "." && $entry != "..") {
             if(is_dir($path."/".$entry)){

         echo "<tr><td>". "<a href='delete.php?name=$path/$entry'>
          <span class='glyphicon glyphicon-remove'></span></a></td>"
                 ."<td>". "<a href='index.php?path=$path/$entry'><span class='glyphicon glyphicon-folder-close'></span> $entry</a>"."</td>"
                 
                 . "<td>". filetype($path.'/'.$entry)."</td>"
                 . "<td>". date ("F d Y H:i:s.", filemtime($path.'/'.$entry))."</td></tr>";
         } 
          
            
          
    }}
    


?>



      </tr>
    
    </table>
 
</body>
</html>