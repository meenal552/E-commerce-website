<?php
include("includes/db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-eequiv="Content-type"content="text/html; charset=utf-8">
<title>PathaniSwad</title>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea});
</script>

</head>
<body bgcolor="purple">
<form method = "post" action="insert_product.php" enctype="multipart/form-data">
<table width = "700" align="center" border="1" bgcolor="red">
<tr align="center">
<td colspan="2"><h1>Insert New Product:</h1></td>
</tr>
<tr>
	<td align="right"><b>Product Title</b></td>
	<td><input type="text" name="product_title" size="50"/></td>
</tr>
<tr>
	<td align="right"><b>Product Category</b></td>
	<td>
		<select name="product_cat">
			<option>Select a category</option>
			<?php
					$get_cats = "select * from categories";
					$run_cats = mysqli_query($con, $get_cats);
					while ($row_cats=mysqli_fetch_array($run_cats)){
						$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
					echo "<option value='$cat_id'>$cat_title</option>";
					}
					?>
	</td>
</tr>
<tr>
	<td align="right"><b>Product Image</b></td>
	<td><input type="file" name="product_img"/></td>
</tr>
<tr>
	<td align="right"><b>Product Price</b></td>
	<td><input type="text" name="product_price"/></td>
</tr>
<tr>
	<td align="right"><b>Product Description</b></td>
	<td><textarea name="product_desc" cols="35" rows="10"></textarea></td>
</tr>
<tr>
	<td align="right"><b>Product Keywords</b></td>
	<td><input type="text" name="product_keywords" size="50"/></td>
</tr>
<tr align="center">
	<td colspan="2"><input type="submit" name="insert_product" value="Insert Product"/></td>
</tr>
</body>
</html>

<?php
if(isset($_POST['insert_product'])){
	$product_title = $_POST['product_title'];
	$product_cat = $_POST['product_cat'];
	
	$product_price = $_POST['product_price'];
	$product_desc = $_POST['product_desc'];
	$status  = 'on';
	$product_keywords = $_POST['product_keywords'];
	
	
	$product_img = $_FILES['product_img']['name'];
	
	
	echo $temp_name = $_FILES['product_img']['tmp_name'];
	
	
	if($product_title=='' OR $product_cat=='' OR $product_price=='' OR $product_desc=='' OR $product_img=='' OR$product_keywords==''){
		echo "<script> alert('Please fill all the fields!')</script>";
		exit();
	}
	else{
		
		move_uploaded_file($temp_name,"product_images/$product_img");
	
	$insert_product = "insert into products (cat_id,date,product_title,product_img,product_price,product_desc,product_keywords) value('$product_cat',NOW(),'$product_title','$product_img','$product_price','$product_desc','$product_keywords')";
	$run_product = mysqli_query($con,$insert_product);
	if($run_product){
		echo"<script>alert('Product is inserted successfully')</script>";
	}
	}
}
?> 