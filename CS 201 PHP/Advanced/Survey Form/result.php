<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>result</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div id="container">
		<div id="top">
			<p>Thank you for submitting this from! You have submitted this form <?=$_SESSION['counter']?> times now</p>
		</div>
		<div id="main">
			<h2>Submitted Information</h2>
<?php 		foreach ($_SESSION['fields'] as $name => $value) 
			{
				echo "<p>" . $name . ": " . $value . "</p>";
			}
?>
			<a href="/index.php">Go Back</a>
		</div>
	</div>
</body>
</html>