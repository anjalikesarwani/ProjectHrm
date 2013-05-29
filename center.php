<?php $pagetitle="All Center"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	$query = "select t_center_details.center_id, t_center_details.center_name, t_center_details.center_code, t_center_details.center_location, t_admin.admin_first_name from t_center_details left join t_admin on t_center_details.admin_id = t_admin.admin_id";
	$result = mysql_query($query, $link) or die (mysql_error());

?>

<h1 style="font-weight:lighter;">All Centers</h1><hr>
<div class="hero-unit">
	<div id="details" class="hero-unit" style="padding:1px 20px 1px 20px ; background-color:#f7f7f7;">
    <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Center details</h3><br>
    	<table class="table table-hover">
        	<tr>
            	<td style="color:#000000;"><strong>Center Code</strong></td>
            	<td style="color:#000000;"><strong>Center Name</strong></td>
                <td style="color:#000000;"><strong>Admin Name</strong></td>
                <td style="color:#000000;"><strong>Center Location</strong></td>
                <td></td>
            </tr> 
            
<?php
		/*$total_centers = mysql_num_rows($result);
		$value = $total_centers/4;
		if (is_float($value))
		{
		  $no_of_pages = intval($value) + 1;
		}
		else
		{
			$no_of_pages = $value;
		}*/
		while($row = mysql_fetch_assoc($result))
        {
			$center_id = $row['center_id'];
        	$center_name = $row['center_name'];
            $admin_first_name = $row['admin_first_name'];
            $center_location = $row['center_location'];
			$center_code = $row['center_code'];
			
?>

			<tr>
            	<td><?php echo $center_code; ?></td>
            	<td><?php echo $center_name; ?></td>
                <td><?php echo $admin_first_name; ?></td>
                <td><?php echo $center_location; ?></td>
                <td style="text-align:right">
                	<?php echo "<a title='edit' href=edit_center.php?center_id=".$center_id.">"; ?><i class="icon-pencil" style="margin-left:-50px;"></i><?php echo "</a>"; ?>
                    <?php echo "<a title='delete' href=delete_center.php?center_id=".$center_id.">";?><i class="icon-remove-sign" style="margin-left:20px;"></i><?php echo "</a>";?>
                </td>
            </tr>
            
<?php

		} 
		
?>
         
        </table>
    </div>
    <!--<div class="pagination pagination-centered">
        <ul>
        <?php
			/*$i = 1;
        	while($i<=$no_of_pages)
            {*/
		?>
            	<li><a href="#"><?php/* echo $i;*/ ?></a></li>
        <?php
				/*$i = $i +1;  
            }*/
        ?>
        </ul>
	</div>-->
    <a href="create_center.php" class="btn btn-info">Create New Center</a>
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