
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
 extract($_POST);

$crop_name =$_POST['crop'];


 $user_name = $_SESSION["user"];
 $sql="SELECT user_id FROM users WHERE user_email ='$user_name'";

$row= mysqli_query($con,$sql);
$result = $row->fetch_assoc();
 $farmer_id = $result['user_id'];
 $query="DELETE FROM  crop WHERE crop_name='$crop_name' AND farmer_id = '$farmer_id'";
$result1=mysqli_query($con,$query);   
echo "<script>if(confirm('deleted succesfully.')){document.location.href='farmerdeletenew.php'};</script>";
  
  
$con -> close();
?>

