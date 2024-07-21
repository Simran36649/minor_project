<?php
include "configASL.php";
session_start();


$tname = $_SESSION['tname'];

if((!isset($_SESSION['tname'])))
{
	header("location:index.php");
}


if((!isset($_SESSION['aid']))&&(!isset($_SESSION['tname'])))
{
	header("location:index.php");
}


if(isset($_POST['roll']))
{
	$_SESSION['roll']=$_POST['roll'];
}



if(isset($_POST['faculty_id']))
{
	$_SESSION['faculty_id']=$_POST['faculty_id'];
}

if(isset($_POST['subject']))
{
	$_SESSION['subject']=$_POST['subject'];
}

$name=$_SESSION['name'];

$pass=$_POST['subject'];

$tname=strtoupper($tname);



$sql=mysqli_query($al,"select * from users where id='$tname' and tsub='$pass' and tname='$name' ");

if(mysqli_num_rows($sql)==1)
{
    $sql = "SELECT faculty_id FROM faculty WHERE name = '$name' AND s1 = '$pass'";
   $result = mysqli_query($al, $sql);
    $row = mysqli_fetch_assoc($result);
        // Store the faculty_id
        $faculty_id = $row['faculty_id'];
      	$_SESSION['faculty_id']=$faculty_id;
}
else
{
    ?>
    <script type="text/javascript">
        alert("Sorry You Can't Give Feedback to this Teacher as you are not registered in this course");
    </script>
     <script>location='feedback_step_2.php'</script>;
             header("location:feedback_step_2.php");
    <?php
            
             
             
            
            
             
             
             

}





$s = mysqli_query($al, "select * from feedgiven where student='$tname' and subject='$pass'");
if (mysqli_num_rows($s) >= 1) {
  
   
 
 
  ?>
    <script type="text/javascript">
        alert("Already Given Feedback ");
    </script>
      echo "<script>location='feedback_step_2.php'</script>";
    header("location:feedback_step_2.php");
    <?php
 
 
   
        
  
} else {
    // Store teacher's name in session if no record exists
    $_SESSION['tname'] = $tname;
}





//Fetch Questions
//$id = $_POST['id'];

$q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = 1 "));
$parameters = array("Poor","Fair","Good","Very Good","Excellent");

?>
<!doctype html>
<html><!-- Designed & Developed by Ashish Labade (Tech Vegan) www.ashishvegan.com | Not for Commercial Use-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student  System</title>
<link  rel="stylesheet" type="text/css" href="feedback_step_4.css?v=<?php echo time(); ?>">
</head>

<body>


<div class="topHeader" >
  <img src="nit.png" class="img">
	<h2>National Institute Of Technology Uttarakhnad</h2>
   

</div>

<div id="content" align="center">
<br>
<br>

<form method="post" action="feedback_step_5.php" >
    <div class="blur-container">
<div id="table"> 
    
<h3><span class="tag">Give the feedback</span></h3><br><br>
<div class="tr">
     <!--<div class="td">-->
     <!--   	<label> Feedback Form Id:-Default Id is 1</label>-->
     <!--   </div>-->
        

     <!--<div class="td">-->
     <!--<input-->
     <!--             type="text"-->
     <!--             class="form-control"-->
     <!--             id="id"-->
     <!--             name="id"-->
     <!--           />-->
     <!--   </div>-->
     <!-- </div>  -->

     <div class="tr">
     <div class="td">
        	<label>Faculty : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['name'];?>" />
            <input type="hidden" value="<?php echo $_SESSION['faculty_id'];?>" name="faculty_id" />
            
        </div>
      </div>
      
      
      <div class="tr">
     <div class="td">
        	<label>Subject : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_SESSION['subject'];?>"/>
            <input type="hidden" value="<?php echo $_SESSION['subject'];?>" name="subject" />
        </div>
      </div>
     
</div>
<hr style="width:100%;">


	<?php
		for($i=1;$i<=10;$i++)
		{
			?>
            <div class="tddd">
				<span class="text"><?php echo $i;?>. <?php echo  $q['q'.$i];?> : </br><br>
                <?php 
                
						for($j=1;$j<=5;$j++)
						{
							?>
                        <input type="radio" required value="<?php echo $j;?>" name="q<?php echo $i;?>" /><?php echo $parameters[$j-1];?>&nbsp;&nbsp;
                        <?php } ?> </span>
                        				</div>
                                        	<hr style="width:100%;"> <?php } ?>

                                         <div class="tddd">
                                            <br>
                                            <br>
                                              <h5>Enter Comments</h5>
                                         <textarea name="comment" cols="40" required placeholder="Do not use foul language, action could be taken against you"></textarea>
                                        </div>
                                        <br>
        	<input type="button" onClick="window.location='feedback_step_2.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SUBMIT" onClick="return confirm('Are you sure?')" />
            <br>
            </div>

        </div>
   
    <br>
</div>
</form>
<br>
                   
</body>
</html>