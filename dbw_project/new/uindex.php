<?php 
session_start();
if(!isset($_SESSION['customers_id'])){
	header("location: login.php");
}

	else{
?>
<?php
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<body>
<div id="warp">
  <div id="main" class="container_16">
    <div id="header" class="grid_16">
      <div id="logo" class="grid_4 alpha">
        <h1><a href="uindex.php">PathaniSwad</a></h1>
        <h2>Famously Delicious</h2>
      </div>
      <div id="headright" class="grid_7 prefix_5 omega">
	   <h3 class="login"><span class="hiUser">Hi, <?php global $custe_id;
				            $custe_id = $_SESSION['customers_id'];
							$name_querry = "select * from customer where cst_id='$custe_id'";
							$run_querry = mysqli_query($con,$name_querry);
							$row_name = mysqli_fetch_array($run_querry);
							$cst_name = $row_name['f_name'];
							echo $cst_name ; ?></span>|<span class="myAccount"><a href="#">My Account</a></span><a href="logout.php">Logout</a></h3>
        <p>Subtotal: $ 00.00</p>
        
		
        <p><span class="vChart"><a href="shoppingcart.php">View Cart</a></span> <span class="cOut"><a href="checkout.php">Checkout</a></span></p>
      </div>
    </div>
    <div id="mainMenu" class="grid_16">
      <ul>
        <li><a href="uindex.php" class="aActive">Home</a></li>
        <li><a href="#">Rolls</a></li>
        <li><a href="#">Order &amp; Delivery</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
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
	<div class='products grid_16'>
      <div class='productsWarp'>
        <ul>
          <?php getpro(); ?>
		  </ul>
      </div>
    </div>
	
    <div class="productThumb grid_10 prefix_3 suffix_3">
      <ul>
	  <?php getproi(); ?>
      </ul>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="fresh">
  <div class="container_16">
    <div id="freshCake" class="grid_16">
      <div class="grid_1 alpha"> <a class="prevButton">&laquo;</a></div>
      <div class="headLine grid_14">
        <h3>Fresh from the oven</h3>
      </div>
      <div class="grid_1 omega"> <a class="nextButton">&raquo;</a></div>
    </div>
    <div class="newCakes">
      <div class="scroller">
        <?php getprou(); ?>
	  </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="richContent">
  <div class="container_16">
    <div class="popularCakes grid_4">
      <h4>Popular Items</h4>
      <ul>
        <?php getcat(); ?>
      </ul>
    </div>
    <div class="recommended grid_4">
      <h4>Recommended</h4>
      <ul>
       <?php getrecpro(); ?>
      </ul>
    </div>
    <div class="specialOffer grid_4">
      <h4>Special Offer</h4>
      <ul>
        <li><a href="#">Ultimate Choco Brownie</a></li>
        <li><a href="#">Mokakokoa Brownie</a></li>
        <li><a href="#">CoffeeBrown</a></li>
        <li><a href="#">Delicacheese</a></li>
        <li><a href="#">Berries Cheesecake</a></li>
      </ul>
    </div>
    <div class="orderPhone grid_4">
      <h4><em>Order by Phone</em> <span>08470908549</span></h4>
    </div>
    <div class="clear"></div>
  </div>
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
        <li><a href="#">Delivery Terms &amp; Pricing</a></li>
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
      <p class="left">Copyright &copy; 2016, PathaniSwad.tk, All Rights Reserved</p>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div></body>
</html>
<?php } ?>