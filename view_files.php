<?php ?>
<!DOCTYPE html>
<html>
<head>
	<title>Visualise CSV</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="jqueryfunctions.js"></script>
</head>
<body>

<?php

$dir = "uploads/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		if($file == '.') echo '';
		else if($file == '..') echo '';
		else echo $file . ' | <a href="visualise.php?file='.$file. '">visualise</a><br/>';
    }
    closedir($dh);
  }
}


?>
<br/><br/><br/>
<a href="index.php">Back to home</a>

</body>
</html>
