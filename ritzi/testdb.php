<?php

$dbhost="localhost"; //replace with your hostname

$dbuser = "root"; //replace with your admin username

$dbpass = ""; //password of your admin

$dbname = "ritzy";

$con =  mysqli_connect($dbhost, $dbuser, $dbpass);

if($con){
echo "connected...";
}
else{
echo "could not connect to server";
}
$sql="use ritzy";
mysqli_query($con,$sql);

?>