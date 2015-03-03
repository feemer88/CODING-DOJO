<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
	<style type="text/css">
		nav{
			margin-bottom: 20px;
		}
	</style>
</head>
<body>
<!-- <div class="container"> -->

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
	      <a class="navbar-brand" href="/">User Dashboard</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!-- <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li> -->
	        <li><a href="/home">Home</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="/signin">Sign In</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class='container'>
		<div class="jumbotron">
		  <h2>Welcome to the Coding Dojo User Dashboard!</h2>
		  <p>We're going to bild a cool application using a MVC framework! This application was built with PHP CodeIgniter!</p>
		  <p><a class="btn btn-primary btn-lg" href="#" role="button">Click here to start!</a></p>
		</div>
		<div class='row'>
			<div class='col-sm-4'>
				<h4>Manage Users</h4>
				<p>Using this application, you'll learn how to -add, remove, and edit users for the application.</p>
			</div>
			<div class='col-sm-4'>
				<h4>Leave Messages</h4>
				<p>Users will be able to leave a message to another user using this application.</p>
			</div>
			<div class='col-sm-4'>
				<h4>Edit User Information</h4>
				<p>Admins will be able to edit another user's information (email address, first name, last name, etc).</p>
			</div>
		</div>
	</div>

	<!-- </div> -->
</body>
</html>