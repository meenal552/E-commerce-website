<?php
$con = mysqli_connect("localhost","root","","pathaniswad");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pathaniswaad | Product Overview</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="all" href="styles/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="styles/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="styles/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<link rel="stylesheet" type="text/css" media="all" href="themes/brown/style.css" />
</head>
<body>
<div id="warp">
  <div id="main" class="container_16">
    <div id="header" class="grid_16">
      <div id="logo" class="grid_4 alpha">
        <h1><a href="index.html">Pathaniswaad</a></h1>
        <h2>Famously Delicious</h2>
      </div>
      <div id="headright" class="grid_7 prefix_5 omega">
        <h3 class="login"><a href="login.html">Sign up</a> / <a href="login.html">Login</a></h3>
        <p>Subtotal: $ 00.00</p>
        <p><span class="vChart"><a href="shoppingcart.html">View Cart</a></span> <span class="cOut"><a href="checkout.html">Checkout</a></span></p>
      </div>
    </div>
    <div id="mainMenu" class="grid_16">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Rolls</a></li>
        <li><a href="#">Order &amp; Delivery</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contactus.php">Contact</a></li>
      </ul>
    </div>
    <div id="stickySearch" class="grid_16">
      <div class="stickyNews grid_12 alpha">
        <p>Winter Special Package. <em>Buy 2 Get 1 Free.</em> <a href="#" class="bookMan">More &raquo;</a></p>
      </div>
      <div class="search grid_4 omega">
        <form action="#" method="get">
          <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" />
        </form>
      </div>
    </div>
    <div class="prodNav grid_16">
      <div class="prodHeadline grid_12 alpha">
        <h3>Rolls</h3>
      </div>
      <div class="browseCategory grid_4 omega">
        <form action="#" method="get">
          <select>
            <option>All Category</option>
            <option>Brownimissu</option>
            <option>Kue Tete</option>
            <option>Bagelan</option>
          </select>
        </form>
      </div>
    </div>
    <div class="bodyContent grid_16">
      <div class="products grid_16 alpha">
        <div class="prodMenu">
          
         
			<?php

	$get_cat = "select * from categories order by cat_id LIMIT 0,4";
	$run_cat = mysqli_query($con,$get_cat);
	

				while ($row_cat = mysqli_fetch_array($run_cat)){
					$cat_title = $row_cat['cat_title'];
					$cat_id = $row_cat['cat_id'];
					echo"
					
          <h4>$cat_title <a href='#' class='viewAll'>View All &raquo;</a></h4>";
				$get_products = "select * from products where cat_id = '$cat_id' order by date desc LIMIT 0,4";
				$run_products = mysqli_query($con,$get_products);	
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
					<div class='menu grid_4 alpha'>
            <p><a href='product-details.php?pro_id=$pro_id' class='grid_4 alpha'><img src='admin_area/product_images/$pro_image' alt='' width='220' height='120' /></a><br />
              <a href='#'>$pro_title</a></p>
          </div>
		  ";
				}}
		?>
		  
		  
		  
        
        </div>
      </div>
      <div class="commentPages grid_16">
        <ul>
          <li><a href="#">&laquo; Prev</a></li>
          <li><a href="#" class="commentPageActive">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">Next &raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="richContent2">
  <div class="container_16">
    <div class="fromBlog grid_4">
      <h4>From the blog</h4>
      <h5>New Recipes in Our Basket</h5>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. vivamus tempor justo sit amet metus cursus consequat. Nulla viverra, felis vel accumsan fermentum... <a href="#" class="bookMan">more &raquo;</a></p>
    </div>
    <div class="corporateInfo grid_4">
      <h4>Corporate Info</h4>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Term &amp; Conditions</a></li>
        <li><a href="#">Franchise</a></li>
        <li><a href="#">About us</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>
    </div>
    <div class="storeDelivery grid_4">
      <h4>Store &amp; Delivery</h4>
      <ul>
        <li><a href="#">Store Locator</a></li>
        <li><a href="#">Delivery Terms &amp;amp Pricing</a></li>
        <li><a href="#">Delivery Coverage</a></li>
        <li><a href="#">Gift Services</a></li>
        <li><a href="#">Track my order</a></li>
      </ul>
    </div>
    <div class="socialNet grid_4">
      <h4>Keep in touch</h4>
      <ul>
        <li><a href="#" class="facebook">Facebook</a></li>
        <li><a href="#" class="twitter">Twitter</a></li>
        <li><a href="#" class="feed">Feed</a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="footer">
  <div class="container_16">
    <div class="copyright grid_16">
      <p class="left">Copyright &copy; 2016, pathaniswad.tk, All Rights Reserved</p>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>


		 
		
		
		