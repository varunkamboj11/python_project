<?php
	//include('connect.php');
	
	
	
	
		
		$vname = "";
		$vuname="";
		$vpassword="";
		$vcpassword="";
	    $vaddress="";
		$vcnumber="";
		$vemail="";
		$semail="";
		
		
		

		$a="";
		$u="";
		$e="";
		$p="";
		
		
		
		//Declaration of variables to textfields and assinging null value otherwise shows error in textfield
		$name = "";
		$uname="";
		$password="";
		$cpassword="";
	    $address="";
		$cnumber="";
		$email="";
		
		
		
	
		//function to exclude sql injection
		//function test_input($data){
		//	$data=trim($data);
		//	$data=stripslashes($data);
		//	$data=htmlspecialchars($data);
		//	return $data;
		//}
	
		
		if(isset($_POST['signup']))
		{
			$name = ($_POST['Name']);
			$uname=($_POST['username']);
			$password = ($_POST['password1']);
			$cpassword = ($_POST['cpassword']);
			$address = $_POST['address'];
			$cnumber =($_POST['cnumber']);
			$email = $_POST['email'];
			
	
			//validation
			if(empty($name))
			{
				$vname="<td>Mandatory field!</td>";
			}
			else
			{
				$vname=" ";
			}
			
			if(empty($uname))
			{
				$vuname="<td>Mandatory field!</td>";
		    }
		    else
			{
				$vuname=" ";
		    }
			
			if(empty($email))
			{
			$vemail="<td>Mandatory field!</td>";
		    }
		    else
			{
			$vemail=" ";
		    }
			
			if(empty($cnumber))
			{
			$vcnumber="<td>Mandatory field!</td>";
		    }
		    else
			{
			$vcnumber=" ";
		    }
			
			if(empty($address))
			{
			$vaddress="<td>Mandatory field!</td>";
		    }
		    else
			{
			$vaddress=" ";
		    }
			
			if(empty($password))
			{
			$vpassword="<td>Mandatory field!</td>";
		    }
		    else
			{
			$vpassword=" ";
		    }
			
			if(empty($cpassword))
			{
			$vcpassword="<td>Mandatory field!</td>";
		    }
		    else
			{
			$vcpassword=" ";
		    }
			
			
			
			
			
	/*		if($uname!="")
			{
				$result=mysqli_query($con,"SELECT * FROM user WHERE username='$uname'") or die(mysqli_error($con));
			
				if($result)
				{
					$u="This username is already registered";
				}
			}   */
			
			
			
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$e="Invalid email address.";
		    }
		/*	if($email!="")
			{
				$result=mysqli_query($con,"SELECT * FROM user WHERE Email='$email'") or die(mysqli_error($con));
			
				if($result)
				{
					$semail= "This email is already registered with us.";
				}
		    }  */
			
			
			
			
			
			if(strlen($password)<8)
			{
				$p="Password must be 8 characters long";
		    }
		    else
			{
				$p="";
		    }
	
		
		
		    if($cpassword !== $password)
			{
				$a="<td>Password does not match.Please try again.</td>";
		    }
			else
			{
				$a="";
			}
			
			
			
		   /* if($cpassword="")
			{
				$a="";
		    } */
			
			
			
			if((!empty($name))&& (!empty($uname)) &&  (!empty($password)) && (!empty($cpassword))  &&   (!empty($address)) 
				&& (!empty($cnumber))  &&  (!empty($email)) )
				{
					$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
					$result =mysqli_query($con," INSERT INTO user(Name, Email,Password,Address,contact,username) VALUES('$name','$email','$password','$address','$cnumber','$uname')");

					if($result)
					{
						header('Location:index.php');
					}
		
	            } 
				
	}

?>			




<html>
	<head>
		<meta charset="utf-8">
		<title>Sign Up</title>
		<link rel="stylesheet" href="stylelogin.css">
	</head>
	<body>
		<div class="loginBoxs">
			
			<h2 class="asd">Sign Up</h2>
			<form action="" method="post">
				<p>Name</p>
				<input type="text" name="Name" placeholder="Enter Name" value="<?php echo $name; ?>" >
				<font color="Red"><?php echo $vname; ?> </font>
				<p>Username</p>
				<input type="text" name="username" placeholder="Enter Username"  value="<?php echo $uname; ?>" >
				<font color="Red"  ><?php echo $vuname; ?> </font> <font color="Red"> <?php echo $u; ?></font>
				<p>Email</p>
				<input type="text" name="email" placeholder="Enter Email" value="<?php echo $email; ?>" >
				<font color="Red"><?php echo $vemail; ?> </font><font color="Red"><?php echo $e; ?> </font><font color="Red"><?php echo $semail; ?> </font>
				<p>Contact No.</p>
				<input type="text" name="cnumber" placeholder="Enter Contact No."  value="<?php echo $cnumber; ?>" >
				<font color="Red"><?php echo $vcnumber; ?> </font>
				<p>Address</p>
				<input type="text" name="address" placeholder="Enter Address"  value="<?php echo $address; ?>" >
				<font color="Red"><?php echo $vaddress; ?> </font>
				<p>Password</p>
				<input type="password" name="password1" placeholder="Enter Password"  value="<?php echo $password; ?>"> 
				<font color="Red"><?php echo $vpassword; ?> </font> <font color="Red"><?php echo $p; ?> </font>
				<p>Confirm Password</p>
				<input type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword; ?>">
				<font color="Red"><?php echo $vcpassword; ?> </font> <font color="Red"><?php echo $a; ?> </font>
				<input type="submit" name="signup" value="Sign Up">
				
			</form>
		</div>
	</body>
</html>