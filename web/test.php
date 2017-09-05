<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
</head>
<?php echo $_POST['name']; ?>
<body>
<iframe name="post_frame" style="display: nne"></iframe>
<form action="" method="post" target="post_frame">
	<input type="text" name="name">
	<input type="submit" value="提交">
</form>
</body>
</html>