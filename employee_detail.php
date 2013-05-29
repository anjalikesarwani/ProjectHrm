<?php $pagetitle="Employee Details"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	$emp_id = $_REQUEST['emp_id'];
	include('connection_file/connect.php');
	$query = "select emp_first_name, emp_last_name, emp_email_id, emp_address, emp_contact from t_employee_details where emp_id = '$emp_id'";
	$result = mysql_query($query, $link) or die (mysql_error());
	$row = mysql_fetch_assoc($result);
	
?>

<h1 style="font-weight:lighter;">Employee Details</h1><hr>
<div class="hero-unit">
	<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
        <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;"><?php echo $row['emp_first_name'].' '.$row['emp_last_name']; ?>
        	<ul class="nav pull-right">
                <li><?php echo "<a href=edit_employee.php?emp_id=".$emp_id.">"; ?>Edit<?php echo "</a>"; ?></li>                
            </ul>
            <ul class="nav pull-right">
                <li><?php echo "<a href=delete_employee.php?emp_id=".$emp_id.">"; ?>Delete<?php echo "</a>"; ?></li>
            </ul>
        </h3><br>
        <table class="table table-hover">
        	<tr>
            	<td style="color:#000000;width:200px;">Employee Email ID:</td>
                <td><?php echo $row['emp_email_id']; ?></td>
            </tr> 
            <tr>
            	<td style="color:#000000;width:200px;">Employee Address:</td>
                <td><?php echo $row['emp_address']; ?></td>
            </tr>
            <tr>
            	<td style="color:#000000;width:200px;">Employee Contact:</td>
                <td><?php echo $row['emp_contact']; ?></td>
            </tr>
        </table>
    </div>
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