


<?php
include("configASL.php");
session_start();
if (empty($_POST['id'])) {
	header("location:feedbackgeneration.php");
}


	$id = $_POST['tname'];
	$tq1 = $_POST['tq1'];
    $tq2 = $_POST['tq2'];
    $tq3 = $_POST['tq3'];
    $tq4 = $_POST['tq4'];
    $tq5 = $_POST['tq5'];
    $tq6 = $_POST['tq6'];
    $tq7 = $_POST['tq7'];
    $tq8 = $_POST['tq8'];
    $tq9 = $_POST['tq9'];
    $tq10 = $_POST['tq10'];


	// Database connection
	$conn = new mysqli('localhost','root','','feedback');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into questions(id,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10) values(?,?,?,?,?,?,?,?,?,?,? )");
		$stmt->bind_param("sssssssssss", $id, $tq1,$tq2,$tq3,$tq4,$tq5,$tq6,$tq7,$tq8,$tq9,$tq10);
		$execval = $stmt->execute();

		echo '<script type="text/javascript">';
		echo 'alert("Feedback Submitted  successfully!");';
		echo 'window.location.href = "feedbackgeneration.php";';  // Redirect to another page if needed
		echo '</script>';

		
		$stmt->close();
		$conn->close();
	}
?>