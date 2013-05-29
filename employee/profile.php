<?php $pagetitle="Employee Profile"; include("header.php"); ?>

<?php

if(isset($_SESSION['emp_id']))
{
	$emp_id = $_SESSION['emp_id'];
	include('../connection_file/connect.php');
	$query = "select * from t_employee_details where emp_id='$emp_id'";
	$result = mysql_query($query, $link) or die (mysql_error());
	$row = mysql_fetch_assoc($result);
	$post_id = $row['post_id'];
	$query1 = "select post_name from t_post_priority where post_id = '$post_id'";
	$result1 = mysql_query($query1, $link) or die (mysql_error());
	$row1 = mysql_fetch_assoc($result1);
	$post_name = $row1['post_name'];
	
?>

	<h1 style="font-weight:lighter;">Profile</h1><hr>
	<div class="hero-unit">
		<div class="row-fluid">
			<div class="span3">
            	<div class="hero-unit" style="padding:1px 10px 0 10px; background-color:#f7f7f7;">
                	<h3 style="font-weight:lighter; font-size:28px;"><?php echo $row['emp_first_name']; ?></h3>
                    <span style="font-size:14px; font-weight:bold;"><u><?php echo $post_name; ?></u></span>
                    <ul class="nav nav-pills nav-stacked">
                    	<li><a href="dashboard.php">DashBoard</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li class="dropdown-submenu">
                			<a href="#" class="dropdown-toggle"data-toggle="dropdown">Operations</a>
                			<ul class="dropdown-menu">
                  				<li><a href="#">Research</a></li>
                  				<li><a href="#">Extension</a></li>
                  				<li><a href="#">Procurement</a></li>
                                <li><a href="#">Processing</a></li>
                  				<li><a href="#">Marketing</a></li>
                			</ul>
             			 </li>
                         <li class="dropdown-submenu">
                			<a href="#" class="dropdown-toggle"data-toggle="dropdown">Approval</a>
                			<ul class="dropdown-menu">
                  				<li><a href="#">Procurement Rate</a></li>
                  				<li><a href="#">Sales Rate</a></li>
                  				<li><a href="#">Extension</a></li>
                                <li><a href="#">Research</a></li>
                			</ul>
             			 </li>
                         <li><a href="#">Sales</a></li>
                        <li><a href="#">Expanse</a></li>
                        <li><a href="#">Leave</a></li>
                        <li><a href="#">Tour</a></li>
                        <li><a href="#">Personal</a></li>
                        <li><a href="#">Report</a></li>
                    <?php
                        if($post_name != 'Technical Officer')
                        {  
					?>                     
                        <li><a href="#">Pending Request</a></li>
                        <li><a href="#">Approved Request</a></li>
                    <?php
                        }
					?>
                	</ul>
                </div>
			</div>
	  		<div class="span9">
				<div class="hero-unit" style="padding:1px 10px 0 10px; background-color:#f7f7f7;">
					<h3 style="font-weight:lighter; font-size:28px;">Profile</h3><hr style="border-color:#e1dfdf;"><br>
                    <form method="post" action="edit_profile.php">
                    	<table class="table table-hover">
                        	<tr>
                            	<td style="color:#000000; width:200px;">First Name:</td>
                            	<td><?php echo $row['emp_first_name']; ?></td>
                        	</tr>
                            <tr>
                                <td style="color:#000000; width:200px;">Last Name:</td>
                                <td><?php echo $row['emp_last_name']; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#000000; width:200px;">Email Id:</td>
                                <td><?php echo $row['emp_email_id']; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#000000; width:200px;">Address:</td>
                                <td><?php echo $row['emp_address']; ?></td>
                            </tr>
                            <tr>
                                <td style="color:#000000; width:200px;">Contact:</td>
                                <td><?php echo $row['emp_contact']; ?></td>
                            </tr> 
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-primary" style="float:right;" value="Edit"></td>
                            </tr>
						</table> 
					</form>
            	</div>
	  		</div>
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