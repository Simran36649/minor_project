<?php
include('smtp/PHPMailerAutoload.php');
include("configASL.php");
session_start();

ini_set('max_execution_time', 300);














$name = $_SESSION['name'];

  $name=strtoupper($name);
	
	$sql=mysqli_query($al,"select * from studentcredential where tname='$name' ");
	if(mysqli_num_rows($sql)==1)
	{
      $name=strtoupper($name);	
	}
	else
	{
		?>
		<script type="text/javascript">
	alert('Wrong Details');
  window.location="forgot.php";
  </script>
  <?php

	}







	$randomNumber = rand();



	$conn = new mysqli('localhost','id22011472_root','Simran@123','id22011472_check');

if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
	
} else {
	
	$update_query = "UPDATE studentcredential SET tpass='$randomNumber' WHERE tname='$name'";
	if ($conn->query($update_query) === TRUE) {
		?>
         <script type="text/javascript">
	 alert('Your Old Password is now the password sent to your mail use it to create new password');
	  window.location.href = 'changestudentpassword.php';

	</script>
    
    <?php
     
    } else {
        echo "Error updating record: " . $conn->error;
    }
	
}
// Database connection
// Database connection


$name=strtolower($name);
$email = $name."@nituk.ac.in";




echo smtp_mailer($email,'New Password',$randomNumber);
function smtp_mailer($to,$subject, $msg){
    
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	//$mail->SMTPDebug = 2; 
	$mail->Username = "bt21ece015@nituk.ac.in";
	$mail->Password = "ywsv vgkb lzib hbxm";
	$mail->SetFrom("email");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}




?>