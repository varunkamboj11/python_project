<?php

	include('connect.php');
	session_start();

if(isset($_POST['login'])){	
	//defining variables
		$uname="";
		$password="";
		
	//variable for errors	
		$vuname=" ";
		$vpassword=" ";
		
		$uname=$_POST['username'];
		$password=$_POST['password'];
		
		
		   /* if(empty($uname))
			{
			$vuname="<td>Mandatory field!</td>";
		    }
		    else{
			$vuname=" ";
		    }
	
	
			if(empty($password))
			{
			$vpassword="<td>Mandatory field!</td>";
		    }
		    else{
			$vpassword=" ";
		    }*/
			
	$result=mysqli_query($connection,"SELECT * FROM user WHERE username='$uname' AND password='$password'");
	
		//Check whether the query was successful or not
	if($result) {
		echo "query working";
		
		if(mysqli_num_rows($result) > 0) {
			$member=mysqli_fetch_assoc($result);
			echo "function2 working";
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			//$_SESSION['SESS_FIRST_NAME'] = $member['FirstName'];
			//$_SESSION['SESS_LAST_NAME'] = $member['profImage'];
			
			session_write_close();
			header("location: option.html");
			exit();
		
		}
		else{
			echo "Login Failed";
		}
	}
}
?>


<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="stylelogin.css">
	</head>
	<body>

	
		<div class="loginBox">
			<img src="img/generic-user-purple.png" class="user">
			<h2>Login</h2>
			<form action="" method="POST">
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username" value="" class="radius mini">
				<p>Password</p>
				<input type="password" name="password" placeholder="Enter Password" value="" class="radius mini">
				<input type="submit" name="login" value="Log In">
				<a href="forgot.html">Forgot Password??</a>
			</form>
			
			
		</div>
	</body>
</html>

