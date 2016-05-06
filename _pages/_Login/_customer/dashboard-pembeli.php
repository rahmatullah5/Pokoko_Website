<?php
	$que 	= mysql_query("SELECT * FROM user where id='$_COOKIE[uid]'");
	$db 	= mysql_fetch_array($que);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Howdey, <?php echo $db['email'] ?>!
		</title>
	</head>
	<body>

	</body>
</html>