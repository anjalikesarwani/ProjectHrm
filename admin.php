<?php $pagetitle="All Admin"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	$query = "select t_admin.admin_id, t_admin.admin_email_id, t_center_details.center_location, t_admin.admin_first_name from t_admin left join t_center_details on t_admin. admin_id = t_center_details.admin_id where t_admin.admin_category != 'superadmin'";
	$result = mysql_query($query, $link) or die (mysql_error());

?>

<h1 style="font-weight:lighter;">All Admins</h1><hr>
<div class="hero-unit">
	<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
    <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Admin details</h3><br>
    	<table class="table table-hover">
        	<tr>
            	<td style="color:#000000;"><strong>Admin Name</strong></td>
                <td style="color:#000000;"><strong>Admin Email Id</strong></td>
                <td style="color:#000000;"><strong>Center Location</strong></td>
                <td></td>
            </tr> 
            
<?php

		while($row = mysql_fetch_assoc($result))
        {
			$center_admin_id = $row['admin_id'];
        	$admin_email_id = $row['admin_email_id'];
            $admin_first_name = $row['admin_first_name'];
            $center_location = $row['center_location'];
			
?>

			<tr>
            	<td><?php echo $admin_first_name; ?></td>
                <td><?php echo $admin_email_id; ?></td>
                <td><?php echo $center_location; ?></td>
                <td >
                	<?php echo "<a title='edit'href=edit_admin.php?center_admin_id=".$center_admin_id.">";?><i class="icon-pencil" ></i><?php echo "</a>";?>
                </td>
            </tr> 
            
<?php

		} 
		
?>

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