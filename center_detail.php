<?php $pagetitle="Center Details"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	$center_id = $_REQUEST['center_id'];
	include('connection_file/connect.php');
	$query = "select t_center_details.center_name, t_center_details.center_code, t_center_details.center_location, t_center_details.center_address, t_admin.admin_first_name, t_admin.admin_last_name from t_center_details join t_admin on t_center_details.admin_id = t_admin.admin_id where center_id=$center_id";
	$result = mysql_query($query, $link) or die (mysql_error());
	$row = mysql_fetch_assoc($result);

?>

<h1 style="font-weight:lighter;">Center Details</h1><hr>
<div class="hero-unit">
	<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
        <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;"><?php echo $row['center_name']; ?>
            <ul class="nav pull-right">
                <li><?php echo "<a href=edit_center.php?center_id=".$center_id.">"; ?>Edit<?php echo "</a>"; ?></li>
            </ul>
            <ul class="nav pull-right">
                <li><?php echo "<a href=delete_center.php?center_id=".$center_id.">"; ?>Delete<?php echo "</a>"; ?></li>
            </ul>
        </h3><br>
        <table class="table table-hover">
            <tr>
            	<td style="color:#000000;width:200px;">Center Code:</td>
                <td><?php echo $row['center_code']; ?></td>
            </tr>
            <tr>
            	<td style="color:#000000; width:200px;">Admin Name:</td>
                <td><?php echo $row['admin_first_name'],' '.$row['admin_last_name']; ?></td>
            </tr>  
            <tr>
            	<td style="color:#000000;width:200px;">Center Location:</td>
                <td><?php echo $row['center_location']; ?></td>
            </tr> 
            <tr>
            	<td style="color:#000000;width:200px;">Center Address:</td>
                <td><?php echo $row['center_address']; ?></td>
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