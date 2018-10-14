<?php
include('../dbconfig.php');

	$info=$_GET['id'];

	mysqli_query($conn,"delete from faculty where id='$info'");
	header('location: show_faculty1.php');
?>
