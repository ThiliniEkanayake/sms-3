<?php session_start() ?>

<?php require_once("../php/config.php"); ?>
<?php require_once("../php/common.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SMS</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/grid-system.css">
</head>
<body>
	<div class="container bg-lightgray">
		<div class="row theme-dark sticky-top" id="top-header">
			<div class="school-badge col-4 col-md-3 justify-content-center">
				<a href="<?php echo set_url('pages/admin.php'); ?>"><img src="../img/scl.jpg" width="80px" alt=""></a>
			</div> <!-- .school-badge -->
			<div id="header-school-info" class="col-6 col-md-7 flex-col align-items-center">
				<!-- <div class="d-flex flex-col bg-red align-items-start"> -->
					<h1>Siridhamma college</h1>
					<span>Labuduwa, Galle, Sri Lanka</span>
					<span>Tel : 0912345678</span>
				<!-- </div> -->
			</div> <!-- #header-school-info -->
			<?php if(isset($_SESSION['username'])){
				$user_info = '
			<div id="header-user-info" class="col-6 col-md-2 d-flex flex-col justify-content-center">
				<div class="d-flex align-items-center justify-content-between mr-5">
					<div class="mr-3 d-flex flex-col">
						<span>username</span>
						<span>role</span>
					</div>
					<button class="toggle-button" target="user-nav">
						<img src="../img/close-menu.png" width="20px" height="20px" alt="">
					</button>
				</div>
				<div class="no-collapsed theme-darkblue w-100" id="user-nav">
					<ul class="nav">
						<li class="nav-item"><a href="" class="nav-link">Profile</a></li>
						<li class="nav-item"><a href="" class="nav-link">Notifications</a></li>
						<li class="nav-item"><a href="" class="nav-link">Log out</a></li>
					</ul>
				</div>
			</div> <!-- #header-user-info -->';
			echo $user_info;
			}
			else{
				$buttons = '<div class="login_buttons col-12 col-md-2 justify-content-end pr-5 d-flex align-items-center">
				<a class="btn btn-blue mr-5" href="' . set_url('pages/login.php').'">Log In</a>
				<a class="btn btn-blue" href="'.  set_url('pages/registration.php'). ' ">Registration</a>
			</div>';
			echo $buttons;
			}
			?>
			
		</div> <!-- .row -->
	<div class="row sticky-top-m">