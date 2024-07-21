


<?php
include("configASL.php");
session_start();

         
	$confirm = $_POST['answer'];
    $id=1;
	
   


$conn=mysqli_connect("localhost","id22011472_root","Simran@123","id22011472_check");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else
	{

     
         
if(!empty($_POST['answer']))
{
  
		$u=mysqli_query($al,"update mt set confirm='$confirm' where id=1");
	
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully changed ');
		</script>
        <?php } else { ?> <script type="application/javascript">
		
		</script><?php }
}


        
        echo '<script type="text/javascript">';


        if($confirm=="yes")
	     	echo 'alert("Permission Granted for Feedback of Student!");';
         else
         echo 'alert("Permission withdrawn");';

		echo 'window.location.href = "home.php";';  // Redirect to another page if needed
		echo '</script>';

	}
		$stmt->close();
		$conn->close();
?>