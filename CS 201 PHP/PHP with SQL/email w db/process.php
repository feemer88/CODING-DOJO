<?php
session_start();
require_once('connection.php');


function validateEmail($email)
{

	return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
}


if (isset($_POST['action']) && $_POST['action'] == 'email-form')
{

	if(empty($_POST['email'])) 
	
		$_SESSION['error']['email'] = 'Sorry, the email address field cannot be blank';


	else
	{

		$_SESSION['email_success'] = validateEmail($_POST['email']); 

		if(!$_SESSION['email_success'])
			$_SESSION['error']['email'] = 'The email address you entered (' . $_POST['email'] . ') is NOT a valid email address!';
		else
		{
			$insert_email_query = "INSERT INTO users (email, created_at) VALUES('". $_POST['email'] ."', NOW())";

			$insert_email_result = mysql_query($insert_email_query);

			if($insert_email_result === true)
			{
				$_SESSION['email'] = $_POST['email'];
				header('Location: success.php');
				exit();
			}
			else
				$_SESSION['error']['email'] = "Something went wrong. Please check database connection.";
		}

	}

	header('Location: index.php');

	exit();
}

?>