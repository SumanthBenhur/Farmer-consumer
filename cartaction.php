<?php
if(isset($_POST['ADD']))
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
$farmer_id=$_POST['farmer_id'];
$crop_name=$_POST['crop'];
$qty=$_POST['quantity'];

 
$sql= "SELECT cost FROM crop WHERE farmer_id = '$farmer_id '";
$row=mysqli_query($con,$sql);
$result1 = $row->fetch_assoc();
$cost = $result1['cost'];

$sql1="INSERT INTO `cart` (`crop_name`, `qty`, `cost`,`farmer_id`) VALUES ('$crop_name', '$qty', '$cost','$farmer_id')";
if($con->query($sql1)== true)
{
    
    header("Location: vendor_buy.php");
    exit;
}
 else
 {
    echo "ERROR : $sql1 <br> $con->connect_error()";
}
}



?>