<?php
// Connect to your database (replace these values with your actual database credentials)
$servername = "localhost";
$username = "id22011472_root";
$password = "Simran@123";
$dbname = "id22011472_check";






// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count students for each distinct subject
// $sql = "SELECT subject, COUNT(DISTINCT student) AS student_count
//         FROM feedgiven
//         GROUP BY subject";


$sql="SELECT count((roll)) as student_count ,name,subject FROM `feeds` group by name, subject";

$result = $conn->query($sql);
?>

   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="count.css?v=<?php echo time(); ?>">
    <title>Student Count by Subject</title>
   
</head>
<body>
<div class="content-wrapper">
<header>
      
        <div>
        <div class="title"></div>
           <div class="announce">
              </div>
            </div>
            
        </div>


</header>
 <div class="blur-container">

<table>
    
    <tr>
        <th>SUBJECT</th>
        <th>TEACHER</th>
        <th>STUDENT COUNT</th>
        
    </tr>
    <?php
    // Check if there are rows returned from the query
    if ($result->num_rows > 0) {
        // Loop through each row of the result
        while ($row = $result->fetch_assoc()) {
            // Print each row as a table row
            echo "<tr>";
            echo "<td>" . $row["subject"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
            
            echo "<td>" . $row["student_count"] . "</td>";
            echo "</tr>";
        }
    } else {
        // If no rows returned, print a message
        echo "<tr><td colspan='2'>No data found</td></tr>";
    }
    ?>
   
    

</table>
<br>
  <div class="game" >
    <a href="feeds.php" class="link" >
        Back
</a>
      </div>
<?php
// Close connection
$conn->close();
?>
</div>
</body>
</html>
