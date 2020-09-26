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


$sql="TRUNCATE table cart";
$result = mysqli_query($con,$sql);
echo "<script>if(confirm('payment successful.')){document.location.href='customer.php'};</script>";

?>