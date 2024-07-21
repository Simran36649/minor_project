<?php
include "configASL.php";
session_start();

$tname = $_SESSION['tname'];

if((!isset($_SESSION['tname'])))
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
//Fetch Faculty Name




$nm = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE name='".$_POST['teachername']."'"));
$_SESSION['name'] = $_POST['teachername'];

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<link  rel="stylesheet" type="text/css" href="feeds2.css?v=<?php echo time(); ?>">
</head>

<body>
<header>
  
        <div>
              <div class="title"></div></header>
            <div class="announce">
              <div class="row"><marquee><h2>Welcome to NIT Uttarakhand's Student Feedback System</h2></marquee>
                 <nav class="navigation">
                 <!-- <div class="n">-->
                 <!--  <a href="https://nituk.ac.in/" class="nav-item">Home </a>-->
                 <!--  <a href="https://nituk.ac.in/history" class="nav-item">About</a>-->
                 <!--  <a href="https://nituk.ac.in/electronics-engineering" class="nav-item">Department</a>-->
                 <!--  <a href="https://nituk.ac.in/nituk-contact" class="nav-item">Contact</a>-->
                 <!--</div>-->
                 
               </nav>
              </div>
            </div>
            
        </div>



<div id="content" align="center">
<br>
<br>

<form method="post" action="feedback_step_4.php" >
    <div class="blur-container">
<div id="table"> 
<div class="tr">
     <div class="td">
        	<label>Faculty : </label>
        </div>
        

     <div class="td">
			<input type="text" disabled size="25" value="<?php echo $_POST['teachername'];?>" />
        
        </div>
      </div>

    <!--<div class="tr">-->
    <!-- <div class="td">-->
    <!--    	<label> Feedback Form Id:-Default Id is 1</label>-->
    <!--    </div>-->
        

    <!-- <div class="td">-->
    <!-- <input-->
    <!--              type="text"-->
    <!--              class="form-control"-->
    <!--              id="id"-->
    <!--              name="id"-->
    <!--            />-->
    <!--    </div>-->
    <!--  </div>-->

     
      
      
      <div class="tr">
     <div class="td">
        	<label>Subject : </label>
        </div>
        

     <div class="td">
			<select name="subject" required>
            <option value="NA" disabled selected> - - Select Subject - -</option>
            <?php
			$x=mysqli_query($al,"select  s1 from faculty WHERE name='".$_POST['teachername']."'");
            
            			while($y=mysqli_fetch_array($x))
			{
			 ?>
            
             <option value="<?php echo $y['s1'];?>"><?php echo $y['s1'];?></option>
             <?php } 
            
             ?>
    </select>
        </div>
            </div>
      </div>
      
      
</div>
</header>
		
        <div class="tdd">
        <input type="submit" value="NEXT" />
        	<input type="button" onClick="window.location='feedback_step_2.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
   
    <br>
</div>
</form>
<br>

</body>
</html>