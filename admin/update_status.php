<?php
include('../dbconfig.php');
	
	$user_id=$_GET['user_id'];
	$status=$_GET['status'];
	if($status)
	{
	mysqli_query($conn,"update faculty SET status='0' where id='$user_id'");
	header('location:dashboard.php?info=show_faculty');
	}
	else
	{
	mysqli_query($conn,"update faculty SET status='1' where id='$user_id'");
	header('location:dashboard.php?info=show_faculty');
	}
	
	?>