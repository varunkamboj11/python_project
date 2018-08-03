<?php

	//include('connect.php');
	session_start();

if(isset($_POST['login'])){	
	//defining variables
		$uname="";
		$contact="";
		
	//variable for errors	
		
		$uname=$_POST['username'];
		$contact=$_POST['contact'];
		$id=$_SESSION['SESS_MEMBER_ID'];
		
		
		   $con=mysqli_connect("localhost","root","admin@123","old_shoppe");
			
	$result=mysqli_query($con,"INSERT INTO user_contacts ( id, Contact) VALUES ( '$id', '1$contact')");
	
		//Check whether the query was successful or not
	if($result) {
		
		
			
		header("location: option.html");
		//	exit();
		
		}
		else{
			echo "Login Failed";
		}
	}

?>

<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Add Contact</title>
		<link rel="stylesheet" href="stylelogin.css">
	</head>
	<body>

	
		<div class="loginBox">
			<img src="img/generic-user-purple.png" class="user">
			<h2>New Contact</h2>
			<form action="" method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username" value="" class="radius mini">
				<p>Enter Contact</p>
				<input type="text" name="contact" placeholder="Enter Contact" value="" class="radius mini">
				<input type="submit" name="login" value="Add Contact">
				
			</form>
			
			
		</div>
	</body>
</html>
