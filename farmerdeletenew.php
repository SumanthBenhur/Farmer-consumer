<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="del.css?ts=<?=time()?>" />  
  <link rel="stylesheet" type="text/css" href="navbar.css?ts=<?=time()?>" />  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php session_start(); echo "HELLO !" .$_SESSION['user'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="farmeraddnew.php">ADD <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="farmerdeletenew.php">DELETE <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="farmer.php">HOME<span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">LOGOUT</a>
            </li>
          </ul>
        </div>
      </nav>


      <div class = "container   a">
      <form class ="container mt-5" action="farmerdelete.php" method="post">
        <div class="del">DELETE</div>
        
           <div class="col-auto my-1">
              <label class="mr-sm-2 mr-2 ml-2  " for="inlineFormCustomSelect">CROP</label>
              <?php
               $dbhost = "localhost:3322";
               $dbuser = "root";
               $dbpass = "";
               $db = "dbms";
               $con = @new mysqli($dbhost, $dbuser, $dbpass,$db) ;
               
               $query=mysqli_query($con,"SELECT crop_name,crop_id FROM crop_key ");
               $row_count=mysqli_num_rows($query);
  
               ?>
  
              <select class="custom-select mr-sm-2" name="crop"   id="inlineFormCustomSelect">
                  <option value="" name="crop" >select any one</option>               
                   <?php
                    
                    for($i=0 ;$i<$row_count;$i++)
                       {$row = mysqli_fetch_array($query);
                    
                  ?>
                  <option value = "<?php echo  $row['crop_name'];?>"><?php echo $row["crop_name"];?></option>
                       <?php } ?> 
                  
              </select>
              
            </div>
        
        <div class="mx-auto b" >
          <input type="submit" value="DELETE" name ="del" class="btn btn-primary btn-lg"></input>
        </div>
      </div>
      </form>
      </div>
    
</body>
</html>