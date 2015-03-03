<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Delete a Course</title>
	<style type="text/css">
		form {
			display: inline;
		}
	</style>
</head>
<body>
	<h4>Are you sure you want to delete the following course?</h4>
	<p>Name: <?php echo $course->name; ?></p>
	<p>Description: <?php echo $course->description; ?></p>

	<form action='<?php echo base_url('/courses/destroy'); ?>' method='post'>
		<input type='hidden' name='action' value='cancel' />
		<input type='hidden' name='course_id' value='<?php echo $course->id; ?>' />
		<input type='submit' value='No' />
	</form>

	<form action='<?php echo base_url('/courses/destroy'); ?>' method='post'>
		<input type='hidden' name='action' value='delete' />
		<input type='hidden' name='course_id' value='<?php echo $course->id; ?>' />
		<input type='submit' value='Yes! I want to delete this.' />
	</form>
</body>
</html>