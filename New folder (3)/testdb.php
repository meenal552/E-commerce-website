<?php

$dbhost="localhost"; //replace with your hostname

$dbuser = "root"; //replace with your admin username

$dbpass = "meenal"; //password of your admin

$dbname = "dbw_project";

$con =  mysqli_connect($dbhost, $dbuser, $dbpass);

if($con){

$db = mysqli_select_db($con,"meenal");
echo "connected...";
if(!$db){

echo "Could not connect to database ".mysqli_error($con);

}

}

else{

echo "could not connect to server";

}

?>