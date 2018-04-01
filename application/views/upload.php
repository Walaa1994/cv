<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action='<?php echo base_url();?>index.php/JobResearcher/do_upload' method="post" enctype="multipart/form-data">
	
	<input type="file" name="userFile">
	<input type="submit" value="upload">
</form>

</body>
</html>