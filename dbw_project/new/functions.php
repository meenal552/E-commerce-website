<html>
<head>
<title>PathaniSwad</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="styles/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="styles/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="styles/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" type="text/css" media="all" href="themes/brown/style.css" />
<script type="text/javascript" src="scripts/jquery-1.4.2.js"></script>
<script type="text/javascript" src="scripts/jquery.tools.min.js"></script>
<script type="text/javascript" src="scripts/dapur.js"></script>
</head>
</html>


<?php 
$db = mysqli_connect("mysql.hostinger.in","u276434974_ak","akshayiitian001","u276434974_rolls");

function getpro(){
	global $db;
	
	$get_products = "select * from products order by date desc LIMIT 0,5";
				$run_products = mysqli_query($db,$get_products);
				while ($row_products = mysqli_fetch_array($run_products)){
					$pro_id=$row_products['product_id'];
					$pro_title=$row_products['product_title'];
					$pro_cat=$row_products['cat_id'];
				
					$pro_desc=$row_products['product_desc'];
					$pro_price=$row_products['product_price'];
					$pro_image=$row_products['product_img'];
					
					/* echo"
					<div id='single_product'>
					<h3>$pro_title</h3>
					<a href='details.php?pro_id=$pro_id'><img src = 'admin_area/product_images/$pro_image' width='120' height='120' /></a><br>
					<p><a>Price: Rs.$pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='log_in.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
					</div>
					"; */
					
					
					echo"
					<li><a href='product-overview.php'><img src='admin_area/product_images/$pro_image' alt='' width='938' height='398' /></a></li>
                     ";
				}
		

		}
		function getrecpro(){
	global $db;
	$get_products = "select * from products order by rand() LIMIT 0,5";
				$run_products = mysqli_query($db,$get_products);
				while ($row_products = mysqli_fetch_array($run_products)){
					$pro_id=$row_products['product_id'];
					$pro_title=$row_products['product_title'];
					$pro_cat=$row_products['cat_id'];
					$pro_desc=$row_products['product_desc'];
					$pro_price=$row_products['product_price'];
					$pro_image=$row_products['product_img'];
				
					echo "<li><a href='product-details.php?pro_id=$pro_id'>$pro_title</a></li>";
			
}
}
		
		function getprou(){
	global $db;
	
	$get_products = "select * from products order by date LIMIT 0,7";
				$run_products = mysqli_query($db,$get_products);
				while ($row_products = mysqli_fetch_array($run_products)){
					$pro_id=$row_products['product_id'];
					$pro_title=$row_products['product_title'];
					$pro_cat=$row_products['cat_id'];
				
					$pro_desc=$row_products['product_desc'];
					$pro_price=$row_products['product_price'];
					$pro_image=$row_products['product_img'];
					
					/* echo"
					<div id='single_product'>
					<h3>$pro_title</h3>
					<a href='details.php?pro_id=$pro_id'><img src = 'admin_area/product_images/$pro_image' width='120' height='120' /></a><br>
					<p><a>Price: Rs.$pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='log_in.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
					</div>
					"; */
					
					
					echo"
					<div class='newCake'><a href='product-details.php?pro_id=$pro_id' class='grid_4'><img src='admin_area/product_images/$pro_image' alt='' width='220' height='120' /></a></div>
                     ";
				}
		

		}
		
		function getproi(){
	global $db;
	
	$get_products = "select * from products order by date desc LIMIT 0,5";
				$run_products = mysqli_query($db,$get_products);
				while ($row_products = mysqli_fetch_array($run_products)){
					$pro_id=$row_products['product_id'];
					$pro_title=$row_products['product_title'];
					$pro_cat=$row_products['cat_id'];
				
					$pro_desc=$row_products['product_desc'];
					$pro_price=$row_products['product_price'];
					$pro_image=$row_products['product_img'];
					
					/* echo"
					<div id='single_product'>
					<h3>$pro_title</h3>
					<a href='details.php?pro_id=$pro_id'><img src = 'admin_area/product_images/$pro_image' width='120' height='120' /></a><br>
					<p><a>Price: Rs.$pro_price </b></p>
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					<a href='log_in.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
					</div>
					"; */
					
					
					echo"
					<li class='grid_2 alpha'><a href='#'><img src='admin_area/product_images/$pro_image' alt='' width='100' height='60' /></a></li>
                     ";
				}
		

		}
		
		
		function prodetail(){
			global $db;
			global $pro_title;
			global $pro_id;
	global $pro_price;
				if(isset($_GET['pro_id'])){
	$pro_id = $_GET['pro_id'];
	$get_cat_products = "select * from products where product_id = '$pro_id'";
	$run_cat_products = mysqli_query($db,$get_cat_products);
	$count = mysqli_num_rows($run_cat_products);
	if($count==0){
		echo "<h2>No Product Available In This Category!</h2>";
	}
				while ($row_cat_products = mysqli_fetch_array($run_cat_products)){
					 $pro_id=$row_cat_products['product_id'];
					 $pro_title=$row_cat_products['product_title'];
					 $pro_cat=$row_cat_products['cat_id'];
					
					 $pro_desc=$row_cat_products['product_desc'];
					 $pro_price=$row_cat_products['product_price'];
					 $pro_image=$row_cat_products['product_img'];
					
					
					/* echo"
					<div id='single_product'>
					<h2>$pro_title</h2>
					<img src = 'admin_area/product_images/$pro_image1' width='250' height='250' />
					<img src = 'admin_area/product_images/$pro_image2' width='180' height='180' />
					<img src = 'admin_area/product_images/$pro_image3' width='180' height='180' /><br>
					<p><a>Price: Rs.$pro_price </b></p>
					<p><a>Description: $pro_desc </b></p><br>
					<a href='index.php?pro_id=$pro_id' style='float:left;'>Go Back</a>
					<a href='index.php?add_cart=$pro_id'><button style='float:right;margin-right:20px'>Add to cart</button></a>
					</div>
					"; */
					
					echo "<div class='post'>
          <p><img src='admin_area/product_images/$pro_image' height='300' width='600' alt='' /></p>
          <h2>$pro_title</h2>
          <p>$pro_desc</p>
        </div>";
					
					
				}
		
				}
		}

/* function prodetailprice(){
	global $pro_id;
	global $pro_title;
	global $pro_price;
	$_SESSION['add_cart'] = $pro_id;
	echo "<h3>$pro_title</h3>
          <h4>Rs. $pro_price</h4>
		  <form action='login.php' method='get'>
            <p>
              <label for='qty'>Select Qty: </label>
              <select tabindex='1'>
                <option>half dozen</option>
                <option>1 dozen</option>
              </select>
            </p>
            <p>
			  <a href='login.php'><input type='submit' value='Add to Cart' tabindex='2' name='submit' class='addCart button' /></a>
              <input type='hidden' value='30' name='comment_post_ID' />
            </p>
          </form>";

} */
function uprodetailprice(){
	global $pro_id;
	global $pro_title;
	global $pro_price;
	
	echo "<h3>$pro_title</h3>
	<script>
        function calc() {
            q = parseInt(document.getElementById('qty').value);
            p = $pro_price;
		    document.getElementById('total').value = q * p;
        }
        window.onload = calc;
    </script>
          <h4><b> Rs.<output id='total' for='quantity'>0</output> </b></h4>
		  <form action='product-details.php' method='POST'>
		  <p>
              <label for='qty'>Select Size: </label>
              <select tabindex='1'>
                <option>small</option>
                <option>medium</option>
				<option>large</option>
              </select>
            </p>
            <p>
               <label for='qty' style='margin-right:7'>Select Qty: </label>
			   <input type='number' min='1' max='25' value='1' name='quantity'  id='qty' onchange='calc()'/>
            </p>
            <p>
			  <a href='?add_cart=$pro_id'><input type='button' value='Add to Cart' tabindex='2' class='addCart button' /></a>
              <input type='hidden' value='30' name='comment_post_ID' />
			  
            </p>
          </form>";


}	
function proprice(){
	echo "$qty";
}

function getcat(){
global $db;
$get_cats = "select * from categories order by rand() LIMIT 0,5";
					$run_cats = mysqli_query($db, $get_cats);
					while ($row_cats=mysqli_fetch_array($run_cats)){
						$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
					echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
					}
}
function getcatu(){
global $db;
$get_cats = "select * from categories order by rand() LIMIT 0,5";
					$run_cats = mysqli_query($db, $get_cats);
					while ($row_cats=mysqli_fetch_array($run_cats)){
						$cat_id = $row_cats['cat_id'];
						$cat_title = $row_cats['cat_title'];
					echo "<li><a href='uindex.php?cat=$cat_id'>$cat_title</a></li>";
					}
}

                      

?>
