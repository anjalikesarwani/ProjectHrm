<?php $pagetitle="Create Employee"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('employee_email_id', $_POST))
	{
		$employee_email_id = $_POST['employee_email_id'];
		$employee_password = $_POST['employee_password'];
		$employee_post = $_POST['employee_post'];
		$query3 = "select emp_email_id from t_employee_details";
		$result3 = mysql_query($query3, $link) or die (mysql_error());
		$value = false;
		while($row3 = mysql_fetch_assoc($result3))
		{
			if($employee_email_id == $row3['emp_email_id'])
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
			$query = "select post_id from t_post_priority where post_name = '$employee_post'";
			$result = mysql_query($query, $link) or die (mysql_error());
			$row = mysql_fetch_assoc($result);
			$post_id = $row['post_id']; 
			$query1 = "select center_id from t_center_details where admin_id = '$admin_id'";
			$result1 = mysql_query($query1, $link) or die (mysql_error());
			$row1 = mysql_fetch_assoc($result1);
			$center_id = $row1['center_id']; 
			$query2 = "insert into t_employee_details (center_id, post_id, emp_email_id, emp_password) values ('$center_id', '$post_id', '$employee_email_id', '$employee_password')";
			$result2 = mysql_query($query2, $link) or die (mysql_error());
			/***********send mail*******************/
			
			/*$to      = $employee_email_id;
			$subject = 'Confirmation message';
			$message = "Your login are created<br>Your login ID is : ".$employee_email_id."<br>Password is : ".$employee_password."<br>Here is a link of login page<a href=http://localhost/responsive/index.php></a>";
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

        <h1 style="font-weight:lighter;">Create Employee</h1><hr>
        <div class="hero-unit">
            <div class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7; width:500px;">
            <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Fill the details</h3><br>
              <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="row-fluid" style="margin-bottom:20px; width: 430px;">
                    <div class="span4">
                        <label for="employee_email_id">Employee Email Id:</label>
                    </div>
                    <div class="span3">
                        <input type="text" name="employee_email_id" id="employee_email_id">
                    </div>
                </div>
                <div class="row-fluid" style="margin-bottom:20px; width: 430px;">
                    <div class="span4">
                        <label for="employee_password">Employee Password:</label>
                    </div>
                    <div class="span3">
                        <input type="password" name="employee_password" id="employee_password">
                    </div>
                </div>
                <div class="row-fluid" style="margin-bottom:20px; width: 430px;">
                    <div class="span4">
                        <label for="employee_post">Employee Post:</label>
                    </div>
                    <div class="span3">
                        <select name="employee_post">
                        	<option value="Technical Officer">Technical Officer</option>
                            <option value="Senior Technical Officer">Senior Technical Officer</option>
                            <option value="Assistant Director">Assistant Director</option>
                            <option value="Deputy Director">Deputy Director</option>
                            <option value="Center In Charge">Center In Charge</option>
                            <option value="Joint Director">Joint Director</option>
                            <option value="Additional Director">Additional Director</option>
                            <option value="Director">Director</option>
                        </select>
                    </div>
                </div>
                <div class="row-fluid" style="margin-bottom:20px; width: 350px;">
                    <div class="span4" style="float:right;">
                        <input type="submit" class="btn btn-primary" value="Create Employee">
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