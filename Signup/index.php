<?php
require_once '../actions/db_connect.php';
?>

<?php
//session_start();

//if(isset($_SESSION['userId'])) {
//	header('location: http://localhost/clever/Signup/index.php');
//}
$errors= array()
if($_POST)
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = "SELECT name FROM Volunteer where username='".$_POST['username']."'";
  echo $sql;
  $result = $connect->query($sql);
  echo $result->num_rows;
  if($result->num_rows==0)
  {
	$username = $_POST['username'];
  }
  else {
    $errors[] = "Username has Already taken!";
  }
  echo $username;
	$password = $_POST['password'];
  $college = $_POST['college'];
  $address = $_POST['address'];
  echo gettype($_POST['contact']);
  if(is_numeric($_POST['contact']))
  {
    $contact = $_POST['contact'];
  }
  else {
    $errors[] = "Enter Contact as Numeric Value only";
  }
  echo $contact;

  if(!$errors)
  {
  $sql = "INSERT INTO Volunteer(name,email,username,password,college,address,contact) VALUES
  ('".$name."','".$email."','".$username."','".$password."','".$college."','".$address."','".$contact."')";
  //$stmt->bind_param("ssssssi",$name,$email,$username,$password,$college,$address,$contact);
  	$mainResult = $connect->query($sql);
  }
  if($mainResult)
  {
    	header('location: http://localhost/clever/index.php');
 }
  else
  {
          echo $sql;
          echo "Wrong";
  }

}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="..\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" type="text/css" href="..\Login/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="..\Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="..\Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="..\Login/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="..\Login/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="..\Login/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="..\Login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="..\Login/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="..\Login/css/util.css">
    <link rel="stylesheet" type="text/css" href="..\Login/css/main.css">
    <title>SignUp</title>

  </head>
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
  <body>
    <div class="limiter">
  		<div class="container-login100" style="background-color:  #99ccff;">
  			<div class="wrap-login100 p-t-30 p-b-50">
  				<span class="login100-form-title p-b-41" style="font-family:"Raleway", sans-serif;">
  					Create Your Account
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

  				<form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="SignUpForm">

            <div class="wrap-input100 validate-input" data-validate="Enter Name">
              <input class="input100" style="font-style:Bold;" type="text" name="name" placeholder="Name">
              <span class="focus-input100" ></span>
            </div>

  					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
  						<input class="input100" type="email" name="email" placeholder="Email Address">
  						<span class="focus-input100" ></span>
  					</div>

            <div class="wrap-input100 validate-input" data-validate = "Enter Username">
  						<input class="input100" type="text" name="username" placeholder="Username">
  						<span class="focus-input100" ></span>
  					</div>

  					<div class="wrap-input100 validate-input" data-validate="Enter password">
  						<input class="input100" type="password" name="password" placeholder="Password">
  						<span class="focus-input100" ></span>
  					</div>
            <div class="wrap-input100 validate-input" data-validate="Enter College name">
              <input class="input100" style="font-style:Bold;" type="text" name="college" placeholder="College Name">
              <span class="focus-input100" ></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Enter Address">
              <input class="input100" style="font-style:Bold;" type="text" name="address" placeholder="Address">
              <span class="focus-input100" ></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter Contact Number">
              <input class="input100" style="font-style:Bold;" type="number" name="contact" placeholder="Contact No.">
              <span class="focus-input100" ></span>
            </div>

            <div class="container-login100-form-btn m-t-32">
              <button class="btn clever-btn">
                Sign Up
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
