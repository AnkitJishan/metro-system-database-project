<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V13</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">


<?php
	 $host="localhost";
	 $user="root";
	 $password="";
	 $db="Metro";

$conn = mysqli_connect($host, $user, $password, $db);
if(!$conn){
	die("Connection Failed: ". mysqli_connect_error());
}
                         
if(isset($_POST['submit'])){
	 if( isset($_POST['UserId']) && isset($_POST['UserName']) && isset($_POST['Password'])){
 		$UserName=$_POST['UserName'];
 		$Password=$_POST['Password'];
 		$UserId=$_POST['UserId'];
 		$sql = "select * from User where UserId='$UserId' and Password='$Password'";
 		$result = mysqli_query($conn, $sql);
 		if (mysqli_num_rows($result) > 0) {
                   ?>
			<script type=text/javascript>alert("Welcome!!! <?php echo $UserName; ?>.")</script>
		<?php
		$_SESSION["PassengerId"] = $UserId;
		header("Location: Booking.php");
    }
        else 
        {  ?>
			<script type=text/javascript>alert("Invalid UserId or Password.")</script>
		<?php
		die();
        }
}
		/*
			if(mysqli_query($conn, $sql)){
				echo "Data entered into table successfully";
			}else{
				echo "Error in inserting: ".mysqli_error($conn);
			}
			
		*/
 }
?>


	<form class="login100-form validate-form" action="login.php" method="post">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
					<span class="login100-form-title p-b-59">
						Log-in
					</span>

					<div class="wrap-input100 validate-input" data-validate="Starting Place">
						<span class="label-input100">User-Name</span>
						<input class="input100" type="text" name="UserName" placeholder="User-Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please Enter No of passengers">
						<span class="label-input100">User-Id</span>
						<input class="input100" type="number" name="UserId" placeholder="User-Id">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="Password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="#" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Continue
							</button>
						</div>

                    
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
						    <div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" onclick="window.location='signup.html'" style="border-top:2px solid white;">	
							New User : 			Sign-Up
							</button>
						</div>

						<a href="front.html" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Cancel
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				
			</div>
		</div>
	</div></form>
	
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

