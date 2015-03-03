<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        	<span class="sr-only">Toggle navigation</span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">User Dashboard</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!-- <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li> -->
	       	<li><a href="/dashboard">Dashboard</a></li>
	        <li><a href="/users/edit">Profile</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/logoff">Log Off</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class='container'>
		<h1>All Users</h1>
		<table class='table table-striped'>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Created Date</th>
					<th>User Level</th>
				</tr>
			</thead>
			<tbody>
<?php 		foreach($users as $user)
			{ 	?>
				<tr>
					<td><?= $user['id'] ?></td>
					<td><a href="/users/show/<?= $user['id'] ?>"><?= $user['first_name']?> <?= $user['last_name'] ?></a></td>
					<td><?= $user['email']?></td>
					<td><?= $user['created_at']?></td>
					<td><?= $user['user_level']?></td>
				</tr>
<?php		}	?> 
			</tbody>
		</table>
	</div>
</body>
</html>