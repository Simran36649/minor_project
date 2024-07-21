<?php
include("configASL.php");
session_start();
require_once ('vendor/autoload.php');

if(!isset($_SESSION['aid'])) {
    
    echo "Session expired, please login again.";
    exit();
}




if (!empty($_POST['fc']) && !empty($_POST['sub'])) {
    $fc = $_POST['fc'];
    $sub = $_POST['sub'];

    foreach ($sub as $subject) {

        $faculty_id = uniqid();

         $s=strtoupper($fc);
         $d=strtoupper($subject);

        $insert_query = "INSERT INTO faculty (faculty_id, name, s1) VALUES ('$faculty_id', '$s', '$d')";

        if(mysqli_query($al, $insert_query)) {
            
        } else {
            echo "Error adding faculty: " . mysqli_error($al);
        }
    }
    echo ("Successfully Added");
} else {
    echo "Please fill all required fields.";
}
?>