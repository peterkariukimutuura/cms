<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';

if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}else{
  if ($_SESSION['occupation']!=="Clerk") {
    $_SESSION['errormessage']="Kindly login With A Clerk Account to  Proceed!";
    header("location:http://localhost/courtcasesystem/login/");
  }
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

    <title>Clerk</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a id="heading" class="pull-left">Court Case System</a>
     <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
     <a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
 <h1>Clerk,Page</h1><br>
<p>Welcome <?php echo $_SESSION['username']; ?>, You are now logged In as <?php echo $_SESSION['occupation']; ?></p><br>
<p><?php echo $_SESSION['email']; ?></p>






<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
