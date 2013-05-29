<?php $pagetitle="Edit Center"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('center_id', $_POST))
	{
		$center_name = $_POST['center_name'];
		$center_code = $_POST['center_code'];
		$center_location = $_POST['center_location'];
		$center_address = $_POST['center_address'];
		$admin_first_name = $_POST['admin_first_name'];
		$admin_last_name = $_POST['admin_last_name'];
		$admin_email_id = $_POST['admin_email_id'];
		$admin_password = $_POST['admin_password'];
		$center_id = $_POST['center_id'];
		$admin_id = $_POST['admin_id'];
		$query = "update t_center_details set center_name = '$center_name', center_code = '$center_code', center_location = '$center_location', center_address = '$center_address' where center_id = '$center_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$query1 = "update t_admin set admin_first_name = '$admin_first_name', admin_last_name = '$admin_last_name', admin_email_id = '$admin_email_id', admin_password = '$admin_password' where admin_id = '$admin_id'";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		header('Location:dashboard.php');
	}
	else
	{            
		$center_id = $_REQUEST['center_id'];
		$query = "select t_center_details.center_name, t_center_details.center_code, t_center_details.center_location, t_center_details.center_address, t_center_details.admin_id, t_admin.admin_first_name, t_admin.admin_last_name, t_admin.admin_email_id, t_admin.admin_password from t_center_details join t_admin on t_center_details.admin_id = t_admin.admin_id where center_id = '$center_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		
	?>
	
		<h1 style="font-weight:lighter;">Edit Center Details</h1><hr>
		<div class="hero-unit">
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Edit Information</h3><br>
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<table class="table table-hover">
						<tr>
							<td style="color:#000000;"><label for="center_name">Center Name:</label></td>
							<td><input type="text" name="center_name" id="center_name" value="<?php echo $row['center_name']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="center_code">Center Code:</label></td>
							<td><input type="text" name="center_code" id="center_code" value="<?php echo $row['center_code']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="center_location">Center Location:</label></td>
							<td><input type="text" name="center_location" id="center_location" value="<?php echo $row['center_location']; ?>"></td>
						</tr> 
						<tr>
							<td style="color:#000000;"><label for="center_address">Center Address:</label></td>
							<td><input type="text" name="center_address" id="center_address" value="<?php echo $row['center_address']; ?>"></td>
						</tr>
						 <tr>
							<td style="color:#000000;"><label for="admin_first_name">Admin First Name:</label></td>
							<td><input type="text" name="admin_first_name" id="admin_first_name" value="<?php echo $row['admin_first_name']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="admin_last_name">Admin Last Name</label></td>
							<td><input type="text" name="admin_last_name" id="admin_last_name" value="<?php echo $row['admin_last_name']; ?>" ></tr>
						</tr> 
						<tr>
							<td style="color:#000000"><label for="admin_email_id">Admin Email Id:</label></td>
							<td><input type="text" name="admin_email_id" id="admin_email_id" value="<?php echo $row['admin_email_id']; ?>"></td>
						</tr>
                        <tr>
							<td style="color:#000000"><label for="admin_password">Admin Password:</label></td>
							<td><input type="password" name="admin_password" id="admin_password" ></td>
						</tr>
						<tr>
							<td style="color:#000000">
                            	<input type="hidden" name="center_id" value="<?php echo $center_id; ?>">
                                <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>">
                            </td>
							<td><input type="submit" class="btn btn-primary" style="margin-left:100px;" value="Save Changes"></td>
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