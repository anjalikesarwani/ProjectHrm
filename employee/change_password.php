<?php $pagetitle="Change Password"; include("header.php"); ?>

<?php

if(isset($_SESSION['emp_id']))
{
	$emp_id = $_SESSION['emp_id'];
	include('../connection_file/connect.php');
	$query = "select emp_first_name, post_id from t_employee_details where emp_id='$emp_id'";
	$result = mysql_query($query, $link) or die (mysql_error());
	$row = mysql_fetch_assoc($result);
	$post_id = $row['post_id'];
	$query1 = "select post_name from t_post_priority where post_id = '$post_id'";
	$result1 = mysql_query($query1, $link) or die (mysql_error());
	$row1 = mysql_fetch_assoc($result1);
	$post_name = $row1['post_name'];
	if(isset($_POST) && array_key_exists('new_emp_password', $_POST))
	{
		$emp_password = $_POST['emp_password'];
		$new_emp_password = $_POST['new_emp_password'];
		$new_c_emp_password = $_POST['new_c_emp_password'];
		$query1 = "select emp_password from t_employee_details where emp_id = '$emp_id'";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		$row1 = mysql_fetch_assoc($result1);
		if($emp_password == $row1['emp_password'])
		{
			if($new_emp_password != $new_c_emp_password)
			{
				echo "<script>alert('Password does not match.Please enter same password.');window.location.href='change_password.php';</script>";
			}
			else
			{
				$query2 = "update t_employee_details set emp_password = '$new_emp_password' where emp_id = '$emp_id'";
				$result2 = mysql_query($query2, $link) or die (mysql_error());
				header('Location:dashboard.php');
			}
		}
		else
		{
			echo "<script>alert('Your old password is incorrect.Please enter correct password for change.');window.location.href='change_password.php';</script>";
		}	
	}
	else
	{

?>

        <h1 style="font-weight:lighter;">Change Password</h1><hr>
        <div class="hero-unit">
            <div class="row-fluid">
                <div class="span3">
                    <div class="hero-unit" style="padding:1px 10px 0 10px; background-color:#f7f7f7;">
                        <h3 style="font-weight:lighter; font-size:28px;"><?php echo $row['emp_first_name']; ?></h3>
                        <span style="font-size:14px; font-weight:bold;"><u><?php echo $post_name; ?></u></span>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="dashboard.php">DashBoard</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle"data-toggle="dropdown">Operations </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Research</a></li>
                  				<li><a href="#">Extension</a></li>
                  				<li><a href="#">Procurement</a></li>
                                <li><a href="#">Processing</a></li>
                  				<li><a href="#">Marketing</a></li>
                                </ul>
                             </li>
                             <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle"data-toggle="dropdown">Approval </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Procurement Rate</a></li>
                  				<li><a href="#">Sales Rate</a></li>
                  				<li><a href="#">Extension</a></li>
                                <li><a href="#">Research</a></li>
                                </ul>
                             </li>
                             <li><a href="#">Sales</a></li>
                            <li><a href="#">Expanse</a></li>
                            <li><a href="#">Leave</a></li>
                            <li><a href="#">Tour</a></li>
                            <li><a href="#">Personal</a></li>
                            <li><a href="#">Report</a></li>
						<?php
                            if($post_name != 'Technical Officer')
                            {  
                        ?>                     
                            <li><a href="#">Pending Request</a></li>
                            <li><a href="#">Approved Request</a></li>
                        <?php
                            }
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="span9">
                    <div class="hero-unit" style="padding:1px 10px 0 10px ; background-color:#f7f7f7;">
                        <h3 style="font-weight:lighter; font-size:28px;">Change Password</h3><hr style="border-color:#e1dfdf;">
                        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <table class="table table-hover">
                            	<tr>
                                    <td style="color:#000000;border:none; "><label for="emp_password" style="font-size:18px;">Old Password:</label></td>
                                    <td style="padding-bottom:0px;border:none;"><input type="password" name="emp_password" id="emp_password"></td>
                                </tr>
                                <tr>
                                    <td style="color:#000000;border:none;"><label for="new_emp_password" style="font-size:18px;">Enter New Password:</label></td>
                                    <td style="padding-bottom:0px;border:none;"><input type="password" name="new_emp_password" ></td>
                                </tr>
                                <tr>
                                    <td style="color:#000000;border:none;"><label for="new_c_emp_password" style="font-size:18px;">Confirm Password:</label></td>
                                    <td style="padding-bottom:0px;border:none;"><input type="password" name="new_c_emp_password" ></td>
                                </tr>
                                <tr>
                                    <td style="color:#000000;border:none;"></td>
                                    <td style=" padding-bottom:0px;border:none;"><input type="submit" class="btn btn-primary" style=" margin-left:140px;" value="Change"></td>
                                </tr>
                            </table> 
                        </form>
                    </div>
                </div>
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