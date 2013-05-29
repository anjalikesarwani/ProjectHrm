<?php $pagetitle="Delete Employee"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if(isset($_POST) && array_key_exists('emp_id', $_POST))
	{
		$emp_id = $_POST['emp_id'];
		$query = "delete from t_employee_details where emp_id = '$emp_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		header('Location:dashboard.php');
	}
	else
	{       
		
		$emp_id = $_REQUEST['emp_id'];
		$query = "select emp_first_name, emp_last_name, emp_email_id, post_id, emp_address, emp_contact from t_employee_details where emp_id = '$emp_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$row = mysql_fetch_assoc($result);
		$post_id = $row['post_id'];
		$query1 = "select post_name from t_post_priority where post_id = '$post_id'";
		$result1 = mysql_query($query1, $link) or die(mysql_error());
		$row1 = mysql_fetch_assoc($result1);
		
	?>
	
		<h1 style="font-weight:lighter;">Delete Employee Details</h1><hr>
		<div class="hero-unit">
			<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
				<h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Delete Employee</h3><br>
                <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>"  onsubmit="return confirmation();">
                    <table class="table table-hover">
                        <tr>
                            <td style="color:#000000;width:200px;">Employee First Name:</td>
                            <td><?php echo $row['emp_first_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Employee Last Name:</td>
                            <td><?php echo $row['emp_last_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Employee Email Id:</td>
                            <td><?php echo $row['emp_email_id']; ?></td>
                        </tr> 
                        <tr>
                            <td style="color:#000000;width:200px;">Employee Post:</td>
                            <td><?php echo $row1['post_name']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Employee Address:</td>
                            <td><?php echo $row['emp_address']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#000000;width:200px;">Employee Contact:</td>
                            <td><?php echo $row['emp_contact']; ?></td>
                        </tr> 
                        <tr>
                            <td>
                            	<input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">
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