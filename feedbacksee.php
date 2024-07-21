<?php
include("configASL.php");
session_start();

$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$name=$y['name'];

$id = $_POST['id'];

if(!empty($_POST))
{
	$faculty_id=$_POST['faculty_id'];
	//Fetch Name
	$name = mysqli_fetch_array(mysqli_query($al,"SELECT * FROM faculty WHERE faculty_id='".$faculty_id."'"));
	$subject=$_POST['subject'];
	$sql=mysqli_query($al,"select * from feeds where faculty_id='$faculty_id' AND subject='$subject'");



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
	$total = round($q1/$s) + round($q2/$s)  + round($q3/$s)  + round($q4/$s)  + round($q5/$s)  + round($q6/$s)  + round($q7/$s)  + round($q8/$s)  + round($q9/$s)  + round($q10/$s) ;
    $total=round(($total/50)*100);
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>
<link href="feed2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="topHeader" >
	<h2>National Institute Of Technology Uttarakhnad</h2>
    <span class="tag"><h3>Feedback Report<h3></span>
</div>
<br>

<div id="content" align="center" style="width:600px;">
<br>
<br>
<div class="blur-container">
<span class="SubHead">Student Feedback</span>
<br>
<br>


<table   border="0" cellpadding="4" cellspacing="4">
<tr><td style="font-weight:bold;">Faculty Name : </td><td><?php echo $name['name'];?></td></tr>
<tr><td style="font-weight:bold;">Subject : </td><td><?php echo $subject;?></td></tr>



<tr><td style="font-weight:bold;">1. Description of course objectives &amp; assignments :</td><td><?php echo round($q1/$s);?></td></tr>
<tr><td style="font-weight:bold;">2. Communication of ideas &amp; information : </td><td><?php echo round($q2/$s);?></td></tr>
<tr><td style="font-weight:bold;">3. Expression of expectations for performance : </td><td><?php echo round($q3/$s);?></td></tr>
<tr><td style="font-weight:bold;">4. Availability to assist students in or out of class : </td><td><?php echo round($q4/$s);?></td></tr>
<tr><td style="font-weight:bold;">5. Respect or concern for students : </td><td><?php echo round($q5/$s);?></td></tr>
<tr><td style="font-weight:bold;">6. Stimulation of interest in course : </td><td><?php echo round($q6/$s);?></td></tr>
<tr><td style="font-weight:bold;">7. Facilitation of learning : </td><td><?php echo round($q7/$s);?></td></tr>
<tr><td style="font-weight:bold;">8. Enthusiasm for the subject : </td><td><?php echo round($q8/$s);?></td></tr>
<tr><td style="font-weight:bold;">9. Encourage students to think independently, creatively &amp; critically : </td><td><?php echo round($q9/$s);?></td></tr>
<tr><td style="font-weight:bold;">10. Overall rating : </td><td><?php echo round($q10/$s);?></td></tr>
<tr><td style="font-weight:bold;">Total Students :</td><td><?php echo $s;?></td></tr>
<tr><td style="font-weight:bold;">Total Percent % :</td><td><?php echo ($total);?></td></tr>
<tr><td style="font-weight:bold;" colspan="2" align="center">Comments</td></tr>





<?php
			$x=mysqli_query($al,"select * from questions");
			while($id=mysqli_fetch_array($x))
			{
			 ?>
         echo "0 results";
             <?php 
            } ?>





















	<tr><td colspan="2">


    	<?php $cc = mysqli_query($al, "SELECT * FROM comments WHERE faculty_id = '".$faculty_id."' ORDER BY id DESC");
		while($pr = mysqli_fetch_array($cc))
		{
			echo "~".$pr['comment']."~";
		}
		?>
    </td>
    </tr>
</table>
<br>
<br>
<input type="button" onClick="window.print();" value="PRINT">&nbsp;<input type="button" onClick="window.location='feeds.php'" value="BACK">
<br>
<br>
	</div>

</div>
</body>
</html>