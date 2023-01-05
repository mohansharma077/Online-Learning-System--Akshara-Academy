<?php

    require 'validate.php';
    

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/favicon.png">
	<title>Login SignUp</title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- It will redirect to the Home Page after submitting the form -->

</head>
<body>
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log">Log In</button>

			</div>
			<div class="social-icons">
				<img src="images/icon/fb2.png">
				<img src="images/icon/insta2.png">
				<img src="images/icon/tt2.png">
			</div>
			
			<!-- Login Form -->
			<form id="login" class="input-group" name="login" method="post" style="left: 58.6px;" >
				<div class="inp">
					<img src="images/icon/user.png"><input type="text" name="email" id="email" class="input-field" placeholder="Username or Phone Number" style="width: 88%; border:none;" required="required">
				</div>
				<div class="inp">
					<img src="images/icon/password.png"><input type="password" name="password" id="password" class="input-field" placeholder="Password" style="width: 88%; border: none;" required="required">
				</div>
				<div id="un-message" style="color:red;margin-top: 10px;font-size: 15px;">
                <?php echo $un_message; ?>
            </div>
            <div id="su-message" style="color:green;margin-top: 10px;font-size: 15px;">
                <?php echo $su_message; ?>
            </div>

				<input type="checkbox" class="check-box">Remember Password
				<button type="submit" class="submit-btn" name="login" value="login">Log In</button>
				
			</form>


			<div class="other" id="other">
				<div class="instead">
					<h3>or</h3>
				</div>
				<button class="connect" onclick="google()">
					<a href="register.php" style="font-size: medium;padding: 10px;">Sign Up</a>
				</button>
			</div>
			
			<!-- Registration Form -->
		
		</div>
		<script type="text/javascript" src="script.js"></script>
</body>
</html>