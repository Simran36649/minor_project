<?php
include("configASL.php");
session_start();

if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}

$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$num_rows = mysqli_num_rows($x);
if($num_rows == 0){
    ?>
        <script type="application/javascript">
		alert('Wrong Username');
		</script>
        <?php } 


else{

$y=mysqli_fetch_array($x);
$name=$y['name'];
$old=$y['password'];

if(!empty($_POST))
{
	$p1=sha1($_POST['p1']);
	$p2=sha1($_POST['p2']);
	if($old==$p1)
	{
		$u=mysqli_query($al,"update admin set password='$p2' where aid='$aid'");
	}
	if($u==true)
	{
		?>
        <script type="application/javascript">
		alert('Successfully changed password');
		</script>
        <?php } else { ?> <script type="application/javascript">
		alert('Incorrect old password');
		</script><?php }
}
}
		
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<link  rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
<header>
        <div>
              <div class="title"></div>
            <div class="announce">
              <div class="row"><marquee><h2>Welcome to NIT Uttarakhand's Student Feedback System</h2></marquee>
                 <nav class="navigation">
                  <div class="n">
                   <a href="https://nituk.ac.in/" class="nav-item">Home </a>
                   <a href="https://nituk.ac.in/history" class="nav-item">About</a>
                   <a href="https://nituk.ac.in/electronics-engineering" class="nav-item">Department</a>
                   <a href="https://nituk.ac.in/nituk-contact" class="nav-item">Contact</a>
                 </div>
                 
               </nav>
              </div>
            </div>
            
        </div>
</header>
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
<form method="post" action="" >
<div id="table">
<div class="tr">
		<div class="td">
        	<label>User Name: </label>
        </div><br>
        <div class="td">
			<input type="text" name="name"  required placeholder="Enter The Username" />
        </div>
    </div><br>
	<div class="tr">
		<div class="td">
        	<label>Old Password : </label>
        </div><br>
        <div class="td">
			<input type="password" name="p1" size="25" required placeholder="Enter Old Password" />
        </div>
    </div><br>
    <div class="tr">
		<div class="td">
        	<label>New Password : </label>
        </div>
        <br>
        <div class="td">
			<input type="password" name="p2" size="25" required placeholder="Enter New Password" />
        </div>
    </div>
</div><br>
		
        <div class="tdd">
        	<input type="submit" value="CHANGE PASSWORD" />
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