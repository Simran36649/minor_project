

<?php
include("configASL.php");
session_start();


if(!empty($_POST))
{
   
	$tname=mysqli_real_escape_string($al,$_POST['tname']);
	$pass=mysqli_real_escape_string($al,$_POST['pass']);
	$sql=mysqli_query($al,"select * from studentcredential where tname='$tname' and tpass='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['tname']=$_POST['tname'];
		header("location:/Deve/feeds.php");
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect Teacher ID or Password");
		</script>
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
    <link rel="stylesheet" href="styleindex.css">
</head>
<body>
    <header>
        <h2 class="logo">Logo </h2>
        <nav class="navigation">
            <a href="https://nituk.ac.in/">Home </a>
            <a href="https://nituk.ac.in/history">About</a>
            <a href="https://nituk.ac.in/electronics-engineering">Department</a>
            <a href="https://nituk.ac.in/nituk-contact">Contact</a>
            <button class="btnlogin-popup">Login</button>
        </nav>
    </header>
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
                <label ><input type="checkbox">Remember Me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" value="login" class="btn">
            Login
            </button>
           
            <div class="login-register"><p>Don't Have an Account?<a href="#" class="register-link"> Register</a></p></div>
          </form>
       </div>



       <div class="form-box  register "><h2>Student Registration</h2>
        <form action="studentconnect.php" method="post">
                 

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
                <label ><input type="checkbox"> I agree to The Terms&Conditions</label>
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