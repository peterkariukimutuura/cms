<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}


$sql = "SELECT chargesheets.charge,chargesheets.name,chargesheets.dateofarrest,prosecutorremarks.remarks
,prosecutorremarks.status
  FROM  chargesheets INNER JOIN prosecutorremarks ON chargesheets.id=prosecutorremarks.chargesheet";
  $results=mysqli_query($conn,$sql);
  // if ($results) {
  //   if (mysqli_num_rows($results)>0) {
  //     while ($row=mysqli_fetch_assoc($results)) {
  //       echo $row['charge'] .'<br>';
  //     }
  //   }else{
  //     echo "nothing!";
  //   }
    
  // }else{
  //   echo mysqli_error($conn);
  // }




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
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">View Reviews</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <a style="padding: 8px;" href="index.php" id="goback">Go Back</a>
<br>
<br>

  <div class="content">
    <?php if($results): ?>
      <?php if(mysqli_num_rows($results)>0): ?>
        
        <?php while($row=mysqli_fetch_assoc($results)): ?>
          <div style="width: 80%;margin: 10px auto; padding: 10px;background-color: #d0e0d0;">
            <h3> <small style="color: green">Suspect</small> <?php echo $row['name']; ?></h3>
            <div style="padding: 15px;background-color: #f9f9f9;">
              <small style="color: green">Charge</small>
              <p style="margin: 0px;padding: 0px;"> <?php echo  $row['charge']; ?>
            </div>
            <div style="padding: 15px;background-color: #f9f9f9;">
              <small style="color: green">Charge Sheet Status</small>
              <p style="margin: 0px;padding: 0px;"> <?php echo  $row['status']; ?>
            </div>
            <div style="padding: 15px;background-color: #f9f9f9;">
              <small style="color: green">Prosecutor Remarks</small>
              <p style="margin: 0px;padding: 0px;"> <?php echo  $row['remarks']; ?>
            </div>

            </p>
          </div>

        <?php endwhile; ?>

        <?php else: ?>
          <div style="width: 300px;margin: 50px auto;padding: 20px;    background: #11a230;text-align: center;color: white;">
            There Are No Records Of Past Reviews .
          </div>
      <?php endif; ?>
    <?php else: ?>
      <div style="width: 300px;margin: 50px auto;padding: 20px;background: red;text-align: center;color: white;">
        Error. Kindly Refresh The Page
      </div>
    <?php endif; ?>

  </div><br><br><br>



  <div class="footer">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
