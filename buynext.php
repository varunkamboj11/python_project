 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Buy Product</title>  
		   <meta charset="utf-8"> 
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
             
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
	  <a href="index.php">Back to home page</a><br>
	  <a href="buy.php">Back to buy page</a>
           <br />  
           <div  style="text-align:center;">  
                <h3>We have found the following results:</h3><br />  
			</div>	

<?php
	session_start();
	if(isset($_SESSION['pid'])){
		$p=$_SESSION['pid'];
		$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
		$qry="select * from product_details,user,product where product.pid='$p' and product.pid=product_details.pid and user.id=product_details.seller ";
		
		$result=mysqli_query($con,$qry);
		if(mysqli_num_rows($result)>0){
		
			while($row=mysqli_fetch_array($result))
			{
			
				 ?> 
					<div class='container'>
					 <div class='row'>
						<div class="col-md-4">  
							<form method="post" action="buynext.php?action=add&id=<?php echo $row["id"]; ?>"> 
							<div class="product-card" style="width:330px;position:relative;margin:50px auto;background-color:#fafafa;border:1px solid #D3D3D3;">
								<div class="product-tumb" style="display:flex;align-items:center;justify-content:center;height:240px;;background:#f0f0f0;">
									
									<?php  $img=$row['image']; 
									echo '<img src="data:image;base64,'.$img.'" style="height:170px;width:230px;">'?>
									
								</div>
								<div class="product-details" style="padding:30px;">
									<h4><a style="font-weight:bold;display:block;margin-bottom:18px;font-size:16px;text-transform:uppercase;color:#708090;text-decoration:none;transition:0.3s;" href=""><?php echo $row['pname'] ?></a></h4>
									<p style="margin-bottom:18px;"><?php echo "<b> DESCRIPTION</b><br>".$row["description"];?></p>
									<p style="margin-bottom:2px;"><b>SELLER DETAILS</b></p>
									<p><?php echo "<b>Name</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp	".$row['Name'];?><br>
									<?php echo "<b>Address</b>&nbsp&nbsp&nbsp	".$row["Address"];?><br>
									<?php echo "<b>Contact</b>&nbsp&nbsp&nbsp&nbsp	".$row["contact"];?></p>
									<div class="product-bottom-details" style="overflow:hidden;border-top:1px solid #eee;margin-top:20px;padding-top:20px;">
										<div class="product-price" style="font-size:16px;color:#fbb72c;font-weight:600;"><?php echo "Rs. ".$row["price"];?>
										</div>
										
									</div>	
								</div>
                          
                            </form>					 
						</div>
					  </div>
							
                <?php
			}
			
			echo "</div>";
		}			
	}
	else{
		echo "No results found. Please select a valid product.";
	}
	
?>

</body>
</html>