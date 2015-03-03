<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
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

	<div class="container">
		<h2>Sign In</h2>
		<div class='row'>
			<div class='col-sm-6'>
				<form role="form" action='/login' method='post'>
				  	<div class="form-group">
				    	<label>Email address</label>
				    	<input type="email" name="email" class="form-control" placeholder="Enter email">
				  	</div>
				  	<div class="form-group">
				    	<label>Password</label>
				    	<input type="password" name="password" class="form-control" placeholder="Password">
				  	</div>
				  	<button type="submit" class="btn btn-default">Sign In</button>
				</form>
				</br>
				<a href='/register'>Don't have an account? Click here to register.</a>
			</div>
			<div class='col-sm-4 col-sm-offset-1'>
<?php if($this->session->flashdata('errors'))
			{	?>
			<h4><?= $this->session->flashdata('errors') ?></h4>
<?php	}	?>
			</div>
		</div>
	</div>
</body>
</html>