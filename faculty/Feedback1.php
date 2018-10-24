<?php
session_start();
include('../dbconfig.php');
error_reporting(1);

$user= $_SESSION['faculty_login'];
if($user=="")
{header('location:../home.php');}
$sql=mysqli_query($conn,"select * from faculty where email='$user' ");
$users=mysqli_fetch_assoc($sql);
?>


<?php

$q=mysqli_query($conn,"select * from feedback where faculty_id='".$_SESSION['faculty_login']."'");
$r=mysqli_num_rows($q);
if($r==false)
{
echo "<h3 style='color:Red'><center>No any records found ! </center></h3>";
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
        background-image: url('assets/img/image7.jpg');
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
                        Hello <?php echo $users['Name'];?>
                </a>
                <img src="images_f/f1.jpeg" style="width:200px;height:180px;border-radius:50%">

                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="Update_profile1.php">
                            <i class="pe-7s-user"></i>
                            <p>View/Edit Profile</p>
                        </a>
                    </li>



                    <li>
                              <a href="Feedback1.php">
                                 <i class="pe-7s-like2"></i>
                                 <p>Feedback</p>
                               </a>

                    </li>


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
                    <div class="row panel panel-default" style="padding:10px">
                        <div class="col-md-12" style="padding:10px">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Feedback from student's</h4>
                                </div>
                                <div class="content">

                                        <div class="row">


                                          <table class="table table-bordered">

                                          	<thead >

                                          	<tr class="success">
                                          		<th>Sr.No</th>
                                          		<th>Student</th>
                                          		<th>Teacher</th>
                                          		<th>Quest1</th>
                                          		<th>Quest2</th>
                                          		<th>Quest3</th>
                                          		<th>Quest4</th>
                                          		<th>Quest5</th>
                                          		<th>Quest6</th>
                                          		<th>Quest7</th>
                                          		<th>Quest8</th>
                                          		<th>Quest9</th>
                                          		<th>Quest10</th>
                                          		<th>Quest11</th>
                                          		<th>Quest12</th>
                                          		<th>Quest13</th>
                                          		<th>Quest14</th>
                                          		</tr>
                                          		</thead>

                                          		<?php
                                          		$i=1;
                                          	while($row=mysqli_fetch_array($q))
                                          		{
                                          			echo "<tr style='color:black'>";
                                          			echo "<td style='color:black'>".$i."</td>";
                                          			echo "<td>".Anonymous."</td>";
                                          			echo "<td>".$row[2]."</td>";
                                          			echo "<td>".$row[3]."</td>";
                                          			echo "<td>".$row[4]."</td>";
                                          			echo "<td>".$row[5]."</td>";
                                          			echo "<td>".$row[6]."</td>";
                                          			echo "<td>".$row[7]."</td>";
                                          			echo "<td>".$row[8]."</td>";
                                          			echo "<td>".$row[9]."</td>";
                                          			echo "<td>".$row[10]."</td>";
                                          			echo "<td>".$row[11]."</td>";
                                          			echo "<td>".$row[12]."</td>";
                                          			echo "<td>".$row[13]."</td>";
                                          			echo "<td>".$row[14]."</td>";
                                          			echo "<td>".$row[15]."</td>";
                                          			echo "<td>".$row[16]."</td>";
                                          			//echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
                                          			echo "</tr>";
                                          		$i++;
                                          		}

                                          		?>

                                          </table>


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
