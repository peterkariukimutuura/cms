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
 <h1 style="margin-bottom: 0px;padding-bottom: 0px;">Search Record</h1><br>
 <div id="searchbox" style="width: 100%; display: block;text-align: center;">
  <input id="personname" type="text" placeholder="Try Person Name" style="width: 55%;margin-top: 0px;outline: none;">
  <button type="button" onclick="search()" style="width: 20%;padding: 5px;margin-top: 0px;background-color: #5ed45e;
    color: black;font-weight: lighter;">Search</button>
   
 </div>






<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
  function search(){
    var personname =$('#personname').val();
    if (personname!=="") {

    }else{
      alert('Enter A Person Name On The Field');
      $('#personname').css({'borderColor':'red'});
    }

  }
</script>


   

  </body>
</html>
