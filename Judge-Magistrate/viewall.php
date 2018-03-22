<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}else{
    if ($_SESSION['occupation']!=="Judge/Magistrate") {
      $_SESSION['errormessage']="Kindly login With A Judge/Magistrate Account to Proceed!";
      header("location:http://localhost/courtcasesystem/login/");
    }
}

$sql = "SELECT * FROM courtrecord";
  
  $results=mysqli_query($conn,$sql);





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

    <title> Judges / Magistrate</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="../Police/css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a  id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">View All Cases</h1>
    <a id="profilepage" href="#">Welcome,<?php echo $_SESSION['username']; ?></a>
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
            <h3> <small style="color: green">Case Number</small> <?php echo $row['casenumber']; ?></h3>
            <div style="padding: 15px;background-color: #f9f9f9;">
              <small style="color: green">Charge Sheet &nbsp&nbsp&nbsp
                <span style="color: black;">
                <a id="viewmore" href="view.php?id=<?php echo $row['chargesheet']; ?>" >View More</a>
              </span>
              </small>,&nbsp
              <small style="color: green">Court <span style="color: black;"><?php echo  $row['court']; ?></span></small>
              ,&nbsp
              <small style="color: green">Plea Date
              <span style="color: black;"><?php echo  $row['pleaDate']; ?></span>
              </small>,&nbsp
              <small style="color: green">Plea Status &nbsp
              <span style="color: black;"><?php echo  $row['plea_status']; ?></span>
              </small>,&nbsp
              <small style="color: green">Hearing Date
               <span style="color: black;"><?php echo  $row['hearingDate']; ?></span>
              </small>,&nbsp <br>  
              <small style="color: green">Judges Notes
                 <span style="color: black;"> <?php echo  $row['judgesNotes']; ?></span>
              </small><br>
&nbsp
              <small style="color: green">Sentence
               <span style="color: black;"><?php echo  $row['sentence']; ?></span>
              </small>,&nbsp    <small style="color: green">Case Status
               <span style="color: black;"><?php echo  $row['caseStatus']; ?></span>
              </small>&nbsp.
           </div>

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
