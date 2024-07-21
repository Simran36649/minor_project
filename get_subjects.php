<?php
// Include the database connection file
include("configASL.php");

// Check if the teacher parameter is set in the URL
if(isset($_GET['teacher'])||isset($_POST['aid'])) {
    // Get the value of the teacher parameter
    $teacher = $_GET['teacher'];

    // Prepare and execute a database query to fetch subjects taught by the selected teacher
    $query = "SELECT s1 FROM faculty WHERE name = '$teacher'";
    $result = mysqli_query($al, $query);

    if($result) {
        // Array to store the subjects taught by the teacher
        $subjects = array();

        // Fetch each subject and add it to the subjects array
        while($row = mysqli_fetch_assoc($result)) {
            $subjects[] = $row['s1'];
        }

        // Send the subjects array as a JSON response
        echo json_encode($subjects);
    } else {
        // If the query fails, return an error message
        echo json_encode(array('error' => 'Failed to fetch subjects'));
    }
} else {
    // If the teacher parameter is not set, return an error message
    echo json_encode(array('error' => 'Teacher parameter is missing'));
}
?>
