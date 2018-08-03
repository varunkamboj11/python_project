<?php

	//include('connect.php');
	session_start();

if(isset($_POST['login'])){	
	//defining variables
		$uname="";
		$contact="";
		
	//variable for errors	
		
		$password=$_POST['p'];
		$cpassword=$_POST['cp'];
		$uname=$_POST['username'];
		$id=$_SESSION['SESS_MEMBER_ID'];
		
		
		   $con=mysqli_connect("localhost","root","admin@123","old_shoppe");
			
	$uname_check=mysqli_query($con,"SELECT * FROM user WHERE username='$uname';")or die(mysqli_error($con));
	
	$count=mysqli_num_rows($uname_check);
	
	if($count >0){
		if($password===$cpassword){
			$result=mysqli_query($con,"UPDATE user set Password='".$password."' WHERE username='".$uname."'") or die(mysqli_error($con));
    	header('location:option.html');		
			
		}
		else
		{
			echo "Invalid user id or password : ";
		}
	
	}
}

?>


<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Change Password</title>
		<link rel="stylesheet" href="stylelogin.css">
	</head>
	<body>

	
		<div class="loginBox">
			<img src="img/generic-user-purple.png" class="user">
			<h2>Change Password</h2>
			<form action="" method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username" value="" class="radius mini">
				<p>Enter New Password</p>
				<input type="text" name="p" placeholder="Enter new Password" value="" class="radius mini">
				<p>Re-enter Password</p>
				<input type="text" name="cp" placeholder="Re-enter Password" value="" class="radius mini">
				<input type="submit" name="login" value="Submit">
				
			</form>
			
			
		</div>
	</body>
</html>

