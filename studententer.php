<?php

include("configASL.php");

session_start();

if(!empty($_POST))
{
   
	$tname=mysqli_real_escape_string($al,$_POST['tname']);
	$pass=mysqli_real_escape_string($al,$_POST['pass']);
	 $tname=strtoupper($tname);


	$sql=mysqli_query($al,"select * from studentcredential where tname='$tname' and tpass='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
     
        $tname=strtoupper($tname);
		$_SESSION['tname']=$_POST['tname'];

		echo "<script>location='feedback_step_2.php'</script>";
    header("location:feedback_step_2.php");
        
	}
	else
	{
	  
		?>
        <script type="text/javascript">

		alert("Incorrect Student ID or Password");
		</script>
			<script> location='index.php' </script>;
             header("location:index.php");
      <?php
      
	}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="slogin.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
    <div>
              <div class="title"></div></header>
            <div class="announce">
              <div class="row"><marquee><h2>Welcome to NIT Uttarakhand's Student Feedback System</h2></marquee>
                 <nav class="navigation">
                  <div class="n">
                   <a href="https://nituk.ac.in/" class="nav-item">Home </a>
                   <a href="https://nituk.ac.in/history" class="nav-item">About</a>
                   <a href="https://nituk.ac.in/electronics-engineering" class="nav-item">Department</a>
                   <a href="https://nituk.ac.in/nituk-contact" class="nav-item">Contact</a>
                 </div>
                 <div class="l"> <button class="btnlogin-popup">Login</button></button></div>
               </nav>
              </div>
            </div>
            
        </div>
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
       <div class="form-box  login"><h2>Student Login</h2>
        <form action="#" method="post" >
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="text" name="tname" size="25" required />
                    <label >Username</label>
                    
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="pass" size="25" required />
                    <label >Password</label>
            </div>
            <div class="remember-forgot">
                <a href="changestudentpassword.php">Change Password?</a>
            </div>
            <br>
            <div class="remember-forgot">
                <a href="forgot.php">Forget Password?</a>
            </div>
            <button type="submit" value="login" class="btn">
            Login
            </button>
            
            <div class="login-register"><p>Don't Have an Account ?<br><a href="https://nituk.ac.in/" class="register-link"> Contact Admin</a></p></div>

        </form>
       </div>

     

       <div class="form-box  register "><h2>Student Registration</h2>
        <form action="connect.php" method="post">
                 

            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                <input
                  type="text"
                  class="form-control"
                  id="tname"
                  name="tname"
                />
                    <label >Username</label>
                   
                
            </div>


            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
                    <label >Email</label>
                 
                
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="tpass"
                />   
                    <label >Password</label>
                
            </div>
            <div class="remember-forgot">
                <label ><input type="checkbox" > I agree to The Terms&Conditions</label>
            </div>
          <button type="submit" value="login" class="btn">
            Login
            </button>
            <div class="login-register"><p>Already Have an Account?<a href="#" class="login-link"> Login</a></p></div>
          </form>
       </div>


    </div>
     <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>