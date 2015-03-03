<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Add Courses</title>
	<style type="text/css">
		td, th{
			border: 1px solid black;
			padding: 5px;
		}
	</style>
</head>
<body>
	<h3>Add a new course</h3>
	<form action='<?php echo base_url('/courses/add'); ?>' method='post'>
		<label>Name:
			<input type='text' name='name' />
		</label>
		<br />
		<label>Description:
			<textarea name='description'></textarea>
		</label>
		<br />
		<input type='submit' value='Add' />
	</form>

<?php echo $this->session->flashdata('message'); ?>

	<h3>Courses</h3>
	<table>
		<thead>
			<tr>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date Added</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
<?php
			
			foreach ($courses as $course_data) 
			{
				$date_added = date('F d, Y', strtotime($course_data['created_at']));
				
				echo "<tr>
						<td>". $course_data['name'] . "</td>
						<td>". $course_data['description'] . "</td>
						<td>". $date_added . "</td>
						<td><a href= 'courses/destroy/". $course_data['id']. "'>Remove</a></td>
				</tr>";
			}
?>
		</tbody>
	</table>
</body>
</html>