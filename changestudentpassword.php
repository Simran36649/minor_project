<?php
include("configASL.php");

session_start();

//$aid=$_SESSION['aid'];


if(isset($_POST['name'])) {


$name=$_POST['name'];

$name=strtoupper($name);

$x=mysqli_query($al,"select * from studentcredential where tname='$name'");
$num_rows = mysqli_num_rows($x);
if($num_rows == 0){
    ?>
        <script type="application/javascript">
		alert('Wrong Username');
		window.location="changestudentpassword.php";
		</script>
        <?php } 


else{

$y=mysqli_fetch_array($x);
$name=$y['tname'];
$name=strtoupper($name);
$old=$y['tpass'];

if(!empty($_POST))
{
	$p1=($_POST['p1']);
	$p2=($_POST['p2']);
	

  if($old!=$p2)
  {
	if($old==$p1)
	{
		
		$u=mysqli_query($al,"update studentcredential set tpass='$p2' where tname='$name'");
	}
	if($u==true)
	{
		
		
			?>
        <script type="text/javascript">

		alert("Successfully Changed");
		</script>
			echo "<script> location='studententer.php' </script>";
    header("location:index.php");
      <?php
		
		
		
		
       
        } 
        
		else { 
				?>
        <script type="text/javascript">
		alert("Incorreect Old Passowrd");
		</script>
			echo "<script> location='studententer.php' </script>";
      <?php
		

		}
}
else
{
	?>
        <script type="application/javascript">
		alert('Enter Different password');
		</script>
        <?php } 
}
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
                   <a href="https://nituk.ac.in/" class="nav-item1">Home </a>
                   <a href="https://nituk.ac.in/history" class="nav-item1">About</a>
                   <a href="https://nituk.ac.in/electronics-engineering" class="nav-item1">Department</a>
                   <a href="https://nituk.ac.in/nituk-contact" class="nav-item1">Contact</a>
                 </div>
                 
               </nav>
              </div>
            </div>
            
        </div>
</header>

<div id="content" align="center">
<br><br>
<span class="SubHead">Change Password</span>
<br><br>
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
	<div class="tr">
		<div class="td">
        	<label>Old Password : </label>
        </div>
        <div class="td">
			<input type="password" name="p1" size="25" placeholder="Enter Old Password" />
			<br>
			<br>
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>New Password : </label>
        </div>
        
        <div class="td">
			<input type="password" name="p2" size="25" placeholder="Enter New Password" />
			<br></br>
        </div>
    </div>
</div>
		
        <div class="tdd">
        	<input type="submit" value="CHANGE PASSWORD" />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		    <input type="button" onClick="window.location='home.php'" value="BACK">
        </div><br><br>
		
    <br></br>
<br>
<br>

     <br>


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