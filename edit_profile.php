<?php $pagetitle="Edit Profile"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('admin_first_name', $_POST))
	{
		$admin_first_name = $_POST['admin_first_name'];
		$admin_last_name = $_POST['admin_last_name'];
		$admin_email_id = $_POST['admin_email_id'];
		$admin_address = $_POST['admin_address'];
		$admin_contact = $_POST['admin_contact'];
		$query = "select admin_email_id from t_admin where admin_id != '$admin_id'";
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
			$query1 = "update t_admin set admin_first_name = '$admin_first_name', admin_last_name = '$admin_last_name', admin_email_id = '$admin_email_id', admin_address = '$admin_address', admin_contact = '$admin_contact' where admin_id = '$admin_id'";
			$result1 = mysql_query($query1, $link) or die (mysql_error());
			header('Location:dashboard.php');
		}
	}
	else
	{            
		$query = "select * from t_admin where admin_id = '$admin_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		
	?>
	
		<h1 style="font-weight:lighter;">Edit Profile</h1><hr>
		<div class="hero-unit">
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Edit Information</h3><br>
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<table class="table table-hover">
						<tr>
							<td style="color:#000000;"><label for="admin_first_name">First Name:</label></td>
							<td><input type="text" name="admin_first_name" value="<?php echo $row['admin_first_name']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="admin_last_name">Last Name:</label></td>
							<td><input type="text" name="admin_last_name"  value="<?php echo $row['admin_last_name']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="admin_email_id">Email Id:</label></td>
							<td><input type="text" name="admin_email_id" value="<?php echo $row['admin_email_id']; ?>"></td>
						</tr> 
						<tr>
							<td style="color:#000000;"><label for="admin_address">Address:</label></td>
							<td><input type="text" name="admin_address" value="<?php echo $row['admin_address']; ?>"></td>
						</tr>
						 <tr>
							<td style="color:#000000;"><label for="admin_contact">Contact:</label></td>
							<td><input type="text" name="admin_contact"value="<?php echo $row['admin_contact']; ?>"></td>
						</tr>
						<tr>
							<td style="color:#000000"></td>
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