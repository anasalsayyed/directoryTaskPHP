<?php 
//require_once('connect.php');
/*echo"<pre>";
print_r($_FILES);
echo"</pre>";*/
if(isset($_GET['path'])) {
  $path = $_GET['path']; 




$content = scandir($path);
if (isset($_FILES) && !empty($_FILES)) {
   $name = $_FILES['profile']['name'];
   $size = $_FILES['profile']['size'];
   $type = $_FILES['profile']['type'];
   $tmp_name = $_FILES['profile']['tmp_name'];
}
$location = $_GET['path'];

if (isset($tmp_name)&& !empty($name)) {

  move_uploaded_file($tmp_name, $location.'/'.$name);
 
 }}
 ?>


<!DOCTYPE html>
<html>
<head>
  <title>File Upload</title>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
<form class="clo-md-6 clo-md-offset-3" method="POST" enctype="multipart/form-data"  style="height: 173px; margin-left: 500px">
 
  <div class="form-group" >
    <label for="exampleInputFile">File Upload</label>
    <input type="file" name="profile" id="exampleInputFile">
    
  </div>
  <br>
  <button type="submit" class="btn btn-default">upload</button>
</form>
  </div>
</div>
</body>
</html>