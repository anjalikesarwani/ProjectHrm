<?php 
	$hostname="localhost";
	$username="root";
	$password="vertrigo";
	$database="tata";
	
	/*$hostname="mysql10.000webhost.com";
	$username="a6376800_tata";
	$password="anjali25";
	$database="a6376800_tata";*/
	
	$link=mysql_connect($hostname,$username,$password) or die("Could not connect to the Mysql".mysql_error());
	$db = mysql_select_db($database, $link) or die("Could not connect to the Database".mysql_error());
?>
