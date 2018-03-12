<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';
include 'assets/addchargesheet.php';

if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}

 //$_SESSION['successmessage']="Could Not Insert Charge Details:Make Sure All Required Fields Have Values";
// $_SESSION['errormessage']="welcome Home!";

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
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink">Home</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <div class="sectionone">
    <div class="subsectionone">
          <h1>Police Department</h1>
          <img src="images/policelogo.png" alt="Kenya Police">
          <p>Welcome <?php echo $_SESSION['username']; ?>, You are now logged In as <?php echo $_SESSION['occupation']; ?>
            
          </p><br>
          <p>Your Main Duty is to add a report on the Charge Sheet</p><br>
          <a id="viewchargesheet" href="viewchargesheet.php">View Charge Sheets</a>
          <div class="tip">
            <h3 >Quick Tip</h3><br>
            <p>
              To send the Charge to Prosecutor,<br> Click The <i style="color: blue;">View Charge Sheet Button</i> <br>on top of this dialog
            </p>
          </div>
    </div>
    <div class="subsectiontwo">
      <h2 style="text-align: center;">Add Charge Sheet</h2>

    <!-- this is just simple php for checking  verification messages -->

    <?php if(!empty($_SESSION['successmessage'])): ?>
      <div id="successmessage">
        <?php echo $_SESSION['successmessage']; ?>
        <!-- User Successfully Registered! Proceed to login -->
      </div><br>
      <?php unset($_SESSION['successmessage']); ?>
    <?php endif; ?>



    <?php if(!empty($_SESSION['errormessage'])): ?>
      <div id="errormessage">
        <?php echo $_SESSION['errormessage']; ?>
      </div><br>  
      <?php unset($_SESSION['errormessage']); ?>
    <?php endif; ?>
    <!-- this is just simple php for checking  verification messages -->

     <form id="chargesheet" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
       <div>
         <label for="Police Type">Police Type</label>
         <select name="policetype" id="policetype" required>
           <option value="">select</option>
           <option value="policeUnderStation">Police Under Station</option>
           <option value="DCI">DCI</option>
         </select>
       </div><br>
       <div>
         <label for="Occurrence Book Number">Occurrence Book Number</label>
         <input type="text" id="obnumber" name="obnumber" placeholder="Occurrence Book Number" maxlength="20" required>
       </div><br>
       <div>
         <label for="ID Number">ID Number</label>
         <input type="text" id="idnumber" name="idnumber" placeholder="Identity Card Number" maxlength="20" required>
       </div><br>
       <div>
         <label for="Full Names">Full Names</label>
         <input type="text" id="fullnames" name="fullnames" placeholder="fullnames" maxlength="100" required>
       </div><br>
       <div>
         <label for="Gender">Gender</label>
         <select name="gender" id="gender" required>
           <option value="">choose</option>
           <option value="male">male</option>
           <option value="female">female</option>
           <option value="transgender">transgender</option>
         </select>
       </div><br>
       <div>
         <label for="Age">Age</label><br>
         <select name="age" id="age" required>
           <option value="">choose</option>
           <?php 
           for ($i=0; $i <200 ; $i++) { 
             echo "<option value='".$i."'>".$i."</option>";
           }
            ?>
         </select>
       </div><br>
       <div>
         <label for="Charge">Charge</label><br>
         <textarea id="chargesheet" name="description" placeholder="charge Description" required></textarea>
       </div><br>
       <div>
        <label for="Date Of Arrest">Date Of Arrest</label><br>
        <input type="date" id="dateofarrest" name="dateofarrest">

         
       </div><br>
       <button type="submit">Add Charge</button>

     </form>
    </div>
  </div><br>
  <div class="footer">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
