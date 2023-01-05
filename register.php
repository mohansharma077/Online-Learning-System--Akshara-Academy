<?php

   
    require 'post.php';

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
		<div class="form-box" style="height: 550px;">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log" > Register</button>
		
			</div>
			<div class="social-icons">
				<img src="images/icon/fb2.png">
				<img src="images/icon/insta2.png">
				<img src="images/icon/tt2.png">
			</div>
			
			
			
			<!-- Registration Form -->
			<form id="register" class="input-group" name="register" method="post">
				<input type="text" class="input-field" placeholder="Full Name" name="name" required="required" value="<?php echo $name; ?>">
				<input type="email" class="input-field" placeholder="Email Address" name="email" required="required" value="<?php echo $email; ?>">
				<input type="password" class="input-field" placeholder="Create Password" name="password1" required="required" value="<?php echo $password1; ?>">
				<input type="password" class="input-field" placeholder="Confirm Password" name="password2" required="required" value="<?php echo $password2; ?>">

					<div id="un-message" style="color:red;margin-top: 10px;font-size: 15px;">
                <?php echo $un_message; ?>
            </div>
            <div id="su-message" style="color:green;margin-top: 10px;font-size: 15px;">
                <?php echo $su_message; ?>
            </div>

				<input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions
				<button type="submit" id="btnSubmit" class="submit-btn reg-btn" name="register" value="register">Register</button>

				<div class="login" style="text-align: center;padding: 10px;/*! margin-bottom: 15px; */">Already have an account? <a href="login.php">Log In </a></div>
			</form>



		</div>

		<script type="text/javascript" src="script.js"></script>
</body>
</html>