<?php session_start(); ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Validation</title>
	</head>
	<body>
<?php
	if(isset($_SESSION['error']))
		echo $_SESSION['error'];
	elseif(isset($_SESSION['success_message']))
		echo $_SESSION['success_message'];

	$_SESSION = array();
	unset($_SESSION);
?>
		<form action="process.php" method="post">
			<input type="hidden" name="action" value="register">
			<input type="text" name="email" placeholder="Enter Email">
			<input type="submit" value="Register">
		</form>
	</body>
</html>