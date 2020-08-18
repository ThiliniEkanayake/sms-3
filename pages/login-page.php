<!--<link rel="stylesheet" href="../css/grid-system.css">


<body>
<div id="adm_st_login">
	

<
	<div id="lgn" class="col-12  justify-content-center align-items-center bg-lightblue">
		
				<div id="login-form" class="form" action="" method="post">
					<h2 class="text-center p-5">Login</h2>
					<div class="form-group">
						<label for="username" class="text-info" >Username:</label><br>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password" class="text-info">Password: </label><br>
						<input type="text" name="password" id="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="remember-me"><span> Remember me</span>
							<span><input id="remember-me" name="remember-me" type="checkbox"></span>
							</label><br>
							<input type="submit" name="submit" class="btn btn-blue " value="submit">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


</body>
-->
<!-- Material form login -->
<?php require_once("../php/database.php") ?>
<?php require_once("../php/common.php") ?>

<link rel="stylesheet" href="../css/grid-system.css">

<?php   
$message="";
if(count($_POST)>0) {
	$conn = mysqli_connect("localhost","root","","sms");
	$result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
	$count  = mysqli_num_rows($result);

	

	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		if(empty($_POST["remember"])) {

	setcookie ("email",$_POST["email"],time()+ 3600);
	setcookie ("password",$_POST["password"],time()+ 3600);

	} 
	else {

	setcookie("email","");
	setcookie("password","");

	}
		header("Location: admin.php");
	}
}

?>


<div class="row pt-5 pb-5 justify-content-center align-items-center">
 <div class=" w-25 justify-content-center align-items-center bg-silver ">
	
  		<h5 class="align-items-center text-center fs-30 theme-dark">Login</h5>

    <!-- Form -->
    <form class="frm" method="post" action="">
    	<div class="message"><?php if($message!="") { echo $message; } ?></div>
      <!-- Username -->
      <div class="form-group">
      	<label for="em">Email</label>
        <input type="email" name="email" id="email" placeholder="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"];} ?>"class="form-control">
        
      </div>

      <!-- Password -->
      <div class="form-group">
      	<label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"];} ?>" class="form-control">
        
      </div>

      <div class="chk-box">
        <div>
          <!-- Remember me -->
          <div class="chk">
          	<label for="materialLoginFormRemember">Remember me</label>
            <input type="checkbox" class="form-control" id="remember"><br>
            
          </div>
        </div>

      </div>

      <!-- Sign in button -->
      <div class=" d-block justify-content-center align-items-center text-center">
     <input type="submit" name="Submit" class="btn btn-blue"  value="Log In">
 	</div>

    </form>
    <!-- Form -->

  </div>
</div>
</div>

<!-- Material form login -->



