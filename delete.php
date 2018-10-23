<?php 

/*if(isset($_GET['path'])) {
  $path = $_GET['path']; 
}
if (file_exists($path)) {
    if (rmdir($path)) {
      echo"Deleted File";
    }
}
function deleteDirectory($path) { 
        if (!file_exists($path)) { return true; }
        if (!is_dir($path) || is_link($path)) {
            return unlink($path);
        }
        foreach (scandir($path) as $item) { 
            if ($item == '.' || $item == '..') { continue; }
            if (!deleteDirectory($path . "/" . $item, false)) { 
                chmod($dir . "/" . $item, 0777); 
                if (!deleteDirectory($path . "/" . $item, false)) return false; 
            }; 
        } 
        return rmdir($path); 
    }
deleteDirectory();*/

function rrmdir($path) { 
   if (is_dir($path)) { 
     $objects = scandir($path); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($path."/".$object))
           rrmdir($path."/".$object);
         else
           unlink($path."/".$object); 
       } 
     }
     rmdir($path); 
   } 
}
if(isset($_GET['name'])) {
  $path = $_GET['name']; 
  rrmdir($path);

}header('location:index.php')
 ?>
 
