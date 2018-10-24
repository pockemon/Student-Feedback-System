<?php
session_start();
unset($_SESSION['faculty_login']);
header('location:../home.php');
?>
