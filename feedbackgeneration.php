

<?php
include("configASL.php");
session_start();


if(!empty($_POST))
{
   
	$id=mysqli_real_escape_string($al,$_POST['id']);
	
	$sql=mysqli_query($al,"select * from studentcredential where id='$id' ");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['tname']=$_POST['tname'];
		header("location:/feedback__step_4.php");
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
    <link rel="stylesheet" href="feedbackstyle.css?v=<?php echo time(); ?>">
</head>
<body>
  
<div class="topHeader" >
  <img src="nit.png" class="img">
	<h2>National Institute Of Technology Uttarakhand</h2>
    <span class="tag"><h3>Generate Feedback Form<h3></span>
</div>
<div>
           
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
  
<br>
        
    
    </br>
        </br>
     
     
       <div    class="blur-container">
        
        <form   action="feedbackconnect.php" method="post">
          

      

            <div class="input-box">
               
            <h3>Generate feedback form</h3><br>
       
                    <label >Feedback Form Id:-Set Feedback form Id</label>  
                    <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tname"
                />
            </div>


            <div class="input-box">

               
                  <label >Question 1</label>
                  <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq1"
                  
                  />
                  </div>
                
         

            <div class="input-box">

                
            <label >Question 2</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq2"
                />
</div>

            <div class="input-box">
               
               
            <label >Question 3</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq3"
                />
</div>
            
            <div class="input-box">
                
              
            <label >Question 4</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq4"
                />
</div>

            
            <div class="input-box">
                
             
            <label >Question 5</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq5"
                />
</div>

            
            <div class="input-box">
               
               
            <label >Question 6</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq6"
                />
</div>


            
            <div class="input-box">
                
              
            <label >Question 7</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq7"
                />
</div>


                 
            <div class="input-box">
            
            <label >Question 8</label>
            
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq8"
                />
</div>


            
            <div class="input-box">
                
               
            <label >Question 9</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq9"
                />
</div>


            
            <div class="input-box">
                
              
            <label >Question 10</label>
            <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="tq10"
                />
</div>

                
          
                
            <br>
           </br></br>
          <button type="submit" value="login" class="btn">
            Submit 
            </button>
</br>
</br>
</br>
<button type="submit" value="login" class="btn"><a href="home.php"   class="btn">Back
           
</a></button>
         
          </form>
       </div>
    </div>



   
     <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>