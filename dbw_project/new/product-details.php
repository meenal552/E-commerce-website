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
<title>Pathaniswad | Product Details</title>
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
        <h1><a href="index.php">Pathaniswad</a></h1>
        <h2>Famously Delicious</h2>
      </div>
      <div id="headright" class="grid_7 prefix_5 omega">
         <h3 class="login"><span class="hiUser">Hi, <?php global $custe_id;
				            $custe_id = $_SESSION['customers_id'];
							$name_querry = "select * from customer where cst_id='$custe_id'";
							$run_querry = mysqli_query($con,$name_querry);
							$row_name = mysqli_fetch_array($run_querry);
							$cst_name = $row_name['f_name'];
							echo $cst_name ; ?>|</span> <span class="myAccount"><a href="#">My Account</a></span> <a href="logout.php">Logout</a></h3>
        <p>Subtotal: $ 00.00</p>
        
        <p><span class="vChart"><a href="shoppingcart.php">View Cart</a></span> <span class="cOut"><a href="checkout.php">Checkout</a></span></p>
      </div>
    </div>
    <div id="mainMenu" class="grid_16">
      <ul>
        <li><a href="uindex.php">Home</a></li>
        <li><a href="#">Cakes</a></li>
        <li><a href="#">Order &amp; Delivery</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div id="stickySearch" class="grid_16">
      <div class="stickyNews grid_12 alpha">
        <p>Winter Special Package. <em>Buy 2 get 1 free.</em> <a href="#" class="bookMan">More &raquo;</a></p>
      </div>
      <div class="search grid_4 omega">
        <form action="#" method="get">
          <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" />
        </form>
      </div>
    </div>
    <div class="prodNav grid_16">
      <div class="breadcrumb grid_12 alpha"> <a href="#">Cakes</a> &raquo; <a href="#">Brownies</a> &raquo; Brownimissu</div>
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
      <div class="blogPage grid_11 alpha">
        <?php prodetail(); ?>
      </div>
      <div class="sideBarProd grid_5 omega">
        <div class="sideBarWarp">
          <?php uprodetailprice(); ?>
          <ul>
            <li><a href="#"><img src="images/roll12.jpg" height="30" width="30" alt="" /></a></li>
            <li><a href="#"><img src="images/roll13.jpg" height="30" width="30" alt="" /></a></li>
            <li><a href="#"><img src="images/roll14.jpg" height="30" width="30" alt="" /></a></li>
            <li><a href="#"><img src="images/roll15.jpg" height="30" width="30" alt="" /></a></li>
          </ul>
          <div class="clear"></div>
        </div>
        <div class="fiveStar">
          <h4>Our Quality Guarantee</h4>
          <p><img src="images/star.png" alt="" /> <img src="images/star.png" alt="" /> <img src="images/star.png" alt="" /> <img src="images/star.png" alt="" /> <img src="images/star.png" alt="" /></p>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. vivamus tempor justo sit amet metus cursus consequat. Nulla viverra.</p>
        </div>
        
      </div>
      <div id="chooseCake" class="grid_16">
        <div class="youLike grid_16">
          <h3>You might also like</h3>
        </div>
      </div>
      <div class="newCakes">
        <div class="newCake"><a href="#" class="grid_4"><img src="images/roll1.jpg" alt="" width="220" height="120" /></a></div>
        <div class="newCake"><a href="#" class="grid_4"><img src="images/roll2.jpg" alt="" width="220" height="120" /></a></div>
        <div class="newCake"><a href="#" class="grid_4"><img src="images/roll3.jpg" alt="" width="220" height="120" /></a></div>
        <div class="newCake"><a href="#" class="grid_4"><img src="images/roll4.jpg" alt="" width="220" height="120" /></a></div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="richContent">
  <div class="container_16">
    <div class="popularCakes grid_4">
      <h4>Popular Cakes</h4>
      <ul>
        <li><a href="#">Ultimate Choco Brownie</a></li>
        <li><a href="#">Mokakokoa Brownie</a></li>
        <li><a href="#">CoffeeBrown</a></li>
        <li><a href="#">Delicacheese</a></li>
        <li><a href="#">Berries Cheesecake</a></li>
      </ul>
    </div>
    <div class="recommended grid_4">
      <h4>Recommended</h4>
      <ul>
        <li><a href="#">Ultimate Choco Brownie</a></li>
        <li><a href="#">Mokakokoa Brownie</a></li>
        <li><a href="#">CoffeeBrown</a></li>
        <li><a href="#">Delicacheese</a></li>
        <li><a href="#">Berries Cheesecake</a></li>
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
</div></body>
</html>

<?php
			if(isset($_GET['add_cart'])){
				global $pr_id;
				$pro_id = $_GET['add_cart'];
				$pr_id = $pro_id;
				$custe_id = $_SESSION['customers_id'];
				$cart_pro_querry="select * from cart where customer_id = '$custe_id' and p_id='$pro_id'";
				$run_pro_querry = mysqli_query($con, $cart_pro_querry);
				$count = mysqli_num_rows($run_pro_querry);
				if($count>0){
					echo "<script> alert('Allready added to cart!')</script>";
					echo "<script> window.top.location='product-details.php?pro_id=$pro_id'</script>";
				}
				else{
				$cart_querry = "insert into cart (p_id,customer_id,qty)value('$pro_id','$custe_id',1)";
				$run_shops = mysqli_query($con, $cart_querry);
				echo "<script> window.top.location='product-details.php?pro_id=$pro_id'</script>";
				}
				
				
			}
			
		?>
		<?php 
		if(isset($_POST['quantity'])){
			global $pr_id;
			$custe_id = $_SESSION['customers_id'];
				$qty = $_POST['quantity'];
				echo "<script> alert('Ab ki bar....!$qty $pro_id')</script>";
				//$qtyquer = "UPDATE cart SET qty = '$qty' WHERE customer_id = '$custe_id' and p_id='$pro_id'";
				//$run_pro_querr = mysqli_query($con, $qtyquer);
		}?>
		
		
	<?php } ?>