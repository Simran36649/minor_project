<?php
include("configASL.php");

$id=$_GET['del'];
mysqli_query($al,"TRUNCATE TABLE feeds");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='feeds.php';
</script>
