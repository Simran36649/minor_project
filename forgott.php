<?php
include("configASL.php");

session_start();

//$aid=$_SESSION['aid'];


if(isset($_POST['name'])) {
    $_SESSION['name'] = $_POST['name'];
   
    header("Location: test.php");
    exit; // It's a good practice to exit after a header redirect to prevent further execution
}



		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>
<link  rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
<header>
        <div>
              <div class="title"></div></header>
            <div class="announce">
              <div class="row"><marquee><h5>Welcome to NIT Uttarakhand's Student Feedback System</h5></marquee>
                 <nav class="navigation">
                  <div class="n">
                   <a href="https://nituk.ac.in/" class="nav-item">Home </a>
                   <a href="https://nituk.ac.in/history" class="nav-item">About</a>
                   <a href="https://nituk.ac.in/electronics-engineering" class="nav-item">Department</a>
                   <a href="https://nituk.ac.in/nituk-contact" class="nav-item">Contact</a>
                 </div>
                 <div class="l"> <button class="btnlogin-popup">Login</button></div>
               </nav>
              </div>
            </div>
            
        </div>

<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Change Password</span>
<br>
<br>
<form method="post" action="#" >
<div id="table">
<div class="tr">
		<div class="td">
        	<label>User Name: </label>
        </div>
        <div class="td">
			<input type="text" name="name"  required placeholder="Enter The Username" />
			<br>
			<br>
        </div>
    </div>

    <br></br>
		<div class="tdd">
        	<input type="submit" value="Forgot PASSWORD" />
        </div>
    
<br>
<br>

     <br>

<input type="button" onClick="window.location='home.php'" value="BACK">
<br>
<br>
</div>
</form>


<br>
<br>
<br>

<br>
<br>

</div>
</body>
</html>