<?php

session_start();

if(isset($_POST['action']) && $_POST['action'] == 'register')
{
	if(empty($_POST['email']))
		$_SESSION['error'] = "Sorry, the box cannot be blank! <br>";
	elseif (!empty($_POST['email'])) 
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
			$_SESSION['error'] = "The email address you entered " . $_POST['email'] . " is NOT a VALID email address! <br>";
	if(!isset($_SESSION['error']))
		$_SESSION['success_message'] = "The email address you entered " . $_POST['email'] . " is a VALID email address! Thank you! <br>";
}

header('Location: index.php');

?>