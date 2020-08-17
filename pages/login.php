<!DOCTYPE html>
<html lang="en">

	<head>
		<title>LoginTab></title>
		
		<link rel="stylesheet" type="text/css" href="../css/Login&Reg/style.css">
	</head>
	
<body>

<?php
$message="";

if(isset($_POST['submit'])){
	
	$conn = mysqli_connect("localhost","root","","useraccounts");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE firstname='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
		echo 'Invalid Username or Password!';
		
	} else {
		
		$message = "You are successfully authenticated!";
		header('location: profile.php');
	}
}

?>

	<div id="main">

		<div class="content">
		
		<form action="" method="post" id="login-box">
		
				<div class="title">
					<h1><b>LOGIN</b></h1><br><br>
				</div>
				
			<input type="text" name="username" placeholder="Username" class="inp" required><br>
			
			<input type="password" name="password" placeholder="Password" class="inp" required><br>
			
			<a href="#" id="forgot">Forgot Password?</a><br>
			
			<input type="submit" name="submit" value="SIGN IN" id="sub-btn"><br><br>
			
			<input type=button onClick="location.href='registration.php'" value='Register Now' id="reg-btn">
			
		</form>
		</div>
	</div>
	
</body>
</html>