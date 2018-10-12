<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
	
	mysqli_query($con,"delete from feedback where id='$info'");
	header('location:dashboard.php?info=feedback');
?>