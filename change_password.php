<?php $pagetitle="change Password"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('new_admin_password', $_POST))
	{
		$admin_password = $_POST['admin_password'];
		$new_admin_password = $_POST['new_admin_password'];
		$new_c_admin_password = $_POST['new_c_admin_password'];
		$query = "select admin_password from t_admin where admin_id = '$admin_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		if($admin_password == $row['admin_password'])
		{
			if($new_admin_password != $new_c_admin_password)
			{
				echo "<script>alert('Password does not match.Please enter same password.');window.location.href='change_password.php';</script>";
			}
			else
			{
				$query1 = "update t_admin set admin_password = '$new_admin_password' where admin_id = '$admin_id'";
				$result1 = mysql_query($query1, $link) or die (mysql_error());
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
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Change</h3><br>
				<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
					<table class="table table-hover">
                    	<tr>
							<td style="color:#000000;"><label for="admin_password">Old Password:</label></td>
							<td><input type="password" name="admin_password"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="new_admin_password">New Password:</label></td>
							<td><input type="password" name="new_admin_password"></td>
						</tr>
						<tr>
							<td style="color:#000000;"><label for="new_c_admin_password">Confirm Password:</label></td>
							<td><input type="password" name="new_c_admin_password"></td>
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