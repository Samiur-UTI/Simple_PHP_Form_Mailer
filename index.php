<?php
	$msg = '';
	$msgClass = '';

	if(filter_has_var(INPUT_POST, 'submit')){
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);
		if(!empty($name) && !empty($email) && !empty($message)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$msg = 'Please fill in all fields correctly';
				$msgClass = 'alert-danger';

			} else {
				$toEmail = 'allpraisehtlord@gmail.com';
				$subject = 'Contact Request from'. $name;
				$body = '<h2>Contact Request</h2>
						 <h4>Name</h4><p>'.$name.'</p>
						 <h4>Email</h4><p>'.$email.'</p>
						 <h4>Message</h4><p>'.$message.'</p> 
						';
				$headers = 'MIME-Version: 1.0' .'\r\n';
				$headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
				$headers .=  "From". $name. "<".$email.">"."\r\n";

				if(mail($toEmail, $subject, $body)){
					$msg = 'Your Email has been sent';
					$msgClass = 'alert-success';
				} else {
					$msg = "Please fill out the fields properly";
					$msgClass = "alert-danger";
				}

			}
		} else {
			$msg = 'Please Fill in all fields';
			$msgClass = 'alert-danger';
		}
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
		<?php if($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg ; ?></div>
		<?php endif; ?>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>">
				<div class="form-group">
					<label>Enter Name</label>
					<input type="text" name="name" class="form-control" placeholder="name" value="<?php echo isset($_POST['name']) ? $name : ' ' ; ?>">
			  	</div>
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo isset($_POST['email']) ? $email : ' ' ; ?>">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
					<label>Message</label>
					<input type="text" name="message" class="form-control" placeholder="Message" value="<?php echo isset($_POST['message']) ? $message : ' ' ; ?>">
			  	</div>
			  <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
		</form>
	</div>
</body>
</html>