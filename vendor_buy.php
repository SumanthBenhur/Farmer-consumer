<!DOCTYPE html>
<html>
<link rel="stylesheet" href="vendor_buy.css">
<head>
  <style>
    .divScroll {
    overflow:scroll;
    height:100px;
    width:200px;
    }
    </style>
   <title>SEARCH </title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="vendor_buy.css?ts=<?=time()?>" />
  <link rel="stylesheet" type="text/css" href="vendor.css?ts=<?=time()?>" />
  <link rel="stylesheet" type="text/css" href="navbar.css?ts=<?=time()?>" />
   </head>
   <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     
        <a class="navbar-brand" href="#" ><?php session_start(); echo " HELLO " .$_SESSION["user"] ;?> </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="customer.php">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="vendor_buy.php">SEARCH<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="cartcalc1.php">MY CART<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>
      <div  class="container search" >
   <form  class ="container mt-5   "action="vendor_buy.php" method='POST'>

  
   <div class="form-group ml-1 mt-2">
            <label for="crop_name">CROP NAME</label>
            <input type="text" name="CROP_NAME" class="form-control" id="crop_name" placeholder="crop name"required>
   </div>
   
   <div class="form-group ml-1 mt-2">
            <label for="place">PLACE</label>
            <input type="text" name="PLACE" class="form-control" id="place" placeholder="place"required>
   </div>
   <div class="mx-auto" style="width: 200px;">
          <input  type="submit" name="SEARCH" value="SEARCH" class="btn btn-primary btn-lg"></input>
        </div>

   
    
    
</form>
      </div>
 


      <div  class="container search" >
<?php
if ( isset($_POST['SEARCH']))
{
$dbhost = "localhost:3322";
$dbuser = "root";
$dbpass = "";
$db = "dbms";
$con = @new mysqli($dbhost, $dbuser, $dbpass,$db) ;
if(!$con){
    echo "oops <br>";
   die("connection failed due to" . mysqli_connect_error());
}

   extract($_POST);
$field1 = $_POST['CROP_NAME'];



$field3 = $_POST['PLACE'];

$query =  "SELECT * from crop WHERE crop_name = '$field1' AND  place = '$field3'";
$res= mysqli_query($con,$query);
if(mysqli_num_rows($res) > 0){ 
  
    echo "<table> ";
        echo "<tr>"; 
            echo "<th>Crop ID</th>"; 
            echo "<th>Crop Name</th>"; 
            echo "<th>Farmer ID</th>";
            echo "<th>Cost</th>";
            echo "<th>quantity</th>";
            echo "<th>Place</th>";
            echo "<th>Description</th>";
            

        echo "</tr>"; 
    while($row = mysqli_fetch_array($res)){ 
        echo "<tr>"; 
            echo "<td>" . $row['crop_id'] . "</td>"; 
            echo "<td>" . $row['crop_name'] . "</td>"; 
            echo "<td>" . $row['farmer_id'] . "</td>"; 
            echo "<td>" . $row['cost'] . "</td>";
            echo "<td>"  .$row['qty']."</td>";
            echo "<td>" . $row['place'] . "</td>";
            echo "<td>" . $row['crop_desc'] . "</td>"; 
             echo "</tr>";
             

                 
    } 
    echo "</table>"; 
    mysqli_free_result($res); 
     } else{ 
    echo '<script>alert("NO RECORDS FOUND")</script>'; 
} 
}

?>

</div>


<div class =" container search2">
<form  class ="container mt-5 " action="cartaction.php" method='POST'>
  <div class="form-row" >
    <div class="col ml-5">
      <input type="text" name="farmer_id" class="form-control" placeholder="Farmer id">
    </div>
    <div class="col ml-5">
      <input type="text" name="crop" class="form-control" placeholder="crop name">
    </div>
    <div class="col mr-5">
      <input type="text" name="quantity" class="form-control" placeholder="quantity">
    </div>
    <div class="mx-auto" style="width: 200px;">
          <input  type="submit" name="ADD" value="ADD TO CART" class="btn btn-primary btn-lg"></input>
    </div>
  </div>
</form>
</div>

  
</body>
</html>






