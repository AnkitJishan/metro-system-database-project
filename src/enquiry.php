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




	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
					<span class="login100-form-title p-b-59">
						Details
					</span>
                              <div class="wrap-input100 validate-input" >
								<?php
								 $host="localhost";
								 $user="root";
								 $password="";
								 $db="Metro";

								$conn = mysqli_connect($host, $user, $password, $db);
								if(!$conn){
									die("Connection Failed: ". mysqli_connect_error());
								}

								if(isset($_POST['submit']))
								{
									if(isset($_POST['Train']))
									{
										$Train = $_POST['Train'];
										$sql = "SELECT * FROM Train where TrainName='$Train'";
								$result = mysqli_query($conn, $sql); 

								echo "<table border='1'>

								<tr>

								<th>TrainId</th>
								<th>.</th>

								<th>Train Name </th>

								<th>From</th>

								<th>To</th>

								<th>STime</th>

								<th>ETime</th>

								<th>Seats</th>

								</tr>";

								if (mysqli_num_rows($result) > 0) {
								    // output data of each row
								    while($row = mysqli_fetch_assoc($result)) {

								        echo "<tr>";

								        echo "<td>" . $row['TrainId'] . "<td>";

								        echo "<td>" . $row['TrainName'] . "</td>";

								        echo "<td>" . $row['FromStation'] . "</td>";

								        echo "<td>" . $row['ToStation'] . "</td>";

								        echo "<td>" . $row['Starttime'] . "</td>";

								        echo "<td>" . $row['EndTime'] . "</td>";

								        echo "<td>" . $row['SeatsRemaining'] . "</td>";

								        echo "</tr>";
								        
								    }
								} else {
								    echo "0 results";
								}

								echo "</table>";
									}
								}

								?>
                 </div>

			</div>
		</div>
	</div>


	
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