<?php
include "configASL.php";
session_start();

if((!isset($_SESSION['tname'])))
{
	header("location:index.php");
}


$tname = $_SESSION['tname'];




if((!isset($_SESSION['aid']))&&(!isset($_SESSION['tname'])))
{
	header("location:index.php");
}



if(!empty($_POST))
{
     
	$comment=$_POST['comment'];
	
	//$roll=$_POST['id'];
	$roll=1;
	$sub=$_POST['subject'];
	$faculty_id=$_POST['faculty_id'];
	$q1=$_POST['q1'];
	$q2=$_POST['q2'];
	$q3=$_POST['q3'];
	$q4=$_POST['q4'];
	$q5=$_POST['q5'];
	$q6=$_POST['q6'];
	$q7=$_POST['q7'];
	$q8=$_POST['q8'];
	$q9=$_POST['q9'];
	$q10=$_POST['q10'];
	$total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
	$per=($total/50)*100;
 



     $tname=strtoupper($tname);
  
	$x=mysqli_query($al,"insert into feedgiven(student,subject) values('$tname','$sub')");


	$x=mysqli_query($al,"insert into feeds(faculty_id,roll,name,subject,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,total,percent) 
	values('".$faculty_id."','$roll','".$_SESSION['name']."','$sub','$q1','$q2','$q3','$q4','$q5','$q6','$q7',
	'$q8','$q9','$q10','$total','$per')");

    $y=mysqli_query($al,"insert into comments(id,faculty_id,comment) 
	values('".$_SESSION['name']." ','".$sub."','".$comment."')");

     
	if($x==true)
	{
		
		?>
         <script type="text/javascript">
	 alert('Feedback successfully submitted');
	</script>
    <script>location='feedback_step_2.php'</script>;
    header("location:feedback_step_2.php");
          <?php    
            
            
            
            
            
            
            
            
            
}
}	?>

		

