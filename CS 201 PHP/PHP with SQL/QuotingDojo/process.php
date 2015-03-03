<?php
	session_start();
	include_once('connection.php');
	//var_dump($_POST);
	
	if($_POST['name'] == NULL || $_POST['quote'] == NULL)
	{
		$_SESSION['message'] = "Please fill out both fields.";
		header("Location: index.php");
		exit();
	}
	else
	{
		$add_quote_query = "INSERT into quotes (name, text, created_at) VALUES('{$_POST['name']}', '{$_POST['quote']}', NOW())";
		run_mysql_query($add_quote_query);
		header("Location: main.php");
		exit();
	}
?>