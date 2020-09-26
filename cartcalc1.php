<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="vendor_buy.css?ts=<?=time()?>" /> 
  <link rel="stylesheet" type="text/css" href="navbar.css?ts=<?=time()?>" /> 
  <link rel="stylesheet" type="text/css" href="cart.css?ts=<?=time()?>" /> 
    <title>CART</title>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light  ">
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
$query = "SELECT * FROM cart";
$res= mysqli_query($con,$query);
$total_amount = 0;
$total_price = 0;

echo '<table class="container" border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial">Crop Name</font> </th> 
          <th> <font face="Arial">Quantity</font> </th> 
          <th> <font face="Arial">Price</font> </th> 
          <th> <font face="Arial">Total Price</font> </th> 
        
      </tr>';

if ($result = mysqli_query( $con, $query )) {
    while ($row = $result->fetch_assoc()) {
        $crop_name = $row["crop_name"];
        $qty = $row["qty"];
        $cost = $row["cost"];
        $total_price = ($cost * $qty);
        $total_amount=($total_amount + $total_price);
        echo '<tr> 
                  <td>'.$crop_name.'</td> 
                  <td>'.$qty.'</td> 
                  <td>'.$cost.'</td> 
                  <td>'.$total_price.'</td> 
                   

               
              </tr>';
    }
    
    $result->free();
} 
?>

<div class = "container search">
<div class = "container total">YOUR TOTAL AMOUNT IS <?php echo $total_amount ?></div>

<form action="emptycart.php" method= 'POST'>
<div class="mx-auto"style="width: 200px; margin-top=50%;" >
          <input type="submit" value="MAKE PAYMENT" name ="pay" class="btn btn-primary btn-lg " ></input>
        </div>
</form>
</body>
</div>
</html>
        
