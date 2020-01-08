<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
		<div class="input-group">
  	  <label>user type</label>
  	  	<select name="user_type">
					<option value="-1">select user type</option>
					<!--<option value="Admin">Admin</option>-->
					<option value="Patient">Patient</option>
					<option value="Support">Support staff</option>
					<option value="Doctor">Doctor</option>
				</select>
  	</div>
  	<div class="input-group">
  	  <label>Last name</label>
  	  <input type="text" name="lname">
  	</div>
		<div class="input-group">
  	  <label>First name</label>
  	  <input type="text" name="fname">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>