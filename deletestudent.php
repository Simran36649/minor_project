<?php
include("configASL.php");

$id=$_GET['del'];
mysqli_query($al,"TRUNCATE TABLE users");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='manageFaculty.php';
</script>
