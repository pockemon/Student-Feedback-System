<?php
session_start();
 require('dbconfig.php');

 error_reporting(0);

 extract($_POST);
 if(isset($save))
 {

 	if($e=="" || $p=="")
 	{
 	$err="<font color='red'>fill all the fileds first</font>";
 	}
 	else
 	{

 $sql=mysqli_query($conn,"select * from faculty where email='$e' and password='$p'");

 $r=mysqli_num_rows($sql);

 if($r==true)
 {
 $_SESSION['faculty_login']=$e;
 header('location:faculty');
 }

 else
 {

 $err="<font color='red'>Invalid login details</font>";

 }
 }
 }

?>

<!DOCTYPE HTML>

<html>
	<head>
    <link rel="icon" type="image/png" href="images/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Online Feedback System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main_reg.css">

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
   <!-- Font special for pages-->
   <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Vendor CSS-->
   <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
   <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


    <style>

    body {
      width: 100%;
      color: #bfbfbf;
      background-size: cover;
      background: url("images/blur10.jpg");
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
    }

			input[type="radio"]{
    -webkit-appearance: radio;
    }
    </style>
	</head>



	<body>

    <header id="header" class="alt">
      <div class="logo"><a href="home.php">Welcome to <span> Online Feedback System</span></a></div>
      <a href="#menu">Menu</a>
    </header>

    <!-- Nav -->
    <nav id="menu">

      <ul class="links">

        <li style="color:#FFFFFF">
            <a style="color:#FFFFFF" href="home.php"><i class="fa fa-home fa-fw"></i>Home</a>
        </li>

        <li style="color:#FFFFFF">
            <a style="color:#FFFFFF" href="About1.php"><i class="fa fa-home fa-fw"></i>About</a>
        </li>

        <li style="color:#FFFFFF">
            <a style="color:#FFFFFF" href="Registration1.php"><i class="fa fa-home fa-fw"></i>Registration</a>
        </li>

        <li class="dropdown">
              <a style="color:#FFFFFF" href="#" class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-sign-in fa-fw"></i>Login
              <span class="caret"></span></a>
              <ul class="dropdown-menu">

                 <li><a href="Login1.php">Student</a></li>
                 <li><a href="Faculty_login1.php">Faculty</a></li>
                 <li><a href="admin_login.php">Admin</a></li>
             </ul>
         </li>


       </ul>
    </nav>

		<!-- One -->
			<div class="wrapper-style4" >
					<header class="align-center">
            <h2 style="color:white; margin-top: 40px; font-size: 40px">Faculty Login </h2>
					</header>
			</div>

    <div class="signup-form" style="padding: 10px 50px 50px 300px ">
    <div class="main-div">
      <div class="panel panel-default" style="padding: 50px 20px" >
      <!-- <h2 style="margin-top: 10px; margin-bottom: 20px; text-align: center; color:#ffffff">Student Signup</h2> -->
       <form id="signup" method="post">
           <div style="color: red "><?php

             echo @$err;

               ?>
           </div>


           <div class="form-group">
               <input type="email" class="form-control" id="inputEmail" style="color:white;font-size: 16px" placeholder="Email Address" name="e" required>
            </div>


            <div class="form-group">
                <input type="password" class="form-control" id="inputPassword" style="color:white;font-size: 16px" placeholder="Password" name="p" required>
            </div>


						<input type="submit" value="Login" class="btn btn-info" style=" background-color: #0066ff"  name="save"/>


        </form>
        </div>

    </div>
    </div>



		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrollex.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>
     <script src="vendor/select2/select2.min.js"></script>
     <script src="vendor/datepicker/moment.min.js"></script>
     <script src="vendor/datepicker/daterangepicker.js"></script>

     <!-- Main JS-->
     <script src="js/global.js"></script>


	</body>
</html>
