<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

?>





<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script defer src="homescript.js"></script>
  
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="admin.css?v=<?php echo time(); ?>">
</head>

<body>
<div class="content-wrapper">
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


      


  <div class="navbar">
    <div class="navbar-nav">
    
      <div class="nav-item">
      <div class="i1"></div>
        <a href="feeds.php" class="nav-link">
          <svg>
            
            <g class="fa-group">
              <path
                
              ></path>
              
              <path
               
              ></path>
            </g>
          </svg>
          
          <span class="link-text"> Feedback  </span>
         
        </a>
      </div>
               

      <div class="nav-item">
      <div class="i2"></div>
        <a href="feedbackgeneration.php" class="nav-link">
          <svg
           
          >
            <g class="fa-group">
              <path
              ></path>
              <path
               
              ></path>
            </g>
          </svg>
          <span class="link-text"> Feedback <br> &nbsp &nbsp &nbsp &nbsp Generation  </span>
         
        </a>
      </div>




      <div class="nav-item">
      <div class="i3"></div>
        <a href="manageFaculty.php" class="nav-link">
          <svg
           
          >
            <g class="fa-group">
              <path
                
              ></path>
              <path
               
              ></path>
            </g>
          </svg>
          <span class="link-text">Manage <br>&nbsp &nbsp &nbsp &nbsp &nbsp Faculty</span>
        </a>
      </div>
    

      <div class="nav-item">
      <div class="i4"></div>
        <a href="changePass.php" class="nav-link">
          <svg
           
          >
            <g class="fa-group">
              <path
                
              ></path>
              <path
               
              ></path>
            </g>
          </svg>
          <span class="link-text">Password</span>
        </a>
      </div>

    </div>
    <div class="box">
 
      <div class="nav-item">
      <div class="i5"></div>
        <a href="teacherregistration.php" class="nav-link">
          <svg
           
          >
            <g class="fa-group">
              <path
                
              ></path>
              <path
               
              ></path>
            </g>
          </svg>
          <span class="link-text"> Teacher <br> &nbsp &nbsp &nbsp &nbsp Registration  </span>
         
        </a>
      </div>
                    

      
      <div class="nav-item">
      <div class="i6"></div>
        <a href="managestudent.php" class="nav-link">
          <svg
           
          >
            <g class="fa-group">
              <path
                
              ></path>
              <path
               
              ></path>
            </g>
          </svg>
          <span class="link-text">Student<br> &nbsp &nbsp &nbsp &nbsp Registration</span>
        </a>
      </div>


       

      <div class="nav-item">
      <div class="i7"></div>
        <a href="logout.php" class="nav-link">
          <svg
           
          >
            <g class="fa-group">
              <path
                
              ></path>
              <path
               
              ></path>
            </g>
          </svg>
          <span class="link-text">LogOut</span>
        </a>
      </div>

     

             
  
      <div>
      <form  method="post" action="loginpermission.php" >
      <div class="blur-container" style="height:100px">
      <p >Want to take feedback from students? </p>
      <button type="submit" name="answer" value="yes" >Yes</button>
      <button type="submit" name="answer" value="no">No</button>
      </div>
      </form>
      </div>
</div>
</div>
                


 

 










  <script src="homescript.js"></script>
</div>
</body>