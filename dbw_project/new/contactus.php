<?php session_start(); ?>
<?php
include("includes/db.php");
//include("functions/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pathaniswad | Login</title>
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
      </div>
    </div>
    <div id="mainMenu" class="grid_16">
      <ul>
        <li><a href="index.php">Home</a></li>
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
	<div class="newAccount alpha">
	
	       <h4 align = "center" style="color:brown;text-decoration:underline">Our Contacts</h4><br><br> 
		   </div>
    <div class="checkout grid_16">
	       
      <div class="newAccount grid_8 alpha">
        
        <form method="post" action="login.php">
          <fieldset>
		  <h4>Contacts Form</h4>
            <label for="firstName">Your Name: </label>
            <input type="text" tabindex="1" size="50" value="" id="firstName" name="firstName" class="text" />
            <br />
            <label for="email">Your E-mail: </label>
            <input type="text" tabindex="2" size="50" value="" id="lastName" name="lastName" class="text" />
            <br />
            <label for="email">Subject:</label>
            <input type="text" tabindex="3" size="50" value="" id="email" name="email" class="text" />
            <br />
			<label for="email">Message.:</label>
            <textarea type="text" tabindex="3" cols="45" rows="5" id="email" name="msg" ></textarea>
            <br />
			<br>
			<input type="submit" value="send" tabindex="6" name="send" class="sendmsgButton" />
            <div class="clear"></div>
          </fieldset>
          <input type="hidden" value="30" />
        </form>
      </div>
      <div class="loginPage grid_8 omega">
	  <br>
        <h4 align="right">Contacts Information</h4>
                  <fieldset>
            
<h1>
<p align="right">
Telphone:
08470908549
</p>
<p align="right">
FAX:
+1 800 899 9898
</p>
<p align="right">
E-mail:
mail@pathaniswaad.com</p><h1>
          </fieldset>
         
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
      <p class="left">Copyright &copy; 2016, pathaniswad.tk, All Rights Reserved</p>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>


<?php
global $con;
if(isset($_POST['update'])){
	$First_name = $_POST['firstName'];
	$Last_name = $_POST['lastName'];
	$ph_no = $_POST['phone_no'];
	$email_id = $_POST['email'];
	$pass = $_POST['password'];
	$cpass = $_POST['repassword'];
	$pwd_que = "select * from customer where email_id='$email_id'";
	$run_products = mysqli_query($con,$pwd_que);
	$count = mysqli_num_rows($run_products);
	if($count>0){
		echo "<script> alert('Allready registered!')</script>";
		exit();
	}
	if($First_name=='' OR $Last_name=='' OR $ph_no=='' OR $email_id=='' OR $pass=='' OR $cpass==''){
		echo "<script> alert('Please fill all the fields!')</script>";
		exit();
	}
	
	elseif($pass!=$cpass)
	{
	echo "<script> alert('Password not match!')</script>";
		exit();	
	}
	else{
		$pass = md5($pass);
	$insert_product = "insert into customer (f_name,l_name,email_id,phone,pass) value('$First_name','$Last_name','$email_id','$ph_no','$pass')";
	$run_product = mysqli_query($con,$insert_product);
	if($run_product){
		echo"<script>alert('Registered successfully!')</script>";
	}
	}
}
?>

<?php
global $con;
if(isset($_POST['login'])){
	
	$email_id = $_POST['loginemail'];
	$pass = $_POST['loginpassword'];
	$pwd_que = "select * from customer where email_id='$email_id'";
	$run_products = mysqli_query($con,$pwd_que);
	if($email_id=='' OR $pass==''){
		echo "<script> alert('Please fill all the fields!')</script>";
		exit();
	}
	$count = mysqli_num_rows($run_products);
	if($count==0){
		echo "<script> alert('Please fill a valid emailid!')</script>";
		exit();
	}
	$row_products = mysqli_fetch_array($run_products);
	$cust_id=$row_products['cst_id'];
	$valid_pwd=$row_products['pass'];
	$pass = md5($pass);
	if($pass == $valid_pwd){
		$_SESSION['customers_id'] = $cust_id;
		echo "<script> window.top.location='uindex.php'</script>";
		exit();
	}
	else
	{
	echo "<script> alert('Password not match!')</script>";
	exit();	
	}
	}

?> 