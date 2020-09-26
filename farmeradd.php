<?php

if(isset($_POST['crop']))
{

$dbhost = "localhost:3322";
 $dbuser = "root";
 $dbpass = "";
 $db = "dbms";
 $con = mysqli_connect($dbhost, $dbuser, $dbpass,$db) ;
 if(!$con){
     echo "oops <br>";
    die("connection failed due to" . mysqli_connect_error());
 }
 extract($_POST);
$crop_name=$_POST['crop'];

$qty = $_POST['qty'];
$cost = $_POST['cost'];
$place = $_POST['place'];
$desc = $_POST['cropdesc'];

session_start();
 $user_name = $_SESSION["user"];
 



$sql="SELECT user_id FROM users WHERE user_email ='$user_name'";

$row= mysqli_query($con,$sql);

 $result = $row->fetch_assoc();
 $farmer_id = $result['user_id'];




$sqla="SELECT crop_id FROM  crop_key WHERE crop_name = '$crop_name'";
$row1=mysqli_query($con,$sqla);
$result1 = $row1->fetch_assoc();
$crop_id = $result1['crop_id'];






$sqlb="INSERT INTO `crop` ( `crop_id`, `crop_name`, `farmer_id`, `qty`, `cost`, `place`, `crop_desc`) VALUES ( '$crop_id', '$crop_name', '$farmer_id', '$qty', '$cost', '$place', '$desc')";
if($con->query($sqlb)== true){
    echo "<script>if(confirm('added succesfully.')){document.location.href='farmeraddnew.php'};</script>";
    
 }
 else{
    echo "ERROR : $sqlb <br> $con->connect_error()";
}


$con -> close();

}



 
 ?>




 