<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}

$id=4;
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  if (is_numeric($id)) {
     $sql ="SELECT * FROM chargesheets where id='$id'";
    $results=mysqli_query($conn,$sql);
    if ($results) {
    //var_dump(mysqli_fetch_assoc($results));
      if (mysqli_num_rows($results)>0) {
        $row=mysqli_fetch_assoc($results);
      }else{
        header("location:http://localhost/courtcasesystem/Judge-Magistrate/index.php");
      }
      
    }else{
      //echo mysqli_error($conn);
    }
  }else{
    header("location:http://localhost/courtcasesystem/Judge-Magistrate/index.php");
  }
  
}else{
  header("location:http://localhost/courtcasesystem/Judge-Magistrate/index.php");
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

    <title>Police</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="css/stylesheet.css">


  </head>

  <body>
	<div id="navbar">
		<a  id="heading" href="index.php" class="pull-left" style="text-decoration: none;">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">Add Court Record</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <a href="viewchargesheet.php" id="goback">Go Back</a>


  <div class="content">

  </div><br>



  <div class="footer">
    <small>&copy 2018 Brenda, Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
