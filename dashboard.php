<?php $pagetitle="DashBoard"; include("header.php"); ?>
<?php

if(isset($_SESSION['admin_id']))
{
	include('connection_file/connect.php');
	if($_SESSION['admin_category'] == 'superadmin')
	{
		$admin_id = $_SESSION['admin_id'];
		$query = "select * from t_admin where admin_id='$admin_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$query1 = "select center_id, center_name, center_code from t_center_details limit 4";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		$query2 = "select t_admin.admin_id, t_admin.admin_first_name, t_center_details.center_location from t_admin left join t_center_details on t_admin. admin_id = t_center_details.admin_id where t_admin.admin_category != 'superadmin'limit 4";
		$result2 = mysql_query($query2, $link) or die (mysql_error());
		
	
	?>
	
        <h1 style="font-weight:lighter;">DashBoard</h1><hr>
        <div  class="hero-unit">
        <div class="row-fluid">
          <div class="span6">
            <div class="hero-unit" style="padding:1px 10px 0 10px; background-color:#f7f7f7;">
                <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Profile</h3>
                <table class="table table-hover">
		   
	<?php
	
		while($row = mysql_fetch_assoc($result))
		{
			$admin_first_name = $row['admin_first_name'];
			$admin_last_name = $row['admin_last_name'];
			$admin_email_id = $row['admin_email_id'];
			$admin_address = $row['admin_address'];
			$admin_contact = $row['admin_contact'];
				
	?>
	
                    <tr>
                        <td style="color:#abaaaa; width:100px;">First Name:</td>
                        <td><?php echo $admin_first_name; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Last Name:</td>
                        <td><?php echo $admin_last_name; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Email ID:</td>
                        <td><?php echo $admin_email_id; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Address:</td>
                        <td><?php echo $admin_address; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Contact:</td>
                        <td><?php echo $admin_contact; ?></td>
                    </tr> 
				
	<?php
	
			}
			
	?>
	
			</table>
		</div>
	  </div>
	  <div class="span6">
		<div class="hero-unit" style="padding:1px 10px 0 10px ; background-color:#f7f7f7;">
			<h3 style="background-color:#e1dfdf;  padding:5px 0 0 10px;">Centers</h3>
			<table class="table table-hover">
			
	<?php
	
		while($row1 = mysql_fetch_assoc($result1))
		{
			$center_id = $row1['center_id'];
			$center_name = $row1['center_name'];
			$center_code = $row1['center_code'];
				
	?>
	
				<tr>
					<td><?php echo "<a href=center_detail.php?center_id=".$center_id.">"; ?>
                   <?php 
						echo $center_name;
						echo '('.$center_code.')';					
					?>
					 <?php echo "</a>"; ?>
					</td>
					<td></td>
				</tr> 
				
	<?php
	
		}
			
	?>
	
			</table>
			<a href="center.php" class="btn btn-info" style="float:right;">Show All</a>
		</div>
	  </div>
	</div>
	<div class="row-fluid">
	  <div class="span6">
		<div class="hero-unit" style="padding:1px 10px 0 10px ;background-color:#f7f7f7;">
			<h3 style="background-color:#e1dfdf;  padding:5px 0 0 10px;">Center Admins</h3>
			<table class="table table-hover">
			
	<?php
	
		while($row2 = mysql_fetch_assoc($result2))
		{
			$admin_id = $row2['admin_id'];
			$admin_first_name = $row2['admin_first_name'];
			$center_location = $row2['center_location'];
				
	?>
	
				<tr>
					<td><?php echo "<a href=admin_detail.php?center_admin_id=".$admin_id.">"; ?>
									<?php  
											echo $admin_first_name.' '; 
											echo "-".' ';
											echo '<u>'.$center_location.'</u>'; 
											
									?>
									
						  <?php echo "</a>"; ?>
					 </td>
					<td><?php  ?></td>
				</tr> 
				
	<?php
	
		}
			
	?>
	
			</table>
			<a href="admin.php" class="btn btn-info" style="float:right;">Show All</a>
		</div>
	  </div>
	  <div class="span6">
      	<form method="post" action="#">
            <div class="hero-unit" style="padding:1px 10px 0 10px ;background-color:#f7f7f7;">
                <h3 style="background-color:#e1dfdf;  padding:5px 0 0 10px;">Notice Board</h3>
                <textarea name="post" style="width:475px; max-width:475px; height:127px; max-height:127px;"></textarea>
            </div>
                <input type="submit" class="btn btn-info" style="float:right;" value="Post">
		</form>
	  </div>
	</div>
	</div>
	
	<?php
	}
	else
	{
		$admin_id = $_SESSION['admin_id'];
		$query = "select * from t_admin where admin_id='$admin_id'";
		$result = mysql_query($query, $link) or die (mysql_error());
		$query1 = "select center_id, center_name, center_code, center_location, center_address from t_center_details where admin_id = '$admin_id'";
		$result1 = mysql_query($query1, $link) or die (mysql_error());
		
	
	?>
	
        <h1 style="font-weight:lighter;">DashBoard</h1><hr>
        <div  class="hero-unit">
        <div class="row-fluid">
          <div class="span6">
            <div class="hero-unit" style="padding:1px 10px 0 10px; background-color:#f7f7f7;">
                <h3 style="background-color:#e1dfdf; padding:5px 0 0 10px;">Profile</h3>
                <table class="table table-hover">
		   
	<?php
	
		while($row = mysql_fetch_assoc($result))
		{
			$admin_first_name = $row['admin_first_name'];
			$admin_last_name = $row['admin_last_name'];
			$admin_email_id = $row['admin_email_id'];
			$admin_address = $row['admin_address'];
				
	?>
	
                    <tr>
                        <td style="color:#abaaaa; width:100px;">First Name:</td>
                        <td><?php echo $admin_first_name; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Last Name:</td>
                        <td><?php echo $admin_last_name; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Email ID:</td>
                        <td><?php echo $admin_email_id; ?></td>
                    </tr> 
                    <tr>
                        <td style="color:#abaaaa; width:100px;">Address:</td>
                        <td><?php echo $admin_address; ?></td>
                    </tr>
				
	<?php
	
			}
			
	?>
	
			</table>
		</div>
	  </div>
	  <div class="span6">
		<div class="hero-unit" style="padding:1px 10px 0 10px ; background-color:#f7f7f7;">
			<h3 style="background-color:#e1dfdf;  padding:5px 0 0 10px;">Center Details</h3>
			<table class="table table-hover">
			
	<?php
	
		$row1 = mysql_fetch_assoc($result1);
		$center_id = $row1['center_id'];
		$center_name = $row1['center_name'];
		$center_code = $row1['center_code'];
		$center_location = $row1['center_location'];
		$center_address = $row1['center_address'];
				
	?>
	
                <tr>
                    <td style="color:#abaaaa; width:140px;">Center Name:</td>
                    <td><?php echo $center_name; ?></td>
                </tr> 
                <tr>
                    <td style="color:#abaaaa; width:140px;">Center Code:</td>
                    <td><?php echo $center_code; ?></td>
                </tr> 
                <tr>
                    <td style="color:#abaaaa; width:140px;">Center Location:</td>
                    <td><?php echo $center_location; ?></td>
                </tr> 
                <tr>
                    <td style="color:#abaaaa; width:140px;">Center Address:</td>
                    <td><?php echo $center_address; ?></td>
                </tr>  
			</table>
		</div>
	  </div>
	</div>
	<div class="row-fluid">
	  <div class="span6">
		<div class="hero-unit" style="padding:1px 10px 0 10px ;background-color:#f7f7f7;">
			<h3 style="background-color:#e1dfdf;  padding:5px 0 0 10px;">Employees</h3>
			<table class="table table-hover">
			
	<?php
		$query2 = "select * from t_employee_details where center_id = '$center_id' limit 4";
		$result2 = mysql_query($query2, $link) or die (mysql_error());
		while($row2 = mysql_fetch_assoc($result2))
		{
			$emp_id = $row2['emp_id'];
			$post_id = $row2['post_id'];
			$emp_first_name = $row2['emp_first_name'];
			$emp_last_name = $row2['emp_last_name'];
			$query3 = "select * from t_post_priority where post_id = '$post_id'";
			$result3 = mysql_query($query3, $link) or die (mysql_error());
			$row3 = mysql_fetch_assoc($result3);
			$post_name = $row3['post_name'];
				
	?>
    
                <tr>
                	<td><?php echo "<a style='color:#000000;' href=employee_detail.php?emp_id=".$emp_id.">"; ?><?php  echo $emp_first_name; ?><?php echo "</a>"; ?></td>
                    <td style="color:#abaaaa;"><?php echo $post_name; ?></td>
                    <td><?php echo "<a href=edit_employee.php?emp_id=".$emp_id.">"; ?>Edit<?php echo "</a>"; ?><td>
                    <td><?php echo "<a href=delete_employee.php?emp_id=".$emp_id.">"; ?>Delete<?php echo "</a>"; ?><td>
                </tr>
				
	<?php
	
		}
			
	?>
	
			</table>
			<a href="employee.php" class="btn btn-info" style="float:right;">Show All</a>
            <a href="create_employee.php" class="btn btn-info" style="float:left;">Create New Employees</a>
		</div>
	  </div>
	  <div class="span6">
		<div class="hero-unit" style="padding:1px 10px 0 10px ;background-color:#f7f7f7;">
			<h3 style="background-color:#e1dfdf;  padding:5px 0 0 10px;">Admin</h3>
		</div>
	  </div>
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