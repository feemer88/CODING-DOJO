<?php
	session_start();

	if (!isset($_SESSION['counter']))
		$_SESSION['counter'] = 0;
	
	$_SESSION['counter']++;
	$_SESSION['fields'] = array();

	foreach ($_POST as $name => $value) 
	{
		$_SESSION['fields'][$name] = $value;
	}

	header("Location: result.php");
	exit();
?>