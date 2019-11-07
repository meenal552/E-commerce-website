<?php
include 'testdb.php';
$name = $_POST['name'];
$mob = $_POST['mobile'];
$add = $_POST['address'];
$em = $_POST['email'];
$pass=$_POST['password'];

$sql="INSERT INTO loginpage (cust_name,mobile_no,address,email,password)VALUES ('$name','$mob','$add','$em','$pass')";
if(!mysqli_query($con,$sql))
	die('error :'.mysqli_error($con));
//echo" false";
else 
	{echo "record added";
$s="select *from loginpage";
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