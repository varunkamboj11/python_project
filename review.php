<?php

	//include('connect.php');
	session_start();

if(isset($_POST['login'])){	
	//defining variables
		$uname="";
		$rev="";
		
	//variable for errors	
		
		$uname=$_POST['username'];
		$rev=$_POST['rev'];
		$id=$_SESSION['SESS_MEMBER_ID'];
		
		
		   $con=mysqli_connect("localhost","root","admin@123","old_shoppe");
			
	$result=mysqli_query($con,"INSERT INTO review ( uid, review) VALUES ( '$id', '$rev')");
	
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
		<title>Add Reviews</title>
		<link rel="stylesheet" href="stylelogin.css">
	</head>
	<body>

	
		<div class="loginBox">
			<img src="img/generic-user-purple.png" class="user">
			<h2>Add Review</h2>
			<form action="" method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username" value="" class="radius mini">
				<p>Enter Review</p>
				<input type="text" name="rev" placeholder="Enter Review" value="" class="radius mini">
				<input type="submit" name="login" value="Add Review">
				
			</form>
			
			
		</div>
	</body>
</html>
