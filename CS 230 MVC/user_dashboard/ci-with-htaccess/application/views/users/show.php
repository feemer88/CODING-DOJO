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
		<div class='row'>
			<h1><?= $user['first_name'] ?> <?= $user['last_name'] ?></h1>
			<h4>Registered at: <?= $user['created_at'] ?></h4>
			<h4>User ID: <?= $user['id'] ?></h4>
			<h4>Email address: <?= $user['email'] ?></h4>
			<h4>Description: <?= $user['description'] ?></h4>
		</div>
		<div class='row'>
			<h3>Leave a message for <?= $user['first_name'] ?></h3>
			<form role="form" action='/messages/create' method='post'>
				<input type='hidden' name='sender_id' value="<?= $this->session->userdata('id') ?>">
				<input type='hidden' name='user_id' value="<?= $user['id'] ?>">
			  	<div class="form-group">
			    	<textarea type="text" name="message" class="form-control" placeholder="Write your message here"></textarea>
			  	</div>
			  	<button type="submit" class="pull-right btn btn-default">Post Message</button>
			</form>
		<div>
		<div class='row'>
<?php 	foreach($messages as $key => $message)
		{	
			if($key > 0 && $messages[$key-1]['message_id'] == $messages[$key]['message_id'])
			{
				continue;
			}
			else
			{	?> 
			<div class='col-sm-11 col-sm-offset-1'>  
				<h3><?= $message['message_sender_first_name'] ?> <?= $message['message_sender_last_name'] ?> wrote:</h3>
				<h4><?= $message['message'] ?></h4>
<?php 			foreach($messages as $comment)
				{
					if($comment['comment_message_id'] == $message['message_id'])
					{	?>
				<div class='row'>
					<div class='col-sm-6 col-sm-offset-1'> 
						<h5><?= $comment['comment_sender_first_name'] ?> <?= $comment['comment_sender_last_name'] ?> wrote:</h5>
						<p><?= $comment['comment'] ?></p>
					</div>
				</div>
<?php				}
				}
			}	?>
				<div class='row'>
					<form class='col-sm-11 col-sm-offset-1' role="form" action='/messages/create_comment' method='post'>
							<input type='hidden' name='sender_id' value="<?= $this->session->userdata('id') ?>">
							<input type='hidden' name='message_id' value="<?= $message['message_id'] ?>">
							<input type='hidden' name='user_id' value="<?= $user['id'] ?>">
						  	<div class="form-group">
						    	<textarea type="text" name="comment" class="form-control" placeholder="Write a comment for this message"></textarea>
						  	</div>
						  	<button type="submit" class="pull-right btn btn-default">Post Comment</button>
					</form>
				</div>
			</div>
<?php	}	?>
		</div>
	</div>
</body>
</html>