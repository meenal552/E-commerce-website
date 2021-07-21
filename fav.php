<!doctype html>
<?php
$con = mysqli_connect("localhost","root","");
$sql="use shubham";
mysqli_query($link,$sql);
                session_start();
                $_SESSION["uname"]=$x;
                
                $checkbox1=$_POST['fav'];
                $rate=$_POST['rate'];
                $chk="";  
                foreach($checkbox1 as $chk1)  
                   {  
                      $chk .= $chk1.",";  
                   }  
                $in_ch=mysqli_query($con,"insert into reader(fav) values ('$chk') where username='$x'");  
                if($in_ch==1)  
                   {  
                      echo'<script>alert("Added Successfully")</script>';  
                   }  
                else  
                   {  
                      echo'<script>alert("Failed To Add Favourites")</script>';  
                   }  


                



                
                $s="select *from reader where username='$x'";
                $result=mysqli_query($con,$s);
                if(!mysqli_query($con,$s))
                {echo "not connecting ";}

                while($row=mysqli_fetch_array($result))

                {echo "</br>";
                $a=$row[1];$b=$row[5];$c=$row[6];}
                //echo"to change entered details "
                

                mysqli_close($con);
                ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title> User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="favicon.ico.png">
  <style>
  body{
  margin:0;
  background:url("wp2581385-hd-plain-background.jpg") ;
      background-position:center;
font-family: sans-serif;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
}
  .books{
  position: relative;
  bottom:150px;
  left:150px;
  }
  .t
  { color:white;
  }
  .btn btn-outline-light button
  {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #7d261d;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
  float:right;
  position: absolute;
  top: 50px;
  left:1650px;
  }
  
  .topnav {
  overflow: hidden;
  background-color: #4d0000;
  position:absolute;
  top:160px;
  left:0px;
  width:100%;
  border:solid;
  border-width:3px;
}


.topnav a {
  float: left;
  display: block;
  color: #f29a41;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
}


.topnav a:hover {
  background-color:#ffdede ;
  color: black;
}

.row
{ position:relative;
bottom:80px;
}
      .side{
          width:70%;
          height: 100%;
          font-size: 30px;
          color: white;
          padding:100px;
          
      }
      .fav{
          width: 30px;
          height:30px;
          border-radius: 20px;
          margin:20px 10px;
      }
      .rate{
          border-radius: 20px;
          margin: 10px;
          padding: 10px;
      }
      .sideright{
          width:607px;
          height: 100%;
          
      }
      .btn{
          margin-left: 0px;
          width: 150px;
          height:70px;
          font-size: 30px;
      }
  </style>
  </head>
  <body>
    <div class="logo">
      <img class="center" src="images/header.jpg" height="170" width="40%" />
    </div>
	<div class="topnav">
  <a href="#">HomePage</a>
  <a href="#">Visit Author Profiles</a>
  <a href="#">Hot Picks</a>
  <a href="aboutus.html">About Us</a>
  <a href="#">FAQs/Help</a>
  <a href="#">Research Papers</a>
</div>
    <div class="side">
        <?php
        echo "Reader Name :".$a."</br> Genre:   ".$b." </br>Favourites:   ".$c;
        ?>
      </div>
      
    <div class="sideright"><center>
        <form action="booksearch.php" method="post"><br/>
        <h3>Search for books</h3><br/>
        <input class="search" type="search" name="search" placeholder="SEARCH BOOKS->"><br/><br/>
        <input type="submit" class="btn btn-outline-light" value="SEARCH..">
            </form>
        </center>
    </div>
    
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    </body>
</html>
