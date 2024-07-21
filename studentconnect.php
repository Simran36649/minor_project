


<?php
include("configASL.php");
session_start();

	$tname = $_POST['tname'];
	$tpass = $_POST['tpass'];

	// Database connection
	$conn = new mysqli('localhost','root','','feedback');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into studentcredential(tname,tpass) values(?, ? )");
		$stmt->bind_param("ss", $tname, $tpass);
		$execval = $stmt->execute();
	
			// If registration was successful, generate JavaScript alert
			echo '<script type="text/javascript">';
			echo 'alert("Registration successful!");';
			echo 'window.location.href = "studentregistration.php";';  // Redirect to another page if needed
			echo '</script>';

			
		

		$stmt->close();
		$conn->close();

		
	}
?>

