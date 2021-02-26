<?php
	if(filter_has_var(INPUT_POST, 'submit')){
		echo 'Submitted' ;
	}


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Contact Us!</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">My Website</a>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top: 2%">
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>">
				<div class="form-group">
					<label>Enter Name</label>
					<input type="text" name="name" class="form-control" placeholder="name">
			  	</div>
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" class="form-control" placeholder="Enter email">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
					<label>Message</label>
					<input type="text" name="name" class="form-control" placeholder="Message">
			  	</div>
			  <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
		</form>
	</div>
</body>
</html>