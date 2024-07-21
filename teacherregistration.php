

<?php
include("configASL.php");
session_start();

if(!isset($_SESSION['aid']))
{
    echo "<script>location='index.php'</script>";
    header("location:index.php");
}


if(!empty($_POST))
{
   
	$tname=mysqli_real_escape_string($al,$_POST['tname']);
	$pass=mysqli_real_escape_string($al,$_POST['pass']);
	$sql=mysqli_query($al,"select * from teachercredential where tname='$tname' and tpass='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['tname']=$_POST['tname'];
		header("location:/sample/feeds.php");
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
    <link rel="stylesheet" href="styleindex.css?v=<?php echo time(); ?>">

</head>
<body>
    <header>
    <div>
              <div class="title"></div>
            <div class="announce">
              <div class="row"><marquee><h5>Welcome to NIT Uttarakhand's Student Feedback System</h5></marquee>
                 <nav class="navigation">
                  <div class="n">
                   <a href="https://nituk.ac.in/" class="nav-item">Home </a>
                   <a href="https://nituk.ac.in/history" class="nav-item">About</a>
                   <a href="https://nituk.ac.in/electronics-engineering" class="nav-item">Department</a>
                   <a href="https://nituk.ac.in/nituk-contact" class="nav-item">Contact</a>
                 </div>
                 <div class="l"> <button class="btnlogin-popup">Registration</button></div>
               </nav>
              </div>
            </div>
        </div>
    
    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
       <div class="form-box  login"><h2>Teacher Registration</h2>
        <form action="#" method="post" >
     
            <div class="login-register"><p><a href="#" class="register-link"><u> Register</u></a></p></div>
          </form>
       </div>



       <div class="form-box  register "><h2>Teacher Registration</h2>
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
                  type="email"
                  class="form-control"
                  id="tid"
                  name="temail"
                />
                    <label > Email ID</label>
                 
                
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
            </br>
</br>
          <button type="submit" value="login" class="btn">
            Register
            </button>

            <div class="login-register"><p><a href="#" class="login-link"> </a></p></div>
          </form>
       </div>


    </div>
</header>
     <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>