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
{$sql="INSERT INTO customer_orders values($row[0],$r[0])";
if(!mysqli_query($con,$sql))
	die('error :'.mysqli_error($con));
else 
	 {echo "added to cart";
      echo "<script>setTimeout(\"location.href = 'ritziattire.html';\",1500);</script>";
      }
}

}
else
{
	 echo "<script>setTimeout(\"location.href = 'login.html';\",100);</script>";

}
//if(isset($_POST['buy']))
//{
	//$s="select prod_id from product_details where imgsrc='$img'";


/*$s1="select cust_id from loginpage where email like '%$p%'";
$result=mysqli_query($con,$s1);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row=mysqli_fetch_array($result))
echo $row[0]." hello";
echo $_SESSION['mailid'];
	//$sql="INSERT INTO customer_orders values()";
//} */
?>

	
