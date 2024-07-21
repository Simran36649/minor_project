<?php
include("configASL.php");
$conn=mysqli_connect("localhost","id22011472_root","Simran@123","id22011472_check");
session_start();

$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

//$id=$_POST['id'];
$id=1;


if(!empty($_POST['teachername']))
{
    
    $subject=$_POST['subject'];
   $teachername=$_POST['teachername'];
  

    $sql = "SELECT faculty_id FROM faculty WHERE name = '$teachername' AND s1 = '$subject' ";
   $result = mysqli_query($al, $sql);
    $row = mysqli_fetch_assoc($result);
        // Store the faculty_id
        $faculty_id = $row['faculty_id'];

if (empty($faculty_id)) {
    	    	?>
        <script type="text/javascript">
		alert("Incorrect Subject Chosen For Teacher  ");
		</script>
			echo "<script> location='feeds.php' </script>";
    header("location:feeds.php");
      <?php
    
}
	//Fetch Name
	
	$name = mysqli_fetch_array(mysqli_query($al,"SELECT * FROM faculty WHERE faculty_id='$faculty_id' "));
	
	$subject=$_POST['subject'];
	 
	$sql=mysqli_query($al,"select * from feeds where faculty_id='$faculty_id' AND subject='$subject' AND roll='$id' ");

	$num=mysqli_num_rows($sql);

	
	if($num >= 1)
	{
	
	}
	else
	{
	    	?>
        <script type="text/javascript">
		alert("Yet No Student Given the feedback  ");
		</script>
			echo "<script> location='feeds.php' </script>";
    header("location:feeds.php");
      <?php
	}
  $s=0;
          
	while($z=mysqli_fetch_array($sql))
	{
		$q1 = $q1 + $z['q1'];
		$q2 = $q2 + $z['q2'];
		$q3 = $q3 + $z['q3'];
		$q4 = $q4 + $z['q4'];
		$q5 = $q5 + $z['q5'];
		$q6 = $q6 + $z['q6'];
		$q7 = $q7 + $z['q7'];
		$q8 = $q8 + $z['q8'];
		$q9 = $q9 + $z['q9'];
		$q10 = $q10 + $z['q10'];
		$s++;
	}
    
    $val=2.8;
    $vall=2.79;
    


	$total = ($q1/$s) + ($q2/$s)  + ($q3/$s)  + ($q4/$s)  + ($q5/$s)  + ($q6/$s)  +($q7/$s)  + ($q8/$s)  + ($q9/$s)  + ($q10/$s) ;
    $total=number_format(($total/10),2);


 
$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q1='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g5=($row["count"]/$s)*100;
    //echo "Count of people with score 5: " . $g5;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q1='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g4=($row["count"]/$s)*100;
	
   // echo "Count of people with score 4 : " . $g4;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q1='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g3=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g3;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q1='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g2=($row["count"]/$s)*100;
   // echo "Count of people with score 2 : " . $g2;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q1='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g1=($row["count"]/$s)*100;
//    echo "Count of people with score 1 : " . $g1;
}




//Question 2


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q2='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g25=($row["count"]/$s)*100;
  //  echo "Count of people with score 5: " . $g25;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q2='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g24=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g24;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q2='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g23=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g23;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q2='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g22=($row["count"]/$s)*100;
    //echo "Count of people with score 2 : " . $g22;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q2='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g21=($row["count"]/$s)*100;
    //echo "Count of people with score 1 : " . $g21;
}


//Question 3







$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q3='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g35=($row["count"]/$s)*100;
//    echo "Count of people with score 5: " . $g35;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q3='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g34=($row["count"]/$s)*100;
	
  //  echo "Count of people with score 4 : " . $g34;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q3='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g33=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g33;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q3='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g32=($row["count"]/$s)*100;
    //echo "Count of people with score 2 : " . $g32;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q3='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g31=($row["count"]/$s)*100;
    //echo "Count of people with score 1 : " . $g31;
}




//Question 4


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q4='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g45=($row["count"]/$s)*100;
//    echo "Count of people with score 5: " . $g45;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q4='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g44=($row["count"]/$s)*100;
	
  //  echo "Count of people with score 4 : " . $g44;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q4='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g43=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g43;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q4='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g42=($row["count"]/$s)*100;
//    echo "Count of people with score 2 : " . $g42;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q4='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g41=($row["count"]/$s)*100;
  //  echo "Count of people with score 1 : " . $g41;
}





//Question 5







$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q5='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g55=($row["count"]/$s)*100;
    //echo "Count of people with score 5: " . $g55;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q5='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g54=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g54;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q5='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g53=($row["count"]/$s)*100;
//    echo "Count of people with score 3 : " . $g53;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q5='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g52=($row["count"]/$s)*100;
  //  echo "Count of people with score 2 : " . $g52;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q5='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g51=($row["count"]/$s)*100;
    //echo "Count of people with score 1 : " . $g51;
}


//Question 6



$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q6='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g65=($row["count"]/$s)*100;
    //echo "Count of people with score 5: " . $g65;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q6='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g64=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g64;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q6='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g63=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g63;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q6='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g62=($row["count"]/$s)*100;
    //echo "Count of people with score 2 : " . $g62;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q6='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g61=($row["count"]/$s)*100;
//    echo "Count of people with score 1 : " . $g61;
}





//Question 7



$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q7='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g75=($row["count"]/$s)*100;
  //  echo "Count of people with score 5: " . $g75;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q7='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g74=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g74;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q7='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g73=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g73;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q7='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g72=($row["count"]/$s)*100;
   // echo "Count of people with score 2 : " . $g72;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q7='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g71=($row["count"]/$s)*100;
   // echo "Count of people with score 1 : " . $g71;
}






//Question 8



$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q8='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g85=($row["count"]/$s)*100;
    //echo "Count of people with score 5: " . $g85;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q8='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g84=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g84;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q8='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g83=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g83;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q8='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g82=($row["count"]/$s)*100;
    //echo "Count of people with score 2 : " . $g82;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q8='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g81=($row["count"]/$s)*100;
    //echo "Count of people with score 1 : " . $g81;
}






//Question 9



$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q9='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g95=($row["count"]/$s)*100;
   // echo "Count of people with score 5: " . $g95;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q9='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g94=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g94;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q9='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g93=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g93;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q9='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g92=($row["count"]/$s)*100;
    //echo "Count of people with score 2 : " . $g92;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q9='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g91=($row["count"]/$s)*100;
    //echo "Count of people with score 1 : " . $g91;
}




//Question 6



$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q10='5' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g105=($row["count"]/$s)*100;
    //echo "Count of people with score 5: " . $g105;

}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q10='4' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g104=($row["count"]/$s)*100;
	
    //echo "Count of people with score 4 : " . $g104;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q10='3' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g103=($row["count"]/$s)*100;
    //echo "Count of people with score 3 : " . $g103;
}

$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q10='2' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g102=($row["count"]/$s)*100;
//    echo "Count of people with score 2 : " . $g102;
}


$sql5 = "SELECT COUNT(*) as count FROM feeds where faculty_id='$faculty_id'  AND roll='$id'  AND q10='1' ";
$result = $conn->query($sql5);
while($row = $result->fetch_assoc()) {
	$g101=($row["count"]/$s)*100;
  //  echo "Count of people with score 1 : " . $g101;
}

}






?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Feedback System</title>
<link  rel="stylesheet" type="text/css" href="feed2.css?v=<?php echo time(); ?>">   
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body>
<div class="topHeader" >
<img src="nit.png" class="img">
	<h2>National Institute Of Technology Uttarakhand</h2>
    <span class="tag"><h3>Feedback Report<h3></span>
</div>
<br>

<div id="content" align="center" style="width: 900px;">
<br>
<br>
<div class="blur-container">
<span class="SubHead">Student Feedback</span>
<br>
<br>



	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>


<table   border="0" cellpadding="4" cellspacing="4">
<tr><td style="font-weight:bold;">Faculty Name : </td><td><?php echo $name['name'];?></td></tr>
<tr><td style="font-weight:bold;">Subject : </td><td><?php echo $subject;?></td></tr>
<tr><td style="font-weight:bold;">1. <?php echo $row['q1'];?> :</td><td><?php echo number_format(($q1/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">2.<?php echo $row['q2'];?>: </td><td><?php echo number_format(($q2/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">3. <?php echo $row['q3'];?>: </td><td><?php echo number_format(($q3/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">4. <?php echo $row['q4'];?> : </td><td><?php echo number_format(($q4/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">5. <?php echo $row['q5'];?>: </td><td><?php echo number_format(($q5/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">6. <?php echo $row['q6'];?> : </td><td><?php echo number_format(($q6/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">7. <?php echo $row['q7'];?> : </td><td><?php echo number_format(($q7/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">8. <?php echo $row['q8'];?> : </td><td><?php echo number_format(($q8/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">9. <?php echo $row['q9'];?> : </td><td><?php echo number_format(($q9/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">10.<?php echo $row['q10'];?>: </td><td><?php echo number_format(($q10/($s)),2);?></td></tr>
<tr><td style="font-weight:bold;">Total Students :</td><td><?php echo $s;?></td></tr>
<tr><td style="font-weight:bold;">Overall Performance in scale of 1-5 :</td><td><?php echo ($total);?></td></tr>
<tr><td style="font-weight:bold;" colspan="2" align="center"></td></tr>
	<tr><td colspan="2">
    	<?php $cc = mysqli_query($al, "SELECT * FROM comments WHERE faculty_id = '".$faculty_id."' ORDER BY id DESC");
		while($pr = mysqli_fetch_array($cc))
		{
			echo "~".$pr['comment']."~";
		}
		?></td></tr>
    
    <tr><td style="font-weight:bold;" colspan="2" align="center">Achievements</td></tr>
	<tr><td colspan="2">
    	<?php 
        if($val<=number_format(($q1/($s)),2))
        {
             
            echo ($row['q1']."<br>");

        }
       
        if($val<=number_format(($q2/($s)),2))
        {
            echo $row['q2']."<br>";
        }
        
        if($val<=number_format(($q3/($s)),2))
        {
            echo $row['q3']."<br>";
        }
        if($val<=number_format(($q4/($s)),2))
        {
            echo $row['q4']."<br>";
        }
        
        if($val<=number_format(($q5/($s)),2))
        {
            echo $row['q5']."<br>";
        }
        if($val<=number_format(($q6/($s)),2))
        {
            echo $row['q6']."<br>";
        }
        if($val<=number_format(($q7/($s)),2))
        {
            echo $row['q7']."<br>";
        }  if($val<=number_format(($q8/($s)),2))
        {
            echo $row['q8']."<br>";
        }
        if($val<=number_format(($q9/($s)),2))
        {
            echo $row['q9']."<br>";
        }
   
		?>
        <tr><td style="font-weight:bold;" colspan="2" align="center">Points of Improvement</td></tr>
	<tr><td colspan="2">
    	<?php 
        if($vall>=number_format(($q1/($s)),2))
        {
            echo ($row['q1']."<br>");

        }
       
        if($vall>=number_format(($q2/($s)),2))
        {
            echo $row['q2']."<br>";
        }
        if($vall>=number_format(($q3/($s)),2))
        {
            echo $row['q3']."<br>";
        }
        if($vall>=number_format(($q4/($s)),2))
        {
            echo $row['q4']."<br>";
        }
        
        if($vall>=number_format(($q5/($s)),2))
        {
            echo $row['q5']."<br>";
        }
        if($vall>=number_format(($q6/($s)),2))
        {
            echo $row['q6']."<br>";
        }
        if($vall>=number_format(($q7/($s)),2))
        {
            echo $row['q7']."<br>";
        }
        if($vall>=number_format(($q8/($s)),2))
        {
            echo $row['q8']."<br>";
        }
        if($vall>=number_format(($q9/($s)),2))
        {
            echo $row['q9']."<br>";
        }
   
		?>
		
		
		
		
		
		



<br>
<br>
<input type="button" onClick="window.print();" value="PRINT">&nbsp;<input type="button" onClick="window.location='feeds.php'" value="BACK">
<br>
<br>

	</div>
    </td>
    </tr>
    
    
    
        


</table>
			 
</div>








<div class="comment">

<h2>Comments Of Student</h2>
    <table>
      
        <tr>
            
            <th>Comments</th>
        </tr>
        <?php
            // Connect to database
        
            include("configASL.php");
             $conn=new mysqli("localhost","id22011472_root","Simran@123","id22011472_check");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
           
               $asd=$name['name'];
               echo($asd);
               echo "<br>";
               echo($subject);
                  
            $sql = " select comment from comments where id='$asd' AND faculty_id='$subject' ";
          
            $result = $conn->query($sql);
         
            if ($result->num_rows > 0) 
            {
                // Output data of each row
               
   
                while($row = $result->fetch_assoc()) 
                {
                    
                    echo "<tr>";
                    $row["comment"]=strtoupper($row["comment"]);
                 
                    echo "<td style='padding-left: 20px;'>".$row["comment"]."</td>";

                    echo "</tr>";
                    $counter++; // Increment the counter
                }
            } 
            else {
                echo "<tr><td colspan='2'>0 results</td></tr>";
            }

            $conn->close();
        ?>
    </table>

    </div>











<figure class="highcharts-figure">
    <div id="containerr"></div>
    <p class="highcharts-description">
        
    </p>
</figure>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container1"></div>
    <p class="highcharts-description"> 
    </p>
</figure>

<figure class="highcharts-figure">
    <div id="container2"></div>
    <p class="highcharts-description">  
    </p>
</figure>

<figure class="highcharts-figure">
    <div id="container3"></div>
    <p class="highcharts-description">
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container4"></div>
    <p class="highcharts-description">
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container5"></div>
    <p class="highcharts-description">
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container6"></div>
    <p class="highcharts-description">
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container7"></div>
    <p class="highcharts-description">
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container8"></div>
    <p class="highcharts-description">
    </p>
</figure>


<figure class="highcharts-figure">
    <div id="container9"></div>
    <p class="highcharts-description">
    </p>
</figure>






<script>

Highcharts.chart('containerr', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'ALL Question Overal Pie Chart Analysis:  ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Question 1',
            y: <?PHP echo  round($q1/$s) ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Question 2',
            y:<?PHP echo  round($q2/$s)?>
        },  {
            name: 'Question 3',
            y:<?PHP echo  round($q3/$s)?>
        }, {
            name: 'Question 4',
            y:<?PHP echo  round($q4/$s)?>
        }, {
            name: 'Question 5',
            y:<?PHP echo  round($q5/$s)?>
        }, {
            name: 'Question 6',
            y:<?PHP echo  round($q6/$s)?>
        }, {
            name: 'Question 7',
            y:<?PHP echo  round($q7/$s)?>
        }, {
            name: 'Question 8',
            y:<?PHP echo  round($q8/$s)?>
        }, {
            name: 'Question 9',
            y:<?PHP echo  round($q9/$s)?>
        }, {
            name: 'Question 10',
            y:<?PHP echo  round($q10/$s)?>
        }
        ]
    }]
});
    </script>























<script>

  Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
   
    title: {
        text: 'Question 1 ' ,
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g5 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g4?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g3 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g2 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g1 ?>
        }
        ]
    }]
});
    </script>




















<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
          
        text: ' Question 1 :<?php echo $row['q1'];?>  ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g5 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g4?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g3 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g2 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g1 ?>
        }
        ]
    }]
});
    </script>



<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 2: <?php echo $row['q2'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g25 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g24?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g23 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g22 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g21 ?>
        }
        ]
    }]
});
    </script>




<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 3: <?php echo $row['q3'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g35 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g34?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g33 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g32 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g31 ?>
        }
        ]
    }]
});
    </script>





<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container3', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 4: <?php echo $row['q4'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g45 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g44?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g43 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g42 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g41 ?>
        }
        ]
    }]
});
    </script>





<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container4', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 5: <?php echo $row['q5'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g55 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g54?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g53 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g52 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g51 ?>
        }
        ]
    }]
});
    </script>




<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container5', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 6: <?php echo $row['q6'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g65 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g64?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g63 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g62 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g61 ?>
        }
        ]
    }]
});
    </script>



<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container6', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 7: <?php echo $row['q7'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g75 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g74?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g73 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g72 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g71 ?>
        }
        ]
    }]
});
    </script>





<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container7', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Question 8: <?php echo $row['q8'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g85 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g84?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g83 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g82 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g81 ?>
        }
        ]
    }]
});
    </script>



<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container8', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: true,
        type: 'pie'
    },
    title: {
        text: 'Question 9: <?php echo $row['q9'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g95 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g94?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g93 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g92 ?>
        },
		{
            name: 'Poor',
            y: <?PHP echo  $g91 ?>
        }
        ]
    }]
});
    </script>





<script>
	<?php
			$x=mysqli_query($al,"select * from questions where id='$id'");

				$row = $x->fetch_assoc();
			
			 ?>
    Highcharts.chart('container9', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
      
    title: {
        text: 'Question 10: <?php echo $row['q10'];?> ',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Scaling',
        colorByPoint: true,
        data: [{
            name: 'Excellent',
            y: <?PHP echo  $g105 ?>,
            sliced: true,
            selected: true
        },  {
            name: 'Best',
            y:<?PHP echo  $g104?>
        },  {
            name: 'Better',
            y: <?PHP echo  $g103 ?>
        },{
            name: 'Good',
            y: <?PHP echo  $g102 ?>
        },
		{
            name: 'Poor ',
            y: <?PHP echo  $g101 ?>
        }
        ]
    }]
});
    </script>





</body>
</html>




