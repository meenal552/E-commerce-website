
<?php
 include 'testdb.php';
 session_start();

$p=$_SESSION['mailid'];
$img=$_SESSION['img'];
//echo $img;
if(isset($p))
{
	$s1="select cust_id from loginpage where email like '%$p%'";
$result1=mysqli_query($con,$s1);
if (!$result1) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
//echo $_SESSION['mailid'];
$s2="select prod_id from product_details where imgsrc like '%$img%'";
$result2=mysqli_query($con,$s2);
if (!$result2)
 {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row=mysqli_fetch_array($result1)and$r=mysqli_fetch_array($result2) )
{$sql="INSERT INTO buy_now values($row[0],$r[0],2,'M')";
if(!mysqli_query($con,$sql))
	die('error :'.mysqli_error($con));
else 
	 echo "added to cart";
     
}

}
else
{
	 echo "<script>setTimeout(\"location.href = 'login.html';\",100);</script>";

}
            // $i= $_SESSION["img"];
             //$_SESSION['images']=array();
             //array_push($_SESSION["images"],$i);
              
             $p=$_SESSION['mailid'];
             $sql="select cust_id,prod_id from buy_now where cust_id in (select cust_id from loginpage where email like '%$p%')";
             $result=mysqli_query($con,$sql);

                if(!$result)
                    echo " no query selected  ";
                while($row=mysqli_fetch_array($result))
                {
                       $s="select imgsrc,prod_name,price from product_details where prod_id=$row[1]";
                        $r=mysqli_query($con,$s);
                        if(!$r)
                        echo " no query selected  ";
                    
                    $row2=mysqli_fetch_array($r);
                    $d=$row[0];
                    $name=$row[1];
                    $price=$row2[2];
                     
                }  
                     


 ?>
<!doctype html>
<html>
<head>

<title>buynow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <style>
      body{
        background-color: rgb(227, 227, 227);
      }
        .btn{
            width:150px;
            font-family:"Cambria";
            border-radius:20px;

        }
        .list{
            list-style: none;
            font-family:"Cambria";
        }
        .list a{
            color:gray;
            text-decoration: none;
        }
        .list a:hover{
            color:white;
        }
        .list li h3{
            color:white;
            
        }
        .image1,.image2,.image3,.image4,.image5,.image7,.image8{
            border-radius: 20px;
            background: white;
            width:50px;
            height:50px;
            padding:12px;
            margin:20px;
            transition: all ease 0.75s;
        }
        .image6{
            margin-left: 0px;
            border-radius: 20px;
            background: white;
            width:50px;
            height:50px;
            transition: all ease 0.75s;
            padding:12px;
        }
        .btn1{
            border-style: none;
            width:60px;
            height:60px;
            border-radius: 20px;
            margin:0px 10px 0px 10px;
            background: #060029
        }
        .image1{
            margin-left:350px;
        }
        .image1:hover{
            background:linear-gradient(#3025FF,#FF007A,#FFEA00);
        }
        .image2:hover{
            background:#3250FF;
        }
        .image3:hover{
            background: #2AADFF;
        }
        .image4:hover{
            background: #3AF833;
        }
        .image5:hover{
            background:red;
        }
        .image6:hover{
            background: #4A61A6;
        }
        
        .image7:hover{
            background: #C7FA3B;
        }
        .image8:hover{
            background: #1FD7FA;
        }
        .img1,.img2,.img3,.img4{
            margin:20px;
        }
        .img1{
            margin-left: 370px;
        }
        .head{
            margin-left: 450px;
            margin-top: 50px;
            color: white;
            font-size: 25px;
            font-family: "Cambria";
        }
        .navbar-brand{
            font-size: 30px;
            font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
        }
        .form-inline{
            margin-right:10px;
        }
        .box{
            width:50%;
            height:350px;
            background: white;
            margin: 100px 100px;
            padding: 40px;
            border-radius: 20px;
            float: left;
            
        }
        .box1{
            width:25%;
            height:350px;
            background: white;
            margin: 100px 50px;
            padding: 50px;
            border-radius: 20px;
            float: left;
        }
        .dress{
            height:200px;
            width:130px;
            border-radius: 20px;
        }
        .address{
            margin-left: 10px;
        }
        .place{
            margin:20px 75px;
        }
        .welcome{
            color:black;
            font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
            margin:0px auto;
            font-size: 40px;
        }
        .btn a{
            text-decoration: none;
            color: White;
        }
        .register{
            margin:-38px 0px 0px 200px;
        }
        .forgot{
            margin:-35px 0px 0px 500px;
        }
        .forgot a{
            color: white;
            font-size: 20px;
        }
        .forgot a:hover{
            color:#0B3BA2;
        }
        .form-control{
          border-radius: 20px;
        }
        .form-control-address{
        margin-left: 5px;
        max-width: 400px;
        border-radius: 20px;
        padding-left: 10px;
        }
        .logo{
            height: 60px;
            width:130px;
            margin:0px;
            
            padding: 0px;
            
        }
        .logoimg{
            width:180px;
            height:180px;
            margin:-55px 0px 0px -30px;
        }
        .top{
            margin-left: 50px;
        }
        .ratio{
            margin-top: 15px;
        }
        .media-body{
            margin-top: 30px;
        }
    </style>
</head>

<body>
        <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#060029">
              <a class="navbar-brand logo" href="#"><img class="logoimg" src="logo.png"></img></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto top">
                  
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Men
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Kurta</a>
                      <a class="dropdown-item" href="#">Sherwani</a>
                      <a class="dropdown-item" href="#">Nehru Jackets</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">More Styles</a>
                    </div>
                  </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Women
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Saree</a>
                      <a class="dropdown-item" href="#">Salwar Kameez</a>
                      <a class="dropdown-item" href="#">Lehenga</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">More Styles</a>
                    </div>
                  </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Kids & baby
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">For Girls</a>
                      <a class="dropdown-item" href="#">For Boys</a>
                      
                    </div>
                  </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action ="search.php" method="post">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search for products, brands and more..." aria-label="Search" size="90" name="prod">
                    <button type="submit" class="btn1"><img class='image6' src= 'search_40px.png'/></button>
                  <!--<input type="submit" value="<img claxss='image6' src= 'search_40px.png'/>" class="btn btn-outline-dark"/>-->
                </form> 
                  <div class="icon"><a href="cart.php"><img class="image7" src="shopping_cart_40px.png"/></a>
                  </div>
                  <div class="icon1"><a href="signout.php"><img class="image8" src="user_male_circle_filled_40px.png"/></a></div>
              </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
            <div class="box">
                <h2>MY CART</h2>
                <div class="media">
                    <div class="ratio">
               <?php
              
                    echo"
                  <img src='$d' class='mr-3 dress' alt='...'><br/><br/>";
            
                        
                        ?>
                 
                    
                </div>
              <div class='media-body'>
                  <?php
                 /* foreach($name as $n)
             {
                echo "<br/><h3 class='mt-0'>$n</h3>";
                      
             }
                  foreach($price as $p)
             {
                echo "<h4>$p</h4>";
             }*/
                  
                      echo "<h3>$name</h3><br/>"; echo "<h4>Rs.$price</h4><br/><br/><br/><br/><br/>";
                  
                  
              ?>
              
               
            </div>
                
                </div>
                </div>
            <div class="box1">
            <h2>PRICE DETAILS</h2>
                <br/>
                <h3>Total Payable:</h3>
                <?php
                echo "<h4>Rs.$price</h4>";
                ?>
                <br/>
                <form action="payment.html">
                <div class="place">
                    <button type="submit" class="btn btn-primary">Continue</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid " style="background-color:#060029">
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <ul class="list">
                      <li><h3>Information</h3></li>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">BLOG</a></li>
                    <li><a href="#">IN MEDIA</a></li>
                    <li><a href="#">TERMS AND CONDITIONS</a></li>
                    <li><a href="#">CONTACT US</a></li>
                  </ul>
            
                  
                      <ul class="list">
                          <li><h3>Need Help</h3></li>
                        <li><a href="#">USER LOGIN</a></li>
                        <li><a href="#">SELLER LOGIN</a></li>
                        <li><a href="#">MY CART</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">OFFERS AND DISCOUNTS</a></li>
                        <li><a href="#">SUPPLIES</a></li>
                      </ul>
                    
                    </div>
                    <div class="col-md-8">
                        <form>
                            <font face="Cambria" color="white" size="5">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">To know more about recent arrivals, sales, and breathtaking combo offers - SUBSCRIBE!</small>
                          </div>
                          
                          
                          <button type="submit" class="btn btn-primary">Subscribe</button>
                                </font>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#"><img class="image1" src="instagram_filled_30px.png"></a>
                            <a href="#"><img class="image2" src="facebook_circled_filled_30px.png"></a>
                            <a href="#"><img class="image3" src="twitter_circled_filled_30px.png"></a>
                            <a href="#"><img class="image4" src="whatsapp_filled_30px.png"></a>
                            <a href="#"><img class="image5" src="gmail_filled_30px.png"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="head">PAYMENT OPTIONS</h3>
                            <img class="img1" src="visa.png">
                            <img class="img2" src="paytm.png">
                            <img class="img3" src="rupay.png">
                            <img class="img4" src="mastercard.png">
                        </div>
                    </div>
                  
                  </div>
                
                 
              </div>
            </div>
        </div>
    </div>
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>