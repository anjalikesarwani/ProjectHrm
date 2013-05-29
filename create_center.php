<?php $pagetitle="Create Center"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('center_code', $_POST))
	{
		$center_name = $_POST['center_name'];
		$center_code = $_POST['center_code'];
		$center_location = $_POST['center_location'];
		$center_address = $_POST['center_address'];
		$admin_email_id = $_POST['admin_email_id'];
		$admin_password = $_POST['admin_password'];
		$query = "select admin_email_id from t_admin";
		$result = mysql_query($query, $link) or die (mysql_error());
		$value = false;
		while($row = mysql_fetch_assoc($result))
		{
			if($admin_email_id == $row['admin_email_id'])
			{
				$value = true;
			
?>

				<div class="hero-unit">
    				<center><h1>This email Id is exist. Please enter another email Id.</h1></center>
    			</div>
                
<?php

			}
		}
		if($value == false)
		{
			$query1 = "insert into t_admin (admin_category, admin_email_id, admin_password) values ('admin', '$admin_email_id', '$admin_password')";
			$result1 = mysql_query($query1, $link) or die (mysql_error());
			$last_insert_id = mysql_insert_id();
			$query2 = "insert into t_center_details (admin_id, center_name, center_code, center_location, center_address) values ('$last_insert_id', '$center_name', '$center_code', '$center_location', '$center_address')";
			$result2 = mysql_query($query2, $link) or die (mysql_error());
			/***********send mail*******************/
			
			/*$to      = $admin_email_id;
			$subject = 'Confirmation message';
			$message = "Your login are created<br>Your login ID is : ".$admin_email_id."<br>Password is : ".$admin_password."<br>Here is a link of login page<a href=http://tata.hostei.com/tata/index.php>Click Here</a>";
			$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to, $subject, $message, $headers);*/
			
			/******************end ***************/
			/*echo "<script>alert('Your sign up link is given in your email.');
		          window.location.href='email_subscribe.php';</script>";*/
			header('Location:dashboard.php');
		}
	}
	else
	{

?>

<h1 style="font-weight:lighter;">Create Center</h1><hr>
<div class="hero-unit">
    <div class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7; width:500px;">
    <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Fill the details</h3><br>
      <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
      <span class="label label-info" style="margin:0 0 15px 0; font-size:14px;padding:5px;">Center Details</span>
      	<div class="row-fluid" style="margin-bottom:20px; width:400px;">
            <div class="span4">
            	<label for="center_name">Center Name:</label>
            </div>
            <div class="span3">
            	<input type="text" name="center_name" id="center_name" >
            </div>
        </div>
        <div class="row-fluid" style="margin-bottom:20px; width: 400px;">
            <div class="span4">
            	<label for="center_code">Center Code:</label>
            </div>
            <div class="span3">
            	<input type="text" name="center_code" id="center_code">
            </div>
        </div>
        <div class="row-fluid" style="margin-bottom:20px; width: 400px;">
            <div class="span4">
            	<label for="center_location">Center Location:</label>
            </div>
            <div class="span3">
            	<input type="text" name="center_location" id="center_location">
            </div>
        </div>
        <div class="row-fluid" style="margin-bottom:20px; width: 400px;">
            <div class="span4">
            	<label for="center_address">Center Address:</label>
            </div>
            <div class="span3">
            	<input type="text" name="center_address" id="center_address">
            </div>
        </div>
        <span class="label label-info" style="margin:0 0 15px 0; font-size:14px;padding:5px;">Center Admin Login Details</span>
        <!--<div class="row-fluid" style="margin-bottom:20px; width: 400px;">
            <div class="span4">
            	<label for="center_admin">Center Admin:</label>
            </div>
            <div class="span3">
            	<input type="text" name="center_admin" id="center_admin">
            </div>
        </div>-->
        <div class="row-fluid" style="margin-bottom:20px; width: 400px;">
            <div class="span4">
            	<label for="admin_id">Admin Email Id:</label>
            </div>
            <div class="span3">
            	<input type="text" name="admin_email_id" id="admin_email_id">
            </div>
        </div>
        <div class="row-fluid" style="margin-bottom:20px; width: 400px;">
            <div class="span4">
            	<label for="admin_password">Admin Password:</label>
            </div>
            <div class="span3">
            	<input type="password" name="admin_password" id="admin_password">
            </div>
        </div>
        <div class="row-fluid" style="margin-bottom:20px; width: 350px;">
            <div class="span4" style="float:right;">
            	<input type="submit" class="btn btn-primary" value="Create center">
            </div>
        </div>
      </form>
      </div>
</div>

<?php
	}
}
else
{
	
?>
	<div class="hero-unit">
    	<center><h1>Session is destroyed.Please again login.</h1></center>
    </div>
    
<?php

}

?>

<?php include("footer.php"); ?>