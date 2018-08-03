<html>
<head>
	<title>view reviews
	</title>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="index.php">Back to home page</a><br>

<?php
	$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
	
	$sql="select name,review from review,user where review.uid=user.id;";
	$result=mysqli_query($con,$sql);
	$result_check=mysqli_num_rows($result);
	
	if($result_check>0)
	{
		
		while($row=mysqli_fetch_assoc($result))
		{  
		
			
			?>
			<div class="container">
			<div class="row">
			<div class="col-md-4">
			<div class="product-card" style="width:200px;height:200px;position:relative;margin:50px auto;background-color:#fafafa;border:1px solid #D3D3D3;">
			<div class="pro" style="margin-top:20px;">
					<div class="pro_name " style="margin-right:25px;margin-top:40px;margin-left:25px;"><?php  echo '<b>Name</b><br> '.$row['name'];echo '<br><br><b>Review</b><br> '.$row['review'];?> 
					</div> 
					
					
			</div>


</div>
</div>


<?php

		}
		
	}
?>	
	
	</div>
	</div>







</body>
<html>	