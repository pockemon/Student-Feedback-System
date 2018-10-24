<?php
	include('../dbconfig.php');
	session_start();

	unset($_SESSION['admin']);
	header('location:../home.php');

?>
