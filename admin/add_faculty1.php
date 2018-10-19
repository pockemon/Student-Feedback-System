<?php
include('../dbconfig.php');

$user= $_SESSION['user'];
if($user=="")
{header('location:../home.php');}

	extract($_POST);
	if(isset($save))
	{
		if(strlen($mob)<10 || strlen($mob)>10)
		{
		$err="<font color='red'><center>Mobile number must be 10 digit</center></font>";
		}
		else
		{

		$temp=substr($name,0,4);
		$temp1=substr($mob,0,4);
		$user_name=$temp.$temp1;

$q=mysqli_query($conn,"select * from faculty where email='$email'");
	$r=mysqli_num_rows($q);
	if($r)
	{
	$err="<font color='red'><center>This email already exists choose diff email.</center></font>";
	}
	else
	{
		mysqli_query($conn,"insert into faculty values('','$user_name','$name','$Designation','$prg','$sem','$email','$pass','$mob',now(),'0')");

	$subject ="New User Account Creation";
	$from="info@phptpoint.com";
	$message ="User name: ".$user_name." Password ".$pass;
    $headers = "From:".$from;
    mail($email,$subject,$message,$headers);

	$err="<font color='green'><center>New Faculty Successfully Added.</center></font>";
	}
	}
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Faculty Feedback System</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style>

      .wrapper{
        background-image: url('assets/img/dbbg4.jpeg');
        background-size: cover;
        background-repeat: no-repeat;

      }

      .panel-default
      {
        background-color: white;
        margin-left: 50px;
        margin-right: 50px;
        padding: 10px 10px;

      }

    </style>

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Hello Admin
                     </a>
                     <br>
                     <!--<img src = "../../images/<?php echo $users['email']; ?>/<?php echo $users['image']; ?>" style="width:100px; height:500px"> -->

                </div>
                <br>
                <ul class="nav">
                    <li class="active">
                        <a href="Index1.php">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <br>

                    <li class="dropdown" style="color:black">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-user fa-fw"></i><p>
                              Faculty
                              <b class="caret"></b>
                          </p>

                      </a>
                      <ul class="dropdown-menu" style="background-color: black">
                          <li><a href="add_faculty1.php"><i class="fa fa-plus fa-fw" style="height: 2px;width:2px;margin-right:50px;color:white"></i>Add Faculty</a></li>
                          <li><a href="show_faculty1.php"><i class="fa fa-eye"  style="height: 2px;width:2px;margin-right:50px;color:white"></i>Manage Faculty </a></li>
                      </ul>
                    </li>
                    <br>


                    <li class="dropdown" style="color:black">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-user fa-fw"></i><p>
                              Student
                              <b class="caret"></b>
                          </p>

                      </a>
                      <ul class="dropdown-menu" style="background-color: black">
                          <li><a href="display_student1.php"><i class="fa fa-plus fa-fw" style="height: 2px;width:2px;margin-right:50px;color:white"></i>Manage Student</a></li>
                      </ul>
                    </li>
                    <br>

                    <li class="dropdown" style="color:black">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user fa-book"></i>
                              Feedback
                              <b class="caret"></b>
                          </p>

                      </a>
                      <ul class="dropdown-menu" style="background-color: black">
                        <li><a href="feedback1.php"><i class="fa fa-eye" style="height: 2px;width:2px;margin-right:50px;color:white"></i>Feedback</a></li>
                        <li><a href="feedback_average1.php"><i class="fa fa-eye"  style="height: 2px;width:2px;margin-right:50px;color:white"></i> Feedback Average </a></li>
                      </ul>
                    </li>
                    <br>




                </ul>
            </div>
        </div>

        <div class="main-panel">
          <nav class="navbar navbar-inverse navbar-fixed">
              <div class="container-fluid">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                      <a class="navbar-brand" href="#">Dashboard</a>
                  </div>
                  <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav navbar-left">
                          <li>
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-dashboard"></i>
                                  <p class="hidden-lg hidden-md">Dashboard</p>
                              </a>
                          </li>


                      </ul>

                      <ul class="nav navbar-nav navbar-right">

                          <li>
                              <a href="logout.php">
                                  <p>Log out</p>
                              </a>
                          </li>
                          <li class="separator hidden-lg"></li>
                      </ul>
                  </div>
              </div>
          </nav>

          <form method="post" style="margin-top: 80px">
            <div style="color: red "><?php

              echo @$err;

                ?>
            <div class="content" >
                <div class="container-fluid">
                    <div class="row panel panel-default">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title" style="color:orange">Add Faculty</h4>
                                </div>
                                <div class="content">

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><b> Name </b></label>
                                                    <input type="text" class="form-control" placeholder="name" value="<?php echo @$name;?>" name="name" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><b> Designation </b></label>
                                                    <input type="text" class="form-control" placeholder="Designation"  value="<?php echo @$Designation;?>" name="Designation" required>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mobile Number</label>
                                                    <input type="number" class="form-control" placeholder="Mobile Number" value="<?php echo @$mob;?>" maxlength="10" name="mob"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Email Address</label>
                                                  <input type="email" class="form-control" placeholder="Email Address" value="<?php echo @$email;?>"  name="email" required>
                                              </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">

                                                  <div class="form-group">
                                                    <label>Program</label>
                                                    <select class="form-control" id="inputProgram" style="font-size: 16px" placeholder="Program" name="prg" value="<?php echo @$prg;?>">

                                                      <option style="color:black">MCA</option>
                                                      <option style="color:black">BCA</option>
                                                      <option style="color:black">B.Tech</option>
                                                      <option style="color:black">M.Tech</option>

                                                    </select>

                                                  </div>

                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">

                                                  <label>Semester</label>
                                                  <select class="form-control" id="inputSemester" style="font-size: 16px" placeholder="Semester" name="sem" required>

                                                    <option style="color:black">i</option>
                                                    <option style="color:black">ii</option>
                                                    <option style="color:black">iii</option>
                                                    <option style="color:black">iv</option>
                                                    <option style="color:black">v</option>
                                                    <option style="color:black">vi</option>
                                                    <option style="color:black">vii</option>
                                                    <option style="color:black">viii</option>

                                                  </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                  <label>Password</label>
                                                  <input type="password" class="form-control" placeholder="Password" value="<?php echo @$pass;?>"  name="pass" required>
                                              </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
                                              </div>
                                            </div>

                                        </div>



                            </div>
                        </div>
                      </div>

                </div>
            </div>
          </div>

        </form>



        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
