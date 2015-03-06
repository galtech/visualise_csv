<?php ?>
<!DOCTYPE html>
<html>
<head>
	<title>Visualise CSV</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>

<div id="content-container">

<form name="upload-form" action="upload1.php" method="post" enctype="multipart/form-data">
<label>Choose File</label>
<input type="file" name="csvfile" id="csvfile"/>
<input type="submit" name="upload" id="upload" value="Upload"/>
</form>

</div>

</body>
</html>
