<?php
session_start();
include('../dbconfig.php');
error_reporting(0);

$user= $_SESSION['user'];
if($user=="")
{header('location:../home.php');}
$sql=mysqli_query($conn,"select * from user where email='$user' ");
$users=mysqli_fetch_assoc($sql);
//print_r($users);
?>

<?php
extract($_POST);
if(isset($sub))
{
$user=$_SESSION['user'];

$sql=mysqli_query($conn,"select * from feedback where student_id='$user' and faculty_id='$faculty'");
$r=mysqli_num_rows($sql);

if($r==true)
{
echo "<font color='blue' size='5px'><center>You already given feedback to this faculty</center></font>";
}
else
{
$query="insert into feedback values('','$user','$faculty','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$quest11','$quest12','$quest13','$quest14',now())";

mysqli_query($conn,$query);

echo "<font color='blue' size='5px'><center>Thank you for your feedback</h2></center></font>";
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
        background-image: url('assets/img/image7.jpg');
        background-size: cover;
        background-repeat: no-repeat;

      }

      .panel-default
      {
        background-color: white;
        margin-left: 50px;
        margin-right: 10px;
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
                        Hello <?php echo $users['name'];?>
                </a>
                <img src = "../images/<?php echo $users['email']; ?>/<?php echo $users['image']; ?>" style="width:200px;height:180px;border-radius:50%">

                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="update_profile1.php">
                            <i class="pe-7s-user"></i>
                            <p>View/Edit Profile</p>
                        </a>
                    </li>

                    <li>
                          <a href="update_password1.php">
                             <i class="pe-7s-lock"></i>
                             <p>Update Password </p>
                          </a>

                    </li>

                    <li>
                              <a href="give_feedback1.php">
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



            <div class="content" style="margin-top: 8px">
              <form method="post">
                <div style="color: red "><?php

                  echo @$err;

                    ?>
              <h3 ><center>Please give your answer about the following question by circling the given grade on the scale:</center></h3><br>

              <div class="row">
                <button type="button" style="margin-left: 200px;font-size:10px;color:white;background-color:green;border:2px solid #336600;padding:3px">Strongly Agree 5</button>
                <button type="button" style="margin-left: 20px;font-size:10px;color:white;background-color:Brown;border:2px solid #336600;padding:3px">Agree 4</button>
                <button type="button" style="margin-left: 20px;font-size:10px;color:white;background-color:blue;border:2px solid #336600;padding:3px">Neutral 3</button>
                <button type="button" style="margin-left: 20px;font-size:10px;color:white;background-color:Black;border:2px solid #336600;padding:3px"> Disagree 2</button>
                <button type="button" style="margin-left: 20px;font-size:10px;color:white;background-color:red;border:2px solid #336600;padding:3px">Strongly Disagree 1</button><br>

            </div>

                <div class="container-fluid">
                    <div class="row panel panel-default">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Give Your Feedback</h4>
                                </div>
                                <div class="content">


                                        <div class="row">
                                          <div class="col-md-6">

                                            <label>Select Faculty </label>
                                            <select name="faculty" class="form-control">
                                            	<?php
                                            $sql=mysqli_query($conn,"select * from faculty where semester='".$users['semester']."'");
                                            	while($r=mysqli_fetch_array($sql))
                                            	{
                                            	echo "<option value='".$r['email']."'>".$r['Name']."</option>";
                                            	}
                                            		 ?>
                                            </select>

                                          </div>
                                        </div>
                                        <br>

                                        <div class="row">


                                                <div class="form-group" style="padding-left: 5px">
                                                    <h4 style="color:black"><b>1.Course Material </b></h4>

                                                    <p style="color:black">Teacher provided the course outline having weekly content plan with list of  required text book:
                                                    <input style="margin-left: 40px"type="radio" name="quest1" value="5" required> 5
                                                    <input type="radio" name="quest1" value="4">4
                                                    <input type="radio" name="quest1" value="3"> 3
                                                    <input type="radio" name=" quest1" value="2">2
                                                    <input type="radio" name="quest1" value="1">1 </p>

                                                    <p style="color:black">Course objectives,learning outcomes and grading criteria are clear to me:
                                                      <input style="margin-left: 180px" type="radio" name="quest2" value="5" required>5
                                                        <input type="radio" name="quest2" value="4">4
                                                        <input type="radio" name="quest2" value="3">3
                                                      <input type="radio" name=" quest2" value="2">2
                                                      <input type="radio" name="quest2" value="1">1 </p>

                                                    <p style="color:black">Course integrates throretical course concepts with the real world examples:
                                                      <input  style="margin-left: 170px" type="radio" name="quest3" value="5" required> 5
                                                        <input type="radio" name="quest3" value="4">4
                                                        <input type="radio" name="quest3" value="3"> 3
                                                      <input type="radio" name="quest3" value="2">2
                                                      <input type="radio" name="quest3" value="1">1 </p>


                                              </div>
                                            </div>
                                              <br>

                                              <div class="row">

                                              <div class="form-group" style="padding-left: 5px">
                                                  <h4 style="color:black"><b>2-Class Teaching </b></h4>

                                                  <p style="color:black"> Teacher is punctual,arrives on time and leaves on time:
                                                    <input style="margin-left: 310px" type="radio" name="quest4" value="5" required> 5
                                                      <input type="radio" name="quest4" value="4">4
                                                      <input type="radio" name="quest4" value="3"> 3
                                                    <input type="radio" name="quest4" value="2">2
                                                    <input type="radio" name="quest4" value="1">1 </p>

                                                  <p style="color:black">Teacher is good at stimulating the interest in the course content:
                                                    <input style="margin-left: 250px"  type="radio" name="quest5" value="5" required> 5
                                                    <input type="radio" name="quest5" value="4">4
                                                      <input type="radio" name="quest5" value="3"> 3
                                                    <input type="radio" name="quest5" value="2">2
                                                    <input type="radio" name="quest5" value="1">1 </p>

                                                  <p style="color:black"> Teacher is good at explaining the subject matter:
                                                    <input  style="margin-left: 350px" type="radio" name="quest6" value="5" required> 5
                                                     <input type="radio" name="quest6" value="4">4
                                                     <input type="radio" name="quest6" value="3"> 3
                                                   <input type="radio" name=" quest6" value="2">2
                                                   <input type="radio" name="quest6" value="1">1 </p>

                                                   <p style="color:black"> Teacher's presentation was clear,loud ad easy to understand:
                                                     <input  style="margin-left: 270px" type="radio" name="quest7" value="5" required> 5
                                                       <input type="radio" name="quest7" value="4">4
                                                       <input type="radio" name="quest7" value="3"> 3
                                                     <input type="radio" name="quest7" value="2">2
                                                     <input type="radio" name="quest7" value="1">1 </p>


                                                    <p style="color:black"> Teacher is good at using innovative teaching methods/ways:
                                                      <input  style="margin-left: 270px" type="radio" name="quest8" value="5" required> 5
                                                        <input type="radio" name="quest8" value="4">4
                                                        <input type="radio" name="quest8" value="3">3
                                                      <input type="radio" name="quest8" value="2">2
                                                      <input type="radio" name="quest8" value="1">1 </p>

                                                     <p style="color:black">Teacher is available and helpful during counseling hours:
                                                       <input style="margin-left: 290px" type="radio" name="quest9" value="5" required>5
                                                         <input type="radio" name="quest9" value="4">4
                                                         <input type="radio" name="quest9" value="3"> 3
                                                       <input type="radio" name="quest9" value="2">2
                                                       <input type="radio" name="quest9" value="1">1 </p>

                                                      <p style="color:black"> Teacher has competed the whole course as per course outline:
                                                        <input style="margin-left: 260px" type="radio" name="quest10" value="5" required> 5
                                                         <input type="radio" name="quest10" value="4">4
                                                         <input type="radio" name="quest10" value="3"> 3
                                                       <input type="radio" name="quest10" value="2">2
                                                       <input type="radio" name="quest10" value="1">1 </p>



                                            </div>
                                            <br>
                                        </div>

                                        <div class="row">

                                        <div class="form-group" style="padding-left: 5px">
                                            <h4 style="color:black"><b>3-Class Assessment</b></h4>

                                            <p style="color:black"> Teacher was always fair and impartial:
                                              <input style="margin-left: 420px" type="radio" name="quest11" value="5" required> 5
                                               <input type="radio" name="quest11" value="4">4
                                               <input type="radio" name="quest11" value="3"> 3
                                             <input type="radio" name="quest11" value="2">2
                                             <input type="radio" name="quest11" value="1">1 </p>

                                            <p style="color:black">Assessments conducted are clearly connected to maximize learining objectives:
                                              <input style="margin-left: 120px" type="radio" name="quest12" value="5" required> 5
                                               <input type="radio" name="quest12" value="4">4
                                               <input type="radio" name="quest12" value="3"> 3
                                             <input type="radio" name="quest12" value="2">2
                                             <input type="radio" name="quest12" value="1">1 </p>


                                            <p style="color:black"> What i liked about the course </p>
                                            <textarea style="margin-left: 320px;color:black" name="quest13" rows="5" cols="60" id="comments">
                                            </textarea>

                                            <p style="color:black"> What i disliked about the course </p>
                                            <textarea style="margin-left: 320px;color:black" name="quest14" rows="5" cols="60" id="comments">
                                            </textarea>

                                      </div>
                                      <br>


                                  </div>
                                  <p align="center"><button type="submit"  class="btn btn-warning"  name="sub">Submitt</button></p>

                                  </div>
                            </div>
                        </div>
                      </div>
                </div>
              </form>
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
