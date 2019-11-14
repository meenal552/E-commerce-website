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
<title>Pathaniswad | ShoppingCart</title>
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
							echo $cst_name ; ?></span>|<span class="myAccount"><a href="#">My Account</a></span> <a href="logout.php">Logout</a></h3>
        <p>Subtotal: $ 00.00</p></div>
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
        <p>winter Special Package. <em>Buy 2 Get 1 Free.</em> <a href="#" class="bookMan">More &raquo;</a></p>
      </div>
      <div class="search grid_4 omega">
        <form action="#" method="get">
          <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" />
        </form>
      </div>
    </div>
    <div class="prodNav grid_16">
      <div class="prodHeadline grid_16">
        <h3>Your Shopping Cart</h3>
      </div>
    </div>
    <div class="bodyContent grid_16">
      <div class="shopCart grid_16 alpha">
        <div class="headCart grid_16 alpha">
          <div class="itemHead grid_9 alpha"> Item Description</div>
          <div class="priceHead grid_2"> Price</div>
          <div class="qtyHead grid_1"> Qty</div>
          <div class="subtotalHead grid_2"> Subtotal</div>
          <div class="remHead grid_2 omega"> Remove</div>
        </div>
        <form action="shoppingcart.php" method="post">
          <div class="bodyCart grid_16 alpha">
            
            
			
			
			<?php
				$total=0;
				$counter=-1;
				$sub_total=0;
				global $pro_id;
				global $single_price;
				global $counter;
				
					$name_querry = "select * from cart where customer_id='$custe_id'";
							$run_querry = mysqli_query($con,$name_querry);
						while($p_price = mysqli_fetch_array($run_querry)){
							$pro_id = $p_price['p_id'];
							$crt_id = $p_price['cart_id']; 
							$qtyy = $p_price['qty']; 
							$pro_price = "select * from products where product_id='$pro_id'";
							$run_pro_price = mysqli_query($con,$pro_price);
							while($pp_price = mysqli_fetch_array($run_pro_price)){
								$product_price = array($pp_price['product_price']);
								$product_title = $pp_price['product_title'];
								$product_image = $pp_price['product_img'];
								$single_price = $pp_price['product_price'];
								$sub_total = $single_price * $qtyy;
								$sub_ttal = array($single_price * $qtyy);
								$values = array_sum($sub_ttal);
								$total +=$values;
								
								$counter++;
									?>
									<div class="warpCart">
              <div class="item grid_9 alpha">
                <p><a href="product-details.php?pro_id=<?php echo $pro_id ?>"><img src="admin_area/product_images/<?php echo $product_image;?>" height="35" width="30" alt="" /></a> <?php echo $product_title; ?><br />
                  <span>Size: Large (24pcs)</span></p>
              </div>
              <div class="price grid_2">
                <p><?php echo"Rs.".$single_price;?></p>
              </div>
              <div class="qty grid_1">
			  
                <input type="number" size="1" min="1" max="25" value="<?php echo $qtyy; ?>"  name="qty[]" id="qty"/>
				<?php
		        global $con;
				if(isset($_POST['update_cart'])){
                $qty_id = $_POST['qty'][$counter];
				$qtyq = "update cart set qty = '$qty_id' where p_id = '$pro_id' AND customer_id = '$custe_id'";
				$run_de = mysqli_query($con,$qtyq);
				if($run_de){
			    echo "<script> window.top.location='shoppingcart.php'</script>";
				
				}
				}
		        ?>
				
		
              </div>
              <div class="subtotal grid_2">
                <p><b> Rs.<?php echo $sub_total; ?> </b>
                </p>
              </div>
              <div class="remove grid_2 omega">
                <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" />
              </div>
            </div>
			<?php }} ?>
			
		</div>
          <div class="footCart grid_16 alpha">
            <div class="grandTotal grid_3 prefix_11 alpha"> Grand Total</div>
            <div class="totalPrice grid_2 omega"><?php echo "Rs.".$total;?></div>
          </div>
          <div class="buttonCart grid_16 alpha">
            <a href="uindex.php"><input type="button" value="Continue Shopping" name="Continue Shopping" class="continueShop" /></a>
            <a href="checkout.php"><input type="button" value="Checkout" name="Checkout" class="checkoutCart" /></a>
            <input type="submit" value="update_Cart" name="update_cart" class="updateCart" />
            <div class="clear"></div>
          </div>
        </form>
			
		<?php
		global $con;
		if(isset($_POST['update_cart'])){
			if(isset($_POST['remove'])){
				foreach($_POST['remove'] as $remove_id){
				$del = "delete from cart where p_id = '$remove_id' AND customer_id = '$custe_id'";
				$run_del = mysqli_query($con,$del);
				if($run_del){
					//echo "<script> window.top.location='shoppingcart.php'</script>";
					header('location: shoppingcart.php');
			}
			}
			}
		}
		
		?>
		
		
		
		
		
		
		
		
		
		
		
      </div>
      <div id="chooseCake" class="grid_16">
        <div class="youLike grid_16">
          <h3>You might also like</h3>
        </div>
      </div>
      <div class="newCakes">
        <div class="newCake"><a href="product-details.html" class="grid_4"><img src="images/roll1.jpg" alt="" width="220" height="120" /></a></div>
        <div class="newCake"><a href="product-details.html" class="grid_4"><img src="images/roll2.jpg" alt="" width="220" height="120" /></a></div>
        <div class="newCake"><a href="product-details.html" class="grid_4"><img src="images/roll3.jpg" alt="" width="220" height="120" /></a></div>
        <div class="newCake"><a href="product-details.html" class="grid_4"><img src="images/roll4.jpg" alt="" width="220" height="120" /></a></div>
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
      <p class="left">Copyright &copy; 2010, pathaniswad.tk, All Rights Reserved</p>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
<?php } ?>