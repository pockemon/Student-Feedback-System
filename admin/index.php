<?php
session_start();

include('../dbconfig.php');

if(!isset($_SESSION['user']))
{header('location:../home.php');}

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

      .main-panel{
        background-image: url('assets/img/dbbg4.jpeg');
        background-size: cover;
        background-repeat: no-repeat;

      }

    </style>

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">


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


            <div class="content" style="">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-3">

                        </div>

                        <div class="col-md-5">
                            <div class="card">

                                   <h1>Hello Admin </h3>

                                    <hr>
                                    <h3>Welcome to your dashboard </h3>

                            </div>
                        </div>

                        <div class="col-md-4">

                        </div>


                    </div>

                    <div class="row">

                      <div class="col-md-3">

                      </div>

                      <div class="col-md-5">
                          <div class="card">


                      <?php
                      //all complaints
                      $qq=mysqli_query($conn,"select * from faculty ");
                      $rows=mysqli_num_rows($qq);
                      echo "<h2 style='color: #00ff00'>Total Number of Faculty : $rows</h2>";

                      //all emegency compalints
                      $q=mysqli_query($conn,"select * from user");
                      $r1=mysqli_num_rows($q);
                      echo "<h2 style='color:orange'>Total Number of Student : $r1</h2>";


                      //all users
                      $q2=mysqli_query($conn,"select * from feedback");
                      $r2=mysqli_num_rows($q2);
                      echo "<h2 style='color:black'>Total Number feedback given by users  : $r2</h2>";




                      ?>


                                                  </div>
                                              </div>


                    </div>
                </div>





            </div>
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
