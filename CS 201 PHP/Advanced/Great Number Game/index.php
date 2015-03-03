<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Great Number Game</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="container">

		<div id="top">
			<h1>Welcome to the Great Number Game!</h1>
			<h2>I am thinking of a number between 1 and 100</h2>
			<h3>Take a guess</h3>
		</div>

		<div class="box">
<?php		if(isset($_SESSION['low']))
			{
				echo $_SESSION['low']; 
				unset($_SESSION['low']);
			} 
?>
		</div>

		
<?php 	if(!isset($_SESSION['correct']))
		{	
?>
			<div class='box'>
				<form action='process.php' method="post">
					<input type="text" name="guess">
					<input type="submit" value="Submit">
				</form>
			</div>
<?php 
		} 
		else {
			echo $_SESSION['correct'];
			$_SESSION['number'] = rand(1,100);
			unset($_SESSION['correct']);
		}
?>
		<div class="box">
<?php	if(isset($_SESSION['high']))
		{
			echo $_SESSION['high']; 
			unset($_SESSION['high']);
		}
?>
		</div>
	</div>
</body>
</html>
