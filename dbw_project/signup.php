 <?php
include 'testdb.php';
$name = $_POST['name'];
$mob = $_POST['mobile'];
$add = $_POST['address'];
$em = $_POST['email'];
$pass=$_POST['password'];


session_start();
$_SESSION["mailid"]=$em;
$_SESSION["mobile"]=$mob;



$sql="INSERT INTO loginpage (cust_name,mobile_no,address,email,password)VALUES ('$name','$mob','$add','$em','$pass')";
if(!mysqli_query($con,$sql))
	die('error :'.mysqli_error($con));
//echo" false";
else 
	{echo "record successfully added";}
$s="select *from loginpage where cust_id=(select max(cust_id) from loginpage)";
$result=mysqli_query($con,$s);
if(!mysqli_query($con,$s))
{echo "not connecting ";}

while($row=mysqli_fetch_array($result))

{echo "</br>";
echo "name :".$row[1]."</br> mobile number:   ".$row[2]." </br>address:   ".$row[3]."</br> email:  ".$row[4];}
//echo"to change entered details "
echo "<script>setTimeout(\"location.href = 'ritziattire.html';\",3000);</script>";

mysqli_close($con);
?>