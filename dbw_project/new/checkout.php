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
<title>DapurKue | Checkout</title>
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
        <h1><a href="uindex.php">DapurKue</a></h1>
        <h2>Famously Delicious</h2>
      </div>
      <div id="headright" class="grid_7 prefix_5 omega">
        <h3 class="login"><span class="hiUser">Hi, <?php global $custe_id;
				            $custe_id = $_SESSION['customers_id'];
							$name_querry = "select * from customer where cst_id='$custe_id'";
							$run_querry = mysqli_query($con,$name_querry);
							$row_name = mysqli_fetch_array($run_querry);
							$cst_name = $row_name['f_name'];
							echo $cst_name ; ?> |</span> <span class="myAccount"><a href="#">My Account</a></span> <a href="#">Logout</a></h3>
        <p>Subtotal: $ 00.00</p>
        <p><span class="vChart"><a href="shoppingcart.html">View Cart</a></span> <span class="cOut"><a href="checkout.html">Checkout</a></span></p>
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
        <p>Winter Special Package. <em>Buy 2 Get 1 Free.</em> <a href="#" class="bookMan">More &raquo;</a></p>
      </div>
      <div class="search grid_4 omega">
        <form action="#" method="get">
          <input type="text" value="Type your keyword" id="s" name="s" onfocus="if (this.value == 'Type your keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type your keyword';}" />
        </form>
      </div>
    </div>
    <div class="pageInfo grid_16">
      <div class="dapurBlog grid_11 alpha">
        <h3>Checkout</h3>
      </div>
    </div>
    <div class="checkout grid_16">
      <div class="billInfo grid_11 alpha">
        <h4>1. Shipping Information</h4>
        <form method="post" action="checkout.php" id="comment_form">
          <fieldset>
            <label for="address">Address:</label>
            <input type="text" tabindex="4" size="50" value="" id="address" name="address" class="text" />
            <br />
            <label for="address2">&nbsp;</label>
            <input type="text" tabindex="5" size="50" value="" id="address2" name="address2" class="text" />
            <br />
            
            <label for="city">City:</label>
            <input type="text" tabindex="7" size="22" value="" id="city" name="city" class="text" />
            <br />
            <label for="state">State/Province:</label>
            <select id="state" tabindex="8">
              <option>Delhi</option>
              
            </select>
            <br />
            <label for="zip">Zip:</label>
            <input type="text" tabindex="9" size="22" value="" id="zip" name="zip" class="text" />
            <br />
            <label for="country">country:</label>
            <select id="country" tabindex="10">
              <option>India</option>
              
            </select>
            <br />
            <div class="clear"></div>
          </fieldset>
          
          <input type="submit" value="30" name="comment_post_ID" id="nextSubmit" class="button"/>
        </form>
		
		
		<?php
		
		if(isset($_POST['comment_post_ID'])){
			
			$add = $_POST['address'];
			$add2 = $_POST['address2'];
			$city = $_POST['city'];
			$zip = $_POST['zip'];
			if($add=='' OR $add2=='' OR $city=='' OR $zip=='')
			{
				echo "<script>alert('please all the fields!')</script>";
			}
			else{
			$name_querry = "update customer set address_line1 = '$add' where cst_id='$custe_id'";
			$run_querry = mysqli_query($con,$name_querry);
			$name_querry = "update customer set address_line2 = '$add2' where cst_id='$custe_id'";
			$run_querry = mysqli_query($con,$name_querry);
			$name_querry = "update customer set city = '$city' where cst_id='$custe_id'";
			$run_querry = mysqli_query($con,$name_querry);
			$name_querry = "update customer set zip = '$zip' where cst_id='$custe_id'";
			$run_querry = mysqli_query($con,$name_querry);
			if($run_querry)
			{
				echo "<script> window.top.location='checkout-2.php'</script>";
			}
			}
		}
		?>
		
      </div>
      <div class="summary grid_5 omega">
        <h4>Summary</h4>
        <div class="sumWarp">
          <ul>
            <li><a href="shoppingcart.php" class="down">Shopping Cart <span><img src="images/done.png" alt="" /></span></a>
              <ul>
                <li class="info">3 items in your cart</li>
                <li class="total">$ 000.00</li>
                <li class="clear"></li>
              </ul>
            </li>
            <li><a href="#" class="billActive">Shipping Information</a></li>
            <li><a href="#" class="billDie">Delivery Option</a></li>
            <li><a href="#" class="billDie">Payment Option</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="richContent2">
  <div class="container_16">
    <div class="lastTweet grid_4">
      <h4>Latest Tweets</h4>
      <p><a href="#">@someone</a> yes indeed this is one hell of a free css template! <a href="#">Read More</a> <span><em>15 minutes ago</em></span></p>
      <p><a href="#">@someone</a> yes indeed this is one hell of a free css template! <a href="#">Read More</a> <span><em>15 minutes ago</em></span></p>
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
      <p class="left">Copyright &copy; 2016, pathanirole.tk, All Rights Reserved</p>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
	<?php } ?>