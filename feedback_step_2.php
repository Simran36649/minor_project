<?php
include "configASL.php";
session_start();



if(((!isset($_SESSION['tname']))))
{
	header("location:index.php");
}



$tname = $_SESSION['tname'];


// Specify the column you want to ret

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<link rel="stylesheet" type="text/css" href="feeds2.css?v=<?php echo time(); ?>">
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
</header>
<br>


<div id="content" align="center">
<br>
<br>
<form method="post" action="feedback_step_3.php" >
<div id="table"> 
  
<div class="blur-container" style="height:150px">
     <div class="tr">
     <div class="td">
         <br>
      
          <h4>Select Your Subject Faculty</h4><br><br>
        	<label><h4>Faculty : </h4></label>
        </div>
        <div class="td">

     <div class="td">
			<select name="teachername" required></br>
            <option value="NA" disabled selected> - - Select Faculty - -</option>
            <?php
			$x=mysqli_query($al,"SELECT DISTINCT tname FROM users WHERE id='$tname' ");
			while($y=mysqli_fetch_array($x))
			{
			 ?>
             <option value="<?php echo $y['tname'];?>"><?php echo $y['tname'];?></option>
             <?php } 
             ?>
            
                </select>
        </div>
      </div>
            </div>
</div>
</div>
		
        <div class="tdd">
        <input type="submit" value="NEXT" />
        <input type="button" onClick="window.location='exit.php'" value="EXIT">&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
           
    
    <br>
</div>
        
</form>
<br>

</body>
</html>