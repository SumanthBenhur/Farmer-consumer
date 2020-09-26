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
  <link rel="stylesheet" type="text/css" href="farmer.css?ts=<?=time()?>" />
  <title>Farmer</title>
</head>
<body>
        

        <section>
   <div class="content">
     <h2>"If agriculture fails everything else will fail"</h2>
     <p>- M S Swaminathan  </p>
   </div>
   <div class='balance'>
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


session_start();
$user_name = $_SESSION["user"];

$sql="SELECT user_id from users where user_email= '$user_name';";
$row= mysqli_query($con,$sql);
$result = $row->fetch_assoc();
$farmer_id = $result['user_id'];
echo "BALANCE: ";

 $sql1="SELECT balance from balance where farmer_id='$farmer_id'";
 $row1= mysqli_query($con,$sql1);
 $result1 = $row1->fetch_assoc();
 $balance = $result1['balance'];

 echo $balance;
 

 
?>
</div>
 </section>


 <div class="wrapper">
  <a href="farmeraddnew.php">
   <figure class="box">
     <img src="photos/pic4.jpg" alt="img1" width="500" height="600" >
     <figcaption>
       <i class="fa fa-cloud-upload"></i>
       <h4>ADD CROP</h4>
     </figcaption>
   </figure>
</a>
<a href="farmerdeletenew.php">
   <figure class="box">
    <img src="photos/pic5.jpg" alt="img2" width="500" height="600">
    <figcaption>
      <i class="fa fa-cloud-upload"></i>
      <h4>REMOVE CROP</h4>
    </figcaption>
  </figure>
</a>
<a href="showstock.php">
  <figure class="box">
    <img src="photos/pic7.jpg" alt="img3" width="500" height="600">
    <figcaption>
      <i class="fa fa-cloud-upload"></i>
      <h4>CHECK STOCK</h4>
    </figcaption>
  </figure>
</a>

<a href="login.php">
  <figure class="box">
    <img src="photos/pic8.jpg" alt="img4" width="500" height="600">
    <figcaption>
      <i class="fa fa-cloud-upload"></i>
      <h4>LOGOUT</h4>
    </figcaption>
  </figure>
  </a>
 </div>

</body>
</html>

