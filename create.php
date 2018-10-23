<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data" style="float: left; margin-top: 8px;">
		Folder Name : <input type="text" name="foldername"/>
		<br>
		<br>
		<input class="button" type="submit" value="create" name='creat'/>
</form>
</body>
</html>

<?php
if(isset($_GET['path'])) {
  $path = $_GET['path']; 
}


if(isset($_POST['creat'])){
if ($_POST['foldername']!="") 
  {
  	$foldername=$_POST['foldername'];
  	if (mkdir($path.'./'.$foldername)|| mkdir($path.'/'.$foldername))
  	{
  	    
  		
          
  	    }
	else
		echo "Upload folder name is not set.";
  }
 
}

?>