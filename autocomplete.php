<?php
include "configASL.php"; // Include your database connection file

if (isset($_POST['query'])) {
    $search_query = $_POST['query'];
    
    // Perform a search in the database based on the input query
    $sql = "SELECT * FROM faculty WHERE name LIKE '%$search_query%'";
    $result = mysqli_query($al, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="autocomplete-item">' . $row['name'] . '</div>';
        }
    } else {
        echo '<div class="autocomplete-item">No results found</div>';
    }
}
?>
