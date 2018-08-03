<?php
	
	session_start();
?>
<html>
<head>
	<title>sell_delete
	</title>
	 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="index.php">Back to home page</a><br>
<a href="sellpage.php">Back to sell page</a><br>
<a href="sell_delete.php">Refresh</a>

<?php
	$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
	$id=$_SESSION['SESS_MEMBER_ID'];
	$sql="select * from product_details,product where seller='$id' and product.pid=product_details.pid;";
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
			<div class="product-card" style="width:330px;height:200px;position:relative;margin:50px auto;background-color:#fafafa;border:1px solid #D3D3D3;">
			<div class="pro" style="margin-top:20px;">
					<div class="pro_name " style="float:right;margin-right:25px;margin-top:10px;"><?php  echo '<b>Product name</b><br> '.$row['pname'];echo '<br><br><b>Price</b><br> Rs.'.$row['price'];?> 
					</div> 
					<?php $img=$row['image'];echo '<img src="data:image;base64,'.$img.'"  style="margin-left:25px;height:120px;width:120px;">'; ?>
			
				
					
			</div>
			<?php
			
			$showid=$row['psid'];
			echo "<br>";
		    ?>
			
			
					
					<a style="margin-left:50px;" href="sell_delete.php?del=<?php echo $showid ?>">Remove</a>


</div>
</div>


<?php

		}
		
	}
?>	
	
	</div>
	</div>


<?php
	if(isset($_GET['del']))
	{   
		$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
		$del=$_GET['del'];
		$sql="delete from product_details where psid='$del';";
		$result=mysqli_query($con,$sql);
		if($result)
		{
			echo "item successfully removed";
		}
		else
		{
			echo "delete failed";
		}
	}
	
	
?>




</body>
<html>	