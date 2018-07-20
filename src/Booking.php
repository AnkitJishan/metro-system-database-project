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
//	echo "111   Connected to the server Successfully<br>";


/*
	$sql= "CREATE TABLE Reservations(ReservationID INT(3) PRIMARY KEY, PassengerName VARCHAR(30), SeatsReserved INT(3), FromStation VARCHAR(30),
	ToStation VARCHAR(30), TrainName VARCHAR(30))";
*/


/*
	INSERT INTO TABLE Reservations(ReservationID, PassengerName, SeatsReserved, FromStation, ToStation, TrainName) 
	VALUES (1, 'Neeraj', 3, 'Bhopal', 'Goa', 'Bikini_Express'
*/

/*
	if(mysqli_query($conn, $sql)){
		echo "Data entered in Reservations enteredd successffully";
	}else{
		echo "Errorr inserting data in table table : ".mysqli_error($conn);
	}
	$sql1 = "SELECT ReservationID FROM Reservations WHERE PassengerName='Subhash'";

	$result = mysqli_query($conn, $sql1);

	while($row=mysqli_fetch_assoc($result)){
		echo "ID ".$row['ReservationID'];
	}
*/
                           
if(isset($_POST['submit'])){
	 if( isset($_POST['from']) && isset($_POST['to']) && isset($_POST['Train']) &&isset($_POST['PassengerName'])){
 		$from=$_POST['from'];
 		$to=$_POST['to'];
 		$PassengerName=$_POST['PassengerName'];
 		$train=$_POST['Train'];
 		$registerID=rand(1, 999);
 		$PassengerId=$_SESSION["PassengerId"];
 		$sql = "INSERT INTO Reservations(ReservationID,PassengerId, PassengerName, FromStation, ToStation, TrainName)
			VALUES ('{$registerID}', '{$PassengerId}', '{$PassengerName}', '{$from}', '{$to}', '{$train}')";
		/*
			if(mysqli_query($conn, $sql)){
				echo "Data entered into table successfully";
			}else{
				echo "Error in inserting: ".mysqli_error($conn);
			}
			
		*/
                                                            
		if(mysqli_query($conn, $sql))
		{
	    	?>
			<script type=text/javascript>alert("Congratulations! <?php echo $PassengerName; ?>. You've just booked your tickets. Your Registration ID is <?php echo $registerID; ?>. Enjoy the Journey.")</script>
		<?php
        $sql="select SeatsRemaining from train where TrainName='$train'";
        $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                 {
                       $NewSeats = $row["SeatsRemaining"];
                 }
                 if($NewSeats>0){
               		$NewSeats = $NewSeats-1; 

              $sql = "UPDATE Train SET SeatsRemaining='$NewSeats' WHERE TrainName='$train'";
              $set = mysqli_query($conn, $sql);
  	
                 }
                          }
       }		
   }	
}

/*
	$sql = "SELECT ReservationID FROM Reservations";
	$result = mysqli_query($conn, $sql);

		while($row=mysqli_fetch_assoc($result)){
			echo "ID ".$row['ReservationID'];
		}

*/

/*
$sql = "SELECT ReservationID, PassengerName, FromStation,ToStation, TrainName FROM Reservations";
$result = mysqli_query($conn, $sql); 

echo "<table border='1'>

<tr>

<th>ReservationID</th>

<th> PassengerName</th>

<th>FromStation</th>

<th>ToStation</th>

<th>TrainName</th>

</tr>";




if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";

        echo "<td>" . $row['ReservationID'] . "<td>";

        echo "<td>" . $row['PassengerName'] . "</td>";

        echo "<td>" . $row['FromStation'] . "</td>";

        echo "<td>" . $row['ToStation'] . "</td>";

        echo "<td>" . $row['TrainName'] . "</td>";

        echo "</tr>";
        
    }
} else {
    echo "0 results";
}

echo "</table>";
*/
                                                             
?>


	<form class="login100-form validate-form" action="Booking.php" method="post">
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				
					<span class="login100-form-title p-b-59">
						Registration
					</span>

					<div class="wrap-input100 validate-input" data-validate="Starting Place">
						<span class="label-input100">From</span>
						<select name="from" style="margin-left: 10px; border-radius: 6px;">
							<option>Bhopal </option>
							<option>Indore </option>
							<option>Ujjain </option>
							<option>Gwalior</option>
							<option>Jabalpur </option>
							<option>Dewas </option>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="label-input100">To</span>
						<select name="to" style="margin-left: 35px; border-radius: 6px;">
							<option>Bhopal </option>
							<option>Indore </option>
							<option>Ujjain </option>
							<option>Gwalior</option>
							<option>Jabalpur </option>
							<option>Dewas </option>
						</select>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please Enter No of passengers">
						<span class="label-input100">Train</span>
						<select name="Train" style="margin-left: 13px; border-radius: 6px;">
							<option>Rajdhani Express(Jab-Gwa)</option>
							<option>Avantika Express(Ind-Jab)</option>
							<option>MayaNagri Express(Ind-Gwa)</option>
							<option>Ajanta Express(Bpl-jab)</option>
							<option>Amravati Express(Bpl-Gwa)</option>
							<option>Holkar Express(Ind-Ujj)</option>
							<option>Bhoj Express(Ind-Dws)</option>
							<option>Ujjaini Express(Dws-Ujj)</option>
							<option>Kshipra Express(Ujj-Jab)</option>
							<option>Narmada Express(Ujj-Gwa)</option>
							<option>Godavari Express(Dws-Jab)</option>
							<option>Gwaliori Express(Gwa-Dws)</option>
							<option>Malwa Express(Bpl-Ujj)</option>
							<option>Gatimaan Express(Dws-Bpl)</option>
							<option>Intercity Express(Bpl-Ind)</option>
							<option>Rajdhani Express(Bpl-Gwa)</option>
							<option>Mayanagri Express(Gwa-Jab)</option>
							<option>Avantika Express(Jab-Gwa)</option>
						</select>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please Enter your Name:">
						<span class="label-input100">Enter your Name</span>
						<input class="input100" type="text" name="PassengerName" placeholder="Name of Ticket Booker...">
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
							<button class="login100-form-btn"  name="submit">
								Confirm
							</button>
						</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
						    <div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" onclick="window.location='Enquiry.html'" style="border-top:2px solid white;">
									Enquiry
							</button>
						</div>

						<a href="#" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
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



