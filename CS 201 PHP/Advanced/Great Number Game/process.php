<?php
	session_start();


	if(!isset($_SESSION['number']))
	{
		$_SESSION['number'] = rand(1,100);
	} 

	if(isset($_POST['guess']))
	{
		if($_POST['guess'] == $_SESSION['number'])
		{
			$_SESSION['correct'] = "<div id='middle1' class='box'>
			 							<p>" . $_SESSION['number'] ." was the number</p>
			 							<form action='index.php' method='post'>
			 								<input type='submit' value='Play Again'>
			 							</form>
			 						</div>";
		}
		else if($_POST['guess'] < $_SESSION['number'])
		{	
			$_SESSION['low'] = "<div id='left' class='box'><p>Too low!<p></div>";
		}
		else 
		{
			$_SESSION['high'] = "<div id='right' class='box'><p>Too high!<p></div>";
			
		}
	}

	header('Location: index.php');
	exit();

?>