<?php 
if(isset($_POST['email']))
{

$dbhost = "localhost:3322";
 $dbuser = "root";
 $dbpass = "";
 $db = "dbms";
 $con = @new mysqli($dbhost, $dbuser, $dbpass,$db) ;
 session_start();
 if(!$con)
 {
     echo "oops <br>";
    die("connection failed due to" . mysqli_connect_error());
 }

 
 if(!empty($_POST['email'] )and !empty($_POST['psw']  ))
 {
     $user=$_POST['email'];
     $pass=$_POST['psw'];
     $query="SELECT * FROM users WHERE user_email='$user' and user_pass= '$pass'";
     $result=mysqli_query($con,$query);
     $count=mysqli_num_rows($result);

     

     if($count>0)
     {
       echo "hii";
      $sql="SELECT user_type FROM users WHERE user_email='$user' ";
      $row1=mysqli_query($con,$sql);
      $result1 = $row1->fetch_assoc();
      $type=$result1['user_type'];
      echo $type;
       $_SESSION["user"]=$user;
       if($type=='farmer')
       {
        header("Location: farmer.php");
        exit;
        }
        else
        {
        header("Location:customer.php");
        exit;
        }
         echo "successful";
     }
     else
     {

         echo "unsuccessful";
     }
 }

 
 
}
    
    
?>  



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
  <link rel="stylesheet" type="text/css" href="login.css?ts=<?=time()?>" />
</head>
<body>
    

    <div class="bg-img">
        <form class="container" method="post">
          <h1>Login</h1>
      
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>
      
          <label for="psw"><b class="login-text">Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
          <button type="submit" name="submit" class="btn" onClick="location.href='login.php'">Login</button>
          <button type="button" class="btn" onClick="location.href='signup.php'">Sign-up</button>


        </form>
      </div>
</body>
</html>
