 <?php
include 'testdb.php';
$pname = $_POST['prodn'];
$rate = $_POST['price'];
$des = $_POST['desc'];
$c = $_POST['count'];
$sell=$_POST['seller'];
$img=$_POST['imsrsrc'];

$sql="INSERT INTO product_details (prod_name,price,description,count,seller_company,imgsrc)VALUES ('$pname','$rate','$des','$c','$sell','$img')";
if(!mysqli_query($con,$sql))
	die('error :'.mysqli_error($con));
//echo" false";
else 
	 {echo "record added";
$s="select *from product_details";
$result=mysqli_query($con,$s);
if(!mysqli_query($con,$s))
echo "not connecting ";
while($row=mysqli_fetch_array($result))
{//echo "$row['name']."   ".$row['phoneno']."  ".$row['email']";
echo "<br/>";
echo $row[0]." \t\t\t\t\t ".$row[1]."  ".$row[2]."  ".$row[3];
echo "<br/>";}
mysqli_close($con);

?>