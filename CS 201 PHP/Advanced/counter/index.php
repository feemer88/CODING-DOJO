<?php
	session_start();

	if(isset($_SESSION['visits']))
		$_SESSION['visits'] += 1;
	else
		$_SESSION['visits'] = 1;
		
	$visit_count = $_SESSION['visits'];
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Total Visits</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
	<div id="wrapper">
		<h1>Multiple Visits</h1>
		<div id="content">
			<p>You Visited This Site</p>
			<h2><?php echo $visit_count; ?></h3>
			<p>times</p>
		</div>
		<a href="process.php">Start Over (Destroy Session)</a>
	</div>
</body>
</html>


