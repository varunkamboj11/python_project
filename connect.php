
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'admin@123');
define('DB_NAME', 'old_shoppe');

	$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS) or die(mysql_error());
	mysqli_select_db($connection,DB_NAME) or die(mysqli_errno());
	
?>
<?php
	 $con = mysqli_connect("localhost","root","admin@123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
	
?>