<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="navbar.css?ts=<?=time()?>" />
  <link rel="stylesheet" type="text/css" href="vendor_buy.css?ts=<?=time()?>" />
  
  <title>Farmer</title>
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
              <a class="nav-link" href="farmeraddnew.php">ADD <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="farmerdeletenew.php">DELETE <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">LOGOUT</a>
            </li>
          </ul>
        </div>
        
      </nav>
    <?php
 $dbhost = "localhost:3322";
 $dbuser = "root";
 $dbpass = "";
 $db = "dbms";
 $con = @new mysqli($dbhost, $dbuser, $dbpass,$db) ;
 if(!$con){
     echo "oops <br>";
    die("connection failed due to" . mysqli_connect_error());
 }
    
 $user_name = $_SESSION["user"];
 $sql="SELECT user_id FROM users WHERE user_email ='$user_name'";
$row= mysqli_query($con,$sql);


 $result = $row->fetch_assoc();
 $farmer_id = $result['user_id'];
 
 
 
 $sql1="SELECT crop_name,qty,cost FROM crop WHERE farmer_id = '$farmer_id'";
 $res= mysqli_query($con,$sql1);

 echo '<table class="container" border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">Crop Name</font> </th> 
          <th> <font face="Arial">Quantity</font> </th> 
          <th> <font face="Arial">Price</font> </th> 
      </tr>';

if ($res = mysqli_query( $con, $sql1 )) {
    while ($row1 = $res->fetch_assoc()) {
        $crop_name = $row1["crop_name"];
        $qty = $row1["qty"];
        $cost = $row1["cost"];
        
        echo '<tr> 
                  <td>'.$crop_name.'</td> 
                  <td>'.$qty.'</td> 
                  <td>'.$cost.'</td> 
                  
                   

               
              </tr>';
    }
    
    
    $res->free();
} 

 

  ?>    
  </body>
</html>