

<?php
include("configASL.php");
session_start();
if(isset($_SESSION['aid']))
{
	header("location:home.php");
}
if(!empty($_POST))
{
	$aid=mysqli_real_escape_string($al,$_POST['aid']);
	$pass=mysqli_real_escape_string($al,sha1($_POST['pass']));
	$sql=mysqli_query($al,"select * from admin where aid='$aid' and password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['aid']=$_POST['aid'];
		header("location:home.php");
        exit;
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect Admin ID or Password");
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
    <link rel="stylesheet" href="styleindex.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <div>
              <div class="title"></div>
            <div class="announce">
              <div class="row"><marquee><h2 class="h">Welcome to NIT Uttarakhand's Student Feedback System</h2></div></marquee>
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
        
        <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        <div class="form-box  login"><h2>Admin Login</h2>
        <form method="post" action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="text" name="aid" size="25" required />
                    <label >Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="pass" size="25" required />
                    <label >Password</label>
            </div>
            <div class="remember-forgot">
                <a href="studententer.php">Student Login</a>
                <a href="teacherenter.php">Teacher Login</a>
            </div>
            <button type="submit" value="login" class="btn">
            Login
            </button>
            <div class="login-register"><p>Don't Have an Account?<a href="#" class="register-link"> Contact NITUK</a></p></div>
          </form>
       </div>
   <div id="content" align="center">
<br>
<br>
       <div class="form-box  register "><h2>Registration</h2>
        <form action="#">
            <div class="input-box">
                <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required>
                    <label >Username</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required>
                    <label >Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required>
                    <label >Password</label>
            </div>
            <div class="remember-forgot">
                <label ><input type="checkbox"> I agree to The Terms&Conditions</label>
            </div>
            <button type="submit" class="btn">
            Register
            </button>
            <div class="login-register"><p>Already Have an Account?<a href="" class="login-link"> Login</a></p></div>
          </form>
       </div>
    </div>
    </header>
   <div class="message">
   <div class="image">
      </div>
      <div class="m">
    
   ABOUT NIT UTTARAKHAND
   <br><br>
   Established in 2009 under the Act of Parliament by the Ministry of Education, NITUK is a burgeoning institute of national importance, 
   situated in the state of Uttarakhand (known as Devbhumi) amidst the serene and magnificent Himalayas. The impeccable geographical 
   location endows natural advantage to the institution and boosts leaning, which is greatly reflected in the institute’s excellent 
   teaching- learning ambience, young and dedicated faculty, and significant contribution to research work and commitment to the
   community.<br><br>

   
      
      </div>
    </div>
    <div class=" footer">
        <h5><pre></pre></h5>
    </div>
    
     <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>