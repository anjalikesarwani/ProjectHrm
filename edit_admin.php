<?php $pagetitle="Edit Center"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('center_admin_id', $_POST))
	{
		$admin_first_name = $_POST['admin_first_name'];
		$admin_last_name = $_POST['admin_last_name'];
		$admin_email_id = $_POST['admin_email_id'];
		$admin_password = $_POST['admin_password'];
		$admin_address = $_POST['admin_address'];
		$admin_contact = $_POST['admin_contact'];
		$center_admin_id = $_POST['center_admin_id'];
		$query = "update t_admin set admin_first_name = '$admin_first_name', admin_last_name = '$admin_last_name', admin_email_id = '$admin_email_id', admin_password = '$admin_password', admin_address = '$admin_address', admin_contact = '$admin_contact' where admin_id = '$center_admin_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		header('Location:dashboard.php');
	}
	else
	{            
		$center_admin_id = $_REQUEST['center_admin_id'];
		$query = "select t_admin.admin_first_name, t_admin.admin_last_name, t_admin.admin_email_id, t_admin.admin_password, t_admin.admin_address, t_admin.admin_contact, t_center_details.center_name, t_center_details.center_location from t_center_details join t_admin on t_center_details.admin_id = t_admin.admin_id where t_center_details.admin_id = '$center_admin_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		
	?>
	
		<h1 style="font-weight:lighter;">Edit Admin Details</h1><hr>
		<div class="hero-unit">
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Edit Information</h3><br>
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<table class="table table-hover">
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
							<td><input type="password" name="admin_password" id="admin_password"></td>
						</tr>
                        <tr>
							<td style="color:#000000;"><label for="admin_address">Admin Address:</label></td>
							<td><input type="text" name="admin_address" id="admin_address" value="<?php echo $row['admin_address']; ?>"></td>
						</tr>
                        <tr>
							<td style="color:#000000;"><label for="admin_contact">Admin Contact:</label></td>
							<td><input type="text" name="admin_contact" id="admin_contact" value="<?php echo $row['admin_contact']; ?>"></td>
						</tr>
                        <tr>
							<td style="color:#000000;"><label for="center_name">Center Name:</label></td>
							<td><input type="text" name="center_name" id="center_name" readonly="readonly" value="<?php echo $row['center_name']; ?>"></td>
						</tr>
						
						<tr>
							<td style="color:#000000;"><label for="center_location">Center Location:</label></td>
							<td><input type="text" name="center_location" id="center_location" readonly="readonly" value="<?php echo $row['center_location']; ?>"></td>
						</tr> 
						
						<tr>
							<td style="color:#000000">
                                <input type="hidden" name="center_admin_id" value="<?php echo $center_admin_id; ?>">
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