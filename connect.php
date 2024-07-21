


<?php
include("configASL.php");
session_start();


	$tname = $_POST['tname'];
	$tpass = $_POST['tpass'];
	$temail=$_POST['temail'];

	$_SESSION['tname'] = $tname; // Replace $data with the data you want to pass

	// Database connection
	$conn = new mysqli('localhost','id22011472_root','Simran@123','id22011472_check');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into teachercredential(tname,tpass,tid) values(?, ?,? )");
		$stmt->bind_param("sss", $tname, $tpass,$temail);
		$execval = $stmt->execute();
		

			// If registration was successful, generate JavaScript alert
			echo '<script type="text/javascript">';
			echo 'alert("Registration successful!");';
			echo 'window.location.href = "teacherregistration.php";';  // Redirect to another page if needed
			echo '</script>';

			
		
		$stmt->close();
		$conn->close();
	}
?>