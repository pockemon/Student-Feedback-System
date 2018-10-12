<?php
error_reporting(1);
	include('../dbconfig.php');
	extract($_POST);
	if(isset($save))
	{	
		if(strlen($mob)<10 || strlen($mob)>10)
		{
		$err="<font color='red'>Mobile number must be 10 digit</font>";
		}
		else
		{
		//for auto genrate Password
		/*
		$x=rand(1,99);
		$p= md5($x);
		$pass=substr($p,1,6);
		*/
		//for user_alias
		$temp=substr($name,0,4);
		$temp1=substr($mob,0,4);
		$user_name=$temp.$temp1;
		
$q=mysqli_query($conn,"select * from faculty where email='$email'");
	$r=mysqli_num_rows($q);	
	if($r)
	{
	$err="<font color='red'>This email already exists choose diff email.</font>";
	}
	else
	{	
		mysqli_query($conn,"insert into faculty values('','$user_name','$name','$Designation','$prg','$sem','$email','$pass','$mob',now(),'0')");
		
	$subject ="New User Account Creation";
	$from="info@phptpoint.com";
	$message ="User name: ".$user_name." Password ".$pass;
    $headers = "From:".$from;
    mail($email,$subject,$message,$headers);
		
	$err="<font color='green'>New Faculty Successfully Added.</font>";
	}
	}
}	

?>


<h1 class="page-header">Add Faculty</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" value="<?php echo @$name;?>" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Designation:</label>
            	<input type="text" value="<?php echo @$Designation;?>" name="Designation" class="form-control" required>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email :</label>
            	<input type="email" value="<?php echo @$email;?>"  name="email" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password" value="<?php echo @$pass;?>"  name="pass" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Programme:</label>
  <input type="text"  name="prg" value="<?php echo @$prg;?>" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Semester</label>
  <select name="sem" class="form-control" required>
					
					<option>i</option>
					<option>ii</option>
					<option>iii</option>
					<option>iv</option>
					<option>v</option>
					<option>vi</option>
					<option>vii</option>
					<option>viii</option>
					</select>
        </div>
    </div>
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob" value="<?php echo @$mob;?>" class="form-control" maxlength="10" name="mob"  required>
        </div>
  	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Add New Faculty">
        </div>
  	</div>
	</form>


</div>