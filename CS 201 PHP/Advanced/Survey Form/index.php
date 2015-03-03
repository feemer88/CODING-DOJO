<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Survey Form</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div id="container">
		<form action="process.php" method="post">
			<label>Your Name: <input type='text' name='Name' placeholder='Name'><label>

			<label>Dojo Location: 
			<select name="Location">
				<option value="Mountain View">Mountain View</option>
				<option value="Seattle">Seattle</option>
			</select>
			
			<label>Favorite Language: </label>
			<select name="Language">
				<option value="Javascript">Javascript</option>
				<option value="PHP">PHP</option>
				<option value="C#">C#</option>
				<option value="Java">Java</option>
				<option value="Ruby">Ruby</option>
			</select>
		
			<label>Comment: </label>
			<textarea name="Description"></textarea>

			<input id="submit" type="submit" value="Submit">
		</form>
	</div>		
</body>
</html>