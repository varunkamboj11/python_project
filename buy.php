<?php 
	session_start();

?>
<?php
function load_category()
{
	$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
	$output='';
	$sql="select * from category";
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
	{
		$output .= '<option value="'.$row["cid"].'"  >'.$row["cname"].'</option>';
	}
	return $output;

}
?>
<html>
	<head>
		<meta charset="utf-8"> 
		<title>Buy</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="stylebuy.css">
	</head>
	<body>
	<a href="index.php">Back to home page</a><br>

	<form method="post" enctype="multipart/form-data">  
	<div class="container">
		
		<div class="big" style="margin-top:45px;">
				<div class="col-md-2">
					<div class="imageBox">
						<img src="img/stat1.jpg" class="image-responsive" width="145" height="145">
						<h4>Stationery</h4>
					</div>
		        </div>
					
				<div class="col-md-2">
					<div class="imageBox">
						<img src="img/clothes.jpg" class="image-responsive" width="145" height="145">
						<h4>Clothes</h4>
					</div>
				</div>
		    
				<div class="col-md-2">
					<div class="imageBox" >
						<img src="img/tb.jpg" class="image-responsive" width="145" height="145">
						<h4>Electronics</h4>
					</div>
				</div>
			
				<div class="col-md-2">
					<div class="imageBox">
						<img src="img/furnishing.jpg" class="image-responsive" width="145" height="145">
						<h4>Furnishing</h4>
					</div>
		       
				</div>
			
				<div class="col-md-2">
					<div class="imageBox">
						<img src="img/cycle3.jpg" class="image-responsive" width="145" height="145">
						<h4>Others</h4>
					</div>
		       
		</div>
				
					
	</div>
	
	<div style="margin-top:350px;border:1px solid gray;border-radius:4px;margin-left:400px;margin-right:400px;height:270px;">

	
		<div class="cat" style="margin-top:60px; width:300px; margin-left:65px;">
			<p>Select Category&nbsp&nbsp<select name="category" id="category">
			<option value="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
			<?php echo load_category(); ?>
			</select></p><br>
			<p>Select Product&nbsp&nbsp&nbsp&nbsp<select name="product" id="product">
			<option value="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
		</div>
			<input type="submit" name="sumit" value="Submit" class="button">
		
	</div>	

	</form>
<?php
	if(isset($_POST['sumit']))
	{
		$pid=$_POST["product"];
		
		$con=mysqli_connect("localhost","root","admin@123","old_shoppe");
		$sql="select * from product_details where pid='$pid'";
		$result=mysqli_query($con,$sql);
	
				if(mysqli_num_rows($result)>0){
						$_SESSION['pid']=$pid;
						header('Location:buynext.php');
				}
				else{
					echo "No results formed";
				}
	}		
	
?>
</body>
</html>

<script>
	$(document).ready(function(){
		$('#category').change(function(){
			var cid=$(this).val();
			$.ajax({
				url:"fetch.php",
				method:"POST",
				data:{c_id:cid},
				dataType:"text",
				success:function(data){
					$('#product').html(data);
				}
			});
		});
	});
</script>
</script>