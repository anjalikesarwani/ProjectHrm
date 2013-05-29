<?php $pagetitle="Home"; include("header.php"); ?>
<!--<style>
	body
	{
		background-image:url(img/nhrdf1.jpg);
		background-size:100%;
		background-repeat:repeat-x;
	}
</style>-->

<?php  
	if(isset($_POST) && array_key_exists('admin_email_id', $_POST))
	{
		$admin_email_id = $_POST['admin_email_id'];
		$admin_password = $_POST['admin_password'];
		include('connection_file/connect.php');
		$query = "select * from t_admin";
		$result = mysql_query($query, $link) or die (mysql_error());
		$value = false;
		while($row = mysql_fetch_assoc($result))
		{
			if($admin_email_id == $row['admin_email_id'] && $admin_password == $row['admin_password'] && $row['admin_category'] == 'superadmin')
			{
				$value = true;
				@session_start(); 
				$admin_id = $row['admin_id'];
				$admin_email_id = $row['admin_email_id'];
				$admin_category = $row['admin_category'];
				$_SESSION['admin_id'] = $admin_id;
				$_SESSION['admin_email_id'] = $admin_email_id;
				$_SESSION['admin_category'] = $admin_category;
				header('Location:dashboard.php');
			}
			if($admin_email_id == $row['admin_email_id'] && $admin_password == $row['admin_password'] && $row['admin_category'] == 'admin')
			{
				$value = true;
				@session_start(); 
				$admin_id = $row['admin_id'];
				$admin_email_id = $row['admin_email_id'];
				$admin_category = $row['admin_category'];
				$_SESSION['admin_id'] = $admin_id;
				$_SESSION['admin_email_id'] = $admin_email_id;
				$_SESSION['admin_category'] = $admin_category;
				header('Location:dashboard.php');
			}
		}
		if($value == false)
		{
		
?>
			<div class="hero-unit">
				<center><h1>Please enter correct email Id and Password!</h1></center>
			</div>
<?php

		}
	}
	else
	{

?>
	<!--style="background-image:url(img/nhrdf1.jpg); background-repeat: repeat-x; background-size:100%;"-->
	<div class="hero-unit" style="width:600px; margin:auto; "><!--background:inherit;-->
    	<center><h2 style="color:#002e19;">
        	National Horticultural Research and<br> Development Foundation!
        </h2></center>
    <br><br>
   <!-- style="opacity:0.9; filter:alpha(opacity=90); background-color:#727272; border:none;"-->
      <form  class="form-signin" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
        <h2 class="form-signin-heading">Sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address" name="admin_email_id">
        <input type="password" class="input-block-level" placeholder="Password" name="admin_password">
        <input type="submit" class="btn btn-large btn-primary">
      </form>
	</div>
    
<?php } ?>
    

<?php /*include("footer.php");*/ ?>
