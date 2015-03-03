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
	      <a class="navbar-brand" href="/">User Dashboard</a>
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
		<h3>Add a new user</h3>
		<div class='row'>
			<div class='col-sm-5'>

				<form role="form" action='/users/create' method='post'>
					<input type='hidden' name='action' value='admin'>
				  	<div class="form-group">
				    	<label>First Name</label>
				    	<input type="text" name="first_name" class="form-control" placeholder="Enter first name">
				  	</div>
				  	<div class="form-group">
				    	<label>Last Name</label>
				    	<input type="text" name="last_name" class="form-control" placeholder="Enter last name">
				  	</div>
				  	<div class="form-group">
				    	<label>Email address</label>
				    	<input type="email" name="email" class="form-control" placeholder="Enter email">
				  	</div>
				  	<div class="form-group">
				    	<label>Password</label>
				    	<input type="password" name="password" class="form-control" placeholder="Password">
				  	</div>
				  	<div class="form-group">
				    	<label>Confirm Password</label>
				    	<input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
				  	</div>
				  	<button type="submit" class="pull-right btn btn-default">Create User</button>
				</form>
			</div>
			<div class='col-sm-4 col-sm-offset-1'>
<?php if($this->session->flashdata('errors'))
			{	?>
			<h4><?= $this->session->flashdata('errors') ?></h4>
<?php	}	
		if($this->session->flashdata('success'))
			{	?>
			<h4><?= $this->session->flashdata('success') ?></h4>
<?php	}	?>
			</div>
		</div>
	</div>
</body>
</html>