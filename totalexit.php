<?php
// Start the session
session_start();

// Unset a specific session variable (if needed)
unset($_SESSION['tname']); // Unset the session variable 'tname'

// Unset or destroy the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session data

// Redirect the user to another page or display a message
header("Location: index.php"); // Redirect to the homepage or any other page
exit; // Make sure no further code is executed after redirection
?>
