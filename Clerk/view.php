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
        header("location:http://localhost/courtcasesystem/Police/viewchargesheet.php");
      }
      
    }else{
      //echo mysqli_error($conn);
    }
  }else{
    header("location:http://localhost/courtcasesystem/Police/viewchargesheet.php");
  }
  
}else{
  header("location:http://localhost/courtcasesystem/Police/viewchargesheet.php");
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
   <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
  <div id="navbar">
    <a  id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">Charge Sheet View</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
    <a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
  </div>
  <a href="index.php" id="goback">Go Back</a>


  <div class="content" style="height: auto;">
    <p style="text-align: center;">Specific Charge Sheet</p>
    <table id="content">
      <tr>
        <td>Police Type</td>
        <td style="text-align: left;"><?php echo $row['policetype']; ?></td>
      </tr>
      <tr>
        <td>Added By</td>
        <td style="text-align: left;"><?php echo $row['addedby']; ?></td>
      </tr>
      <tr>
        <td>Full names</td>
        <td style="text-align: left;"><?php echo $row['name']; ?></td>
      </tr>
      <tr>
        <td>Identity Card Number</td>
        <td style="text-align: left;"><?php echo $row['identitynumber']; ?></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td style="text-align: left;"><?php echo $row['gender']; ?></td>
      </tr>
      <tr>
        <td>Date Of Birth</td>
        <td style="text-align: left;"><?php echo $row['dateofbirth']; ?></td>
      </tr>
      <tr>
        <td>Date Of Arrest</td>
        <td style="text-align: left;"><?php echo $row['dateofarrest']; ?></td>
      </tr>

      <tr>
        <td>Charge</td>
        <td style="text-align: left;"><small><?php echo $row['charge']; ?></small></td>
      </tr>
      <tr>
        <td>Prosecutor Aproval</td>
        <td style="text-align: left;"><?php
          if($row['sendstatus']=="prosecutor-Approved"){
            echo "<i style='color:green'>Approved</i>";
          }else if($row['sendstatus']=="prosecutor-Rejected"){
              echo "<i style='color:red'>Rejected</i>";
          }else{
            echo $row['sendstaus'];
          }
        ?></td>
      </tr>
      <?php if($row['sendstatus']!=="not-send"): ?>
        <?php $id=$row["id"]; ?>
          <?php if($remarks=mysqli_fetch_assoc(mysqli_query($conn,"SELECT remarks FROM prosecutorremarks WHERE chargesheet='$id'"))): ?>
          <tr>
            <td>Prosecutor Remarks</td>
            <td style="text-align: left;"><small><?php echo $remarks['remarks']; ?></small></td>
          </tr>
        <?php endif; ?>
    <?php endif; ?>
    </table>    
  </div><br><br><br>



  <div class="footer" style="text-align: center;">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
