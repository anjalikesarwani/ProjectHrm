<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>

	<?php
	/*Print Page Title*/
	if(isset($pagetitle))
    
    	echo $pagetitle; 
	else
		echo "My Site";
    ?>
</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap-responsive.css">
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="../css/global.css">
<script language="javascript" src="../js/bootstrap.js"></script>
<script language="javascript" src="../js/bootstrap.min.js"></script>
    
    
</head>

<body>

<div class="container">
	<?php
	 @session_start();
	if(isset($_SESSION['emp_id']))
	{
		$emp_id = $_SESSION['emp_id'];
		$emp_email_id = $_SESSION['emp_email_id'];
   ?>
    
	

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#" style="color:#FFFFFF;"> NHRDF</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="dashboard.php">Dashboard</a></li>
              <li><a href="dashboard.php">Create</a></li>
            </ul>
            <ul class="nav pull-right">
              <li><a href="#about">Welcome,</a></li>
              <li class="active"><a href="dashboard.php"><?php echo $emp_email_id; ?></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="edit_profile.php">Edit Profile</a></li>
                  <li><a href="change_password.php">Change Password</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div><!--nav-collapse -->
        </div>
      </div>
    </div>
    <?php
     
	}
	else
	{
	?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"> NHRDF</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
            </ul>
            <ul class="nav pull-right">
            	<li><a href="#about">About</a></li>
            </ul>
          </div><!--nav-collapse -->
        </div>
      </div>
    </div>
    <?php
	}
	?>
    
    