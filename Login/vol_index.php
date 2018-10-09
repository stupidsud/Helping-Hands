<?php
require_once '../actions/db_connect.php';
?>

<?php
session_start();

if(isset($_SESSION['userId'])) {
	header('location: http://localhost/clever/exam/account.php');
}

$errors = array();

if($_POST)
{

	$username = $_POST['username'];
	$password = $_POST['password'];
	//echo $username;
	//echo $password;

	if(empty($username) || empty($password))
	{
		if($username == "")
		{
		$errors[] = "User is required";
		}

		if($password == "")
		{
			$errors[] = "Password is required";
		}

	}
	else
	{
                //******************************************************************************
		$sql = "SELECT username FROM Volunteer WHERE username = '$username'";
		$result = $connect->query($sql);
		//echo $result;



		if($result->num_rows>0)
		{
			//$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM Volunteer WHERE username = '$username'";
			$mainResult = $connect->query($mainSql);
			$array = mysqli_fetch_assoc($mainResult);
			//echo $array["password"];
			//echo $password;
			if(!strcmp($password,$array["password"]))
					{
				//$value = $mainResult->fetch_assoc();
				$user_id = $array['username'];

				// set session
				$_SESSION['userId'] = $user_id;


				header('location: http://localhost/clever/exam/account.php');
			} else{
				$errors[] = "Incorrect username/password combination";


			} // /else
		} else {
			$errors[] = "Username doesnot exists";
		} // /else
	} // /else not empty username // password

} // /if $_POST
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="..\style.css">
<!--===============================================================================================-->
<header>
	<header class="header-area">

			<!-- Navbar Area -->
			<div class="clever-main-menu">
					<div class="classy-nav-container breakpoint-off">
							<!-- Menu -->
							<nav class="classy-navbar justify-content-between" id="cleverNav">

									<!-- Logo -->
									<a class="nav-brand" href="../index.php">Helping Hands</a>

									<!-- Navbar Toggler -->
									<div class="classy-navbar-toggler">
											<span class="navbarToggler"><span></span><span></span><span></span></span>
									</div>

									<!-- Menu -->
									<div class="classy-menu">

											<!-- Close Button -->
											<div class="classycloseIcon">
													<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
											</div>


											<!-- Nav End -->
									</div>
							</nav>
					</div>
			</div>
</header>
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-color:  #99ccff;">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style="font-family:"Raleway", sans-serif;">
					Account Login
				</span>


				<div class="messages">
					<?php if($errors) {
						foreach ($errors as $key => $value) {
							echo '<div class="alert alert-warning" role="alert">
							<i class="glyphicon glyphicon-exclamation-sign"></i>
							'.$value.'</div>';
							}
						} ?>
				</div>

				<form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="btn clever-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<!-- ##### Footer Area Start ##### -->
	<footer class="footer-area">
			<!-- Top Footer Area -->
			<div class="top-footer-area">
					<div class="container">
							<div class="row">
									<div class="col-12">
											<!-- Footer Logo -->
											<div class="footer-logo">
												</div>

									</div>
							</div>
					</div>
			</div>
			<!-- Bottom Footer Area -->
			<div class="bottom-footer-area d-flex justify-content-between align-items-center">
					<!-- Contact Info -->
					<div class="contact-info">
							<a href="#"><span>Phone:</span> +91 9876543210</a>
							<a href="#"><span>Email:</span> www.pict.edu</a>
					</div>
					<!-- Follow Us -->
					<div class="follow-us">
							<span>Follow us</span>
							<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
							<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</div>
			</div>
		</footer>
		<!-- ##### Footer Area End ##### -->

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
