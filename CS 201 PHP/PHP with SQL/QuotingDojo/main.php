<?php 
	include_once('connection.php'); 
	
	$display_quotes_query = "SELECT * FROM quotes ORDER BY created_at DESC";
	$quotes = fetch_all($display_quotes_query);
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>QuotingDojo Main</title>
</head>
<body>
	<h1>Here are the awesome quotes!</h1>

<?php
	
	foreach($quotes as $quote)
	{
		$date_added = date('g:ia F d, Y', strtotime($quote['created_at']));
		
		echo "<p>'". $quote['text'] . "'</p>
				<p> - ". $quote['name'] ." at  ". $date_added ."</p><hr />";
			
	}
?>
	<p><a href='index.php'>Go Back</a></p>

</body>
</html>