<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}




 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Prosecutor</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="../Police/css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a  id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">Charge Sheet View</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <a href="index.php" id="goback">Go Back</a>


  <div class="content">
    
  </div><br><br><br>



  <div class="footer">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
