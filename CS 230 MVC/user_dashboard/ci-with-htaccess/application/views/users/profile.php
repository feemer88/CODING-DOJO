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
		<h1>Edit Profile</h1>
		<div class='row'>
			<div class='col-sm-5'>
				<h4>Edit Information</h4>
				<form role="form" action='/users/update' method='post'>
					<input type='hidden' name='action' value='contact_info'>
				  	<div class="form-group">
				    	<label>First Name</label>
				    	<input type="text" name="first_name" class="form-control" placeholder="<?= $user['first_name'] ?>">
				  	</div>
				  	<div class="form-group">
				    	<label>Last Name</label>
				    	<input type="text" name="last_name" class="form-control" placeholder="<?= $user['last_name'] ?>">
				  	</div>
				  	<div class="form-group">
				    	<label>Email address</label>
				    	<input type="email" name="email" class="form-control" placeholder="<?= $user['email'] ?>">
				  	</div>
				  	<button type="submit" class="pull-right btn btn-default">Update Information</button>
				</form>
			</div>

			<div class='col-sm-5 col-sm-offset-1'>
				<h4>Change Password</h4>
				<form role="form" action='/users/update' method='post'>
					<input type='hidden' name='action' value='password_info'>
				  	<div class="form-group">
				    	<label>Password</label>
				    	<input type="password" name="password" class="form-control" placeholder="Password">
				  	</div>
				  	<div class="form-group">
				    	<label>Confirm Password</label>
				    	<input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
				  	</div>
				  	<button type="submit" class="pull-right btn btn-default">Update Password</button>
				</form>
			</div>

		</div>
		<div class='row'>
			<div class='col-sm-11'>
			<h4>Edit Description</h4>
			<form role="form" action='/users/update' method='post'>
				<input type='hidden' name='action' value='description_info'>
			  	<div class="form-group">
			    	<textarea type="text" name="description" class="form-control" placeholder="<?= $user['description'] ?>"></textarea>
			  	</div>
			  	<button type="submit" class="pull-right btn btn-default">Update Description</button>
			</form>
		</div>
		</div>
		
	</div>
</body>
</html>