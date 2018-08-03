<?php
	session_start();
    ini_set('mysql.connect_timeout',900);
	ini_set('default_socket_timeout',900);
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
		<title>Sell</title>
		<link rel="stylesheet" href="stylesell.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	<a href="index.php">Back to home page</a><br>
	<a href="sell_delete.php">View cart</a>
	<form method="post" enctype="multipart/form-data">  
	
	
	    <div class="sellbox">
	  
				<p class="pcat"><span id="cat">Select Category&nbsp&nbsp&nbsp&nbsp</span><select name="category" id="category">
				<option  value="" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
				<?php echo load_category(); ?>
				</select></p>
				
				<p><span id="cat">Select Product&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span><select name="product" id="product">
				<option  value="" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
				</select></p><br>
			   
				<p style="color:white;margin-left:20px;">Description</p>
				<textarea name="description" placeholder="Include the brand, model, age and included accessories" id="name" cols="9" rows="10"></textarea><br><br>
				<p style="color:white;margin-left:20px;"> Price</p>
				<input type ="text" name="price" id="sub2"><br><br>
				<p style="color:white;margin-left:20px;">Upload Photos</p>
			
				
				<input type="file" name="image" id="sub1">
				<br><br>
				<p id="cond">By clicking submit you agree to our terms and conditions</p><br>
				<input type="submit" name="sumit" value="Submit" id="sub">
		
		</div>
		</form>
		
			<?php
				if(isset($_POST['sumit']))
				{
					$pid=$_POST['product'];
					$price=$_POST['price'];
					$id=$_SESSION['SESS_MEMBER_ID'];
					$description=$_POST['description'];
					if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
					{
						echo "Please select an image";
					}
					else
					{
						$image=addslashes($_FILES['image']['tmp_name']);
						
						$name=addslashes($_FILES['image']['name']);

						$image=file_get_contents($image);
						$image=base64_encode($image);
						saveimage($name,$image,$description,$pid,$id,$price);
					}
				}
				
				function saveimage($name,$image,$description,$pid,$id,$price)
				{   
				   $con=mysqli_connect("localhost","root","admin@123","old_shoppe");
				   
					$qry="insert into product_details(pid,price,seller,description,img_name,image) values('$pid','$price','$id','$description','$name','$image')";
					$result=mysqli_query($con,$qry);
					if($result)
					{
						header('Location:sellpage.php');
					}
					else
					{
						echo "<br/>Image not uploaded";
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