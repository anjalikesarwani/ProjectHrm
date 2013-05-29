<?php $pagetitle="Edit Employee"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('emp_id', $_POST))
	{
		$emp_first_name = $_POST['emp_first_name'];
		$emp_last_name = $_POST['emp_last_name'];
		$emp_email_id = $_POST['emp_email_id'];
		$emp_password = $_POST['emp_password'];
		$post_name = $_POST['post_name'];
		$emp_address = $_POST['emp_address'];
		$emp_contact = $_POST['emp_contact'];
		$emp_id = $_POST['emp_id'];
		$query = "select post_id from t_post_priority where post_name = '$post_name'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		$post_id = $row['post_id'];
		$query1 = "update t_employee_details set emp_first_name = '$emp_first_name', emp_last_name = '$emp_last_name', emp_email_id = '$emp_email_id', emp_password = '$emp_password', post_id = '$post_id', emp_address = '$emp_address', emp_contact = '$emp_contact' where emp_id = '$emp_id'";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		header('Location:dashboard.php');
	}
	else
	{            
		$emp_id = $_REQUEST['emp_id'];
		$query = "select emp_first_name, emp_last_name, emp_email_id, emp_address, emp_contact, post_id from t_employee_details where emp_id = '$emp_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		$post_id = $row['post_id'];
		$query1 = "select post_name from t_post_priority where post_id = '$post_id'";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		$row1 = mysql_fetch_assoc($result1);
		
	?>
	
		<h1 style="font-weight:lighter;">Edit Employee Details</h1><hr>
		<div class="hero-unit">
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Edit Information</h3><br>
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<table class="table table-hover">
						<tr>
							<td style="color:#000000;"><label for="emp_first_name">Employee First Name:</label></td>
							<td><input type="text" name="emp_first_name" id="emp_first_name" value="<?php echo $row['emp_first_name']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="emp_last_name">Employee Last Name:</label></td>
							<td><input type="text" name="emp_last_name" id="emp_last_name" value="<?php echo $row['emp_last_name']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="emp_email_id">Employee Email Id:</label></td>
							<td><input type="text" name="emp_email_id" id="emp_email_id" value="<?php echo $row['emp_email_id']; ?>"></td>
						</tr> 
						<tr>
							<td style="color:#000000;"><label for="emp_password">Employee Password:</label></td>
							<td><input type="password" name="emp_password" id="emp_password" ></td>
						</tr>
						 <tr>
							<td style="color:#000000;"><label for="post_name">Employee Post:</label></td>
							<td>
                            	<select name="post_name">
                                	<option value="<?php echo $row1['post_name']; ?>"><?php echo $row1['post_name']; ?></option>
                                    <option value="Technical Officer">Technical Officer</option>
                                    <option value="Senior Technical Officer">Senior Technical Officer</option>
                                    <option value="Assistant Director">Assistant Director</option>
                                    <option value="Deputy Director">Deputy Director</option>
                                    <option value="Center In Charge">Center In Charge</option>
                                    <option value="Joint Director">Joint Director</option>
                                    <option value="Additional Director">Additional Director</option>
                                    <option value="Director">Director</option>
                            	</select>
                            </td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="emp_address">Employee Address</label></td>
							<td><input type="text" name="emp_address" id="emp_address" value="<?php echo $row['emp_address']; ?>" ></tr>
						</tr> 
						<tr>
							<td style="color:#000000"><label for="emp_contact">Employee Contact:</label></td>
							<td><input type="text" name="emp_contact" id="emp_contact" value="<?php echo $row['emp_contact']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000">
                            	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
                            </td>
							<td><input type="submit" class="btn btn-primary"  style="margin-left:100px;" value="Save Changes"></td>
						</tr>
					</table>
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