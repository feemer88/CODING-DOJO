<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_DATABASE', 'test_db');

	$connection = mysql_connect(DB_HOST, DB_USER, DB_PASS) or 
		die('Could not connect to the database host (please double check the settings in connection.php): ' . mysql_error());
	$db_selected = mysql_select_db(DB_DATABASE, $connection) or 
		die ('Could not find a database with the name "'.DB_DATABASE.'" 
		(please double check your settings in connection.php): ' . mysql_error());


	function fetchAll($query)
	{

		$data = array();

		$result = mysql_query($query);

		
		while($row = mysql_fetch_assoc($result))
		{

			$data[] = $row;
		}


		return $data;
	}
?>