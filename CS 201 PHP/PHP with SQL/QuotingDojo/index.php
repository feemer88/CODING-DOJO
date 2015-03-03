<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>QuotingDojo</title>
</head>
<body>
	<h1>Welcome to Quoting Dojo</h1>
<?php
	if(isset($_SESSION['message']))
		echo "<p>". $_SESSION['message'] . "</p>";
	
	unset($_SESSION['message']);		
?>
	<form action="process.php" method="post">
		<label>Your Name: 
			<input type="text" name="name" />
		</label>
		<br />
		<label>Your Quote 
			<textarea name="quote" ></textarea>
		</label>
		<br />
		<input type="submit" value="Add My Quote" />	
	</form>
	<form action="main.php" method="post">
		<input type="submit" value="Skip to Quotes!" />
	</form>
</body>
</html>