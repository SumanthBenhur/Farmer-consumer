<?php
if(isset($_POST['user_name']))
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
 
 
 //echo"Successful";
 $user_name=$_POST['user_name'];
 $user_email=$_POST['user_email'];
 $user_type=$_POST['user_type'];
 $user_pass=$_POST['user_pass'];
 $user_address=$_POST['user_address'];
 $user_city=$_POST['user_city'];
 $user_ph=$_POST['user_ph'];
 

 
 $sql="INSERT INTO `users` (`user_name`,`user_type`, `user_email`,  `user_pass`, `user_address`, `user_city`, `user_ph`) VALUES ( '$user_name','$user_type', '$user_email', '$user_pass', '$user_address', '$user_city', '$user_ph');";

    if($con->query($sql)== true){
       header("Location: login.php");
       exit;
    }

    else{
        echo "ERROR : $sql <br> $con->connect_error()";
    }
    $con -> close();
}
    ?> 



<!DOCTYPE html >
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="signup.css?ts=<?=time()?>" />  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
</head>
<body class="container signup">

  <div class="sign">SIGN UP</div>
    <form  METHOD= "POST">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputname">Name</label>
            <input type="text" name="user_name" class="form-control" id="inputname" placeholder="Enter you name"required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputemail">E-mail</label>
            <input type="email" name="user_email" class="form-control" id="inputemail" placeholder="Enter you email"required>
          </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">User Type</legend>
              <div class="col-sm-4">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="user_type" id="farmer" value="farmer" checked>
                  <label class="form-check-label" for="farmer">
                    Farmer
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="user_type" id="customer" value="customer">
                  <label class="form-check-label" for="customer">
                    Customer
                  </label>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputpass">Password</label>
                <input type="password" name="user_pass" class="form-control" id="inputpass" placeholder="Choose a Password"required>
              </div>
            </div>
          </fieldset>
        <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" name="user_address" class="form-control" id="inputAddress" placeholder=""required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" name="user_city" class="form-control" id="inputCity">
          </div>
          <div class="form-group col-md-6">
            <label for="inputno">Phone Number</label>
            <input type="number" name="user_ph" class="form-control" id="inputno" placeholder="Enter your contact number"required>
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        
      </form>
    
</body>
</html>