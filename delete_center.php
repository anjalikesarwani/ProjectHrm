<?php $pagetitle="Delete Center"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('center_id', $_POST))
	{
		$center_id = $_POST['center_id'];
		$admin_id = $_POST['admin_id'];
		$query = "delete from t_center_details where center_id = '$center_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$query1 = "delete from t_admin where admin_id = '$admin_id'";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		header('Location:dashboard.php');
	}
	else
	{
		$center_id = $_REQUEST['center_id'];
		$query = "select t_center_details.center_name, t_center_details.center_code, t_center_details.center_location, t_center_details.center_address, t_center_details.admin_id, t_admin.admin_first_name, t_admin.admin_last_name, t_admin.admin_email_id from t_center_details join t_admin on t_center_details.admin_id = t_admin.admin_id where center_id='$center_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		
	?>
	
		<h1 style="font-weight:lighter;">Delete Center Details</h1><hr>
		<div class="hero-unit">
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Delete Center</h3><br>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return confirmation();">
                    <table class="table table-hover">
                        <tr>
                            <td style="color:#000000;width:200px;">Center Name:</td>
                            <td><?php echo $row['center_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Center Code:</td>
                            <td><?php echo $row['center_code']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Center Location:</td>
                            <td><?php echo $row['center_location']; ?></td>
                        </tr> 
                        <tr>
                            <td style="color:#000000;width:200px;">Center Address:</td>
                            <td><?php echo $row['center_address']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Admin First Name:</td>
                            <td><?php echo $row['admin_first_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Admin Last Name:</td>
                            <td><?php echo $row['admin_last_name']; ?></td>
                        </tr> 
                        <tr>
                            <td style="color:#000000;width:200px;">Admin Email Id:</td>
                            <td><?php echo $row['admin_email_id']; ?></td>
                        </tr>
                        <tr>
                            <td>
                            	<input type="hidden" name="center_id" value="<?php echo $center_id; ?>">
                                <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>">
                            </td>
                            <td><input type="submit" class="btn btn-primary" style="float:right;" value="Delete"></td>
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