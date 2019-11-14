<!DOCTYPE HTML>
<html>
<head>
<meta http-eequiv="Content-type"content="text/html; charset=utf-8">
<title>Purohit</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body> 

<div class="main_wrapper">



     
	 

	 
	 
	 
	 
 <div class = "content_wrapper">
	<form method = "post" action="log_in.php" enctype="multipart/form-data"><br><br>
		<b style="color:yellow;padding-right:15px;padding-left:350px;">Email ID</b>
		<input type="text" name="user_id" /><br>
		<b style="color:yellow;padding-right:12px;padding-left:350px;">Password</b>
		<input type="password" name="pwwd" /><br><br>
		<input type="submit" name="login" value="Login" style="margin-left:450px;"/><br><br>
	</form>
</div>
	 
	 
      
	 


</body>
</html>

<?php

if(isset($_POST['login'])){
	
	$email_id = $_POST['user_id'];
	$pass = $_POST['pwwd'];
	
	if($email_id=='pathaniswad' AND $pass=='JAIpathani'){
		header('Location: insert_product.php');
		exit();
	}
	
	else
	{
	echo "<script> alert('Password not match!')</script>";
	exit();	
	}
	}

?> 