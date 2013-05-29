<?php $pagetitle="Employee Home"; include("header.php"); ?>
<!--<style>
	body
	{
		background-image:url(../img/nhrdf1.jpg);
		background-size:100%;
		background-repeat:repeat-x;
	}
</style>-->

<?php  

if(isset($_POST) && array_key_exists('emp_email_id', $_POST))
{
	$emp_email_id = $_POST['emp_email_id'];
	$emp_password = $_POST['emp_password'];
	include('../connection_file/connect.php');
	$query = "select * from t_employee_details";
	$result = mysql_query($query, $link) or die (mysql_error());
	$value = false;
	while($row = mysql_fetch_assoc($result))
	{
		if($emp_email_id == $row['emp_email_id'] && $emp_password == $row['emp_password'])
		{
			$value = true;
			@session_start(); 
			$emp_id = $row['emp_id'];
			$emp_email_id = $row['emp_email_id'];
			$_SESSION['emp_id'] = $emp_id;
			$_SESSION['emp_email_id'] = $emp_email_id;
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

	<div class="hero-unit" style="width:600px; margin:auto; "><!--background:inherit;-->
		<center><h2 style="color:#002e19;">
        	National Horticultural Research and<br> Development Foundation!
        </h2></center><br><br>
   <!--     style="opacity:0.9; filter:alpha(opacity=90); background-color:#727272; border:none;" -->
		<form class="form-signin" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
        	<h2 class="form-signin-heading">Sign in</h2>
        	<input type="text" class="input-block-level" placeholder="Email address" name="emp_email_id">
        	<input type="password" class="input-block-level" placeholder="Password" name="emp_password" >
        	<input type="submit" class="btn btn-large btn-primary">
		</form>
	</div>
    
<?php
}

?>
<?php /*include("footer.php");*/ ?>


