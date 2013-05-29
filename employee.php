<?php $pagetitle="All Employees"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	$query = "select emp_first_name, emp_last_name, post_id, emp_address, emp_contact from t_employee_details";
	$result = mysql_query($query, $link) or die (mysql_error());

?>

<h1 style="font-weight:lighter;">All Employees</h1><hr>
<div class="hero-unit">
	<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
    <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Employee details</h3><br>
    	<table class="table table-hover">
        	<tr>
            	<td style="color:#000000;"><strong>Employee Name</strong></td>
            	<td style="color:#000000;"><strong>Post Name</strong></td>
                <td style="color:#000000;"><strong>Address</strong></td>
                <td style="color:#000000;"><strong>Contact</strong></td>
            </tr> 
            
<?php

		while($row = mysql_fetch_assoc($result))
        {
			$emp_first_name = $row['emp_first_name'];
        	$emp_last_name = $row['emp_last_name'];
            $post_id = $row['post_id'];
            $emp_address = $row['emp_address'];
			$emp_contact = $row['emp_contact'];
			$query1 = "select post_name from t_post_priority where post_id = '$post_id'";
			$result1 = mysql_query($query1, $link) or die (mysql_error());
			$row1 = mysql_fetch_assoc($result1);
			$post_name = $row1['post_name'];
			
?>

			<tr>
            	<td><?php echo $emp_first_name.''.$emp_last_name; ?></td>
            	<td><a href="center_detail.php"><?php echo $post_name; ?></a></td>
                <td><?php echo $emp_address; ?></td>
                <td><?php echo $emp_contact; ?></td>
            </tr>
            
<?php

		} 
		
?>
         
        </table>
    </div>
    <a href="create_employee.php" class="btn btn-info">Create New Employee</a>
</div>

<?php

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