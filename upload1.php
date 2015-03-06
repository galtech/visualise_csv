<?php

$target_path = "uploads/";

$filename = $target_path . basename( $_FILES['csvfile']['name']); 

 //Check if the file is CSV file and it's size is less than 1MB
  $ext = substr($filename, strrpos($filename, '.') + 1);
  $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
  
if (($ext == "csv") && in_array($_FILES["csvfile"]["type"],$mimes)){
	if($_FILES["csvfile"]["size"] < 1000000){
		if(move_uploaded_file($_FILES['csvfile']['tmp_name'], $filename)) {
			echo "The file ".  basename( $_FILES['csvfile']['name'])." has been uploaded";
			header("Location:index.php",5000);
		}else{
			echo "There was an error uploading the file, please try again!";
			header("Location:index.php",5000);
		}
	}else{
		echo "The file exceeds the max allowed file size. Please try again";
		header("Location:index.php",5000);
	}
}else{
	echo "The file is not of the correct type. Please ensure you are uploading a CSV file.";
	header("Location:index.php",5000);
}
	
?>
