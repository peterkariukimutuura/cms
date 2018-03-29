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




$sql = "SELECT  chargesheets.charge,chargesheets.id ,chargesheets.name,chargesheets.dateofarrest,prosecutorremarks.remarks
,prosecutorremarks.status FROM  chargesheets INNER JOIN prosecutorremarks ON chargesheets.id=prosecutorremarks.chargesheet WHERE prosecutorremarks.status='Approved'";
$results=mysqli_query($conn,$sql);
// echo mysqli_num_rows(mysqli_query($conn,$sql));


 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <meta content="" name="description">
                        <meta content="" name="author">
                            <link href="" rel="icon">
                                <title>
                                    Judges / Magistrate
                                </title>
                                <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
                                    <link href="../register/css/stylesheet.css" rel="stylesheet">
                                        <link href="css/stylesheet.css" rel="stylesheet">
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </meta>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <div id="navbar">
            <a class="pull-left" href="../" id="heading" style="text-decoration: none;">
                Court Case System
            </a>
            <h1 id="headlink">
                Home
            </h1>
            <a href="profile.php" id="profilepage">
                Welcome,
                <?php echo $_SESSION['username']; ?>
            </a>
            <a class="pull-right" href="assets/logout.php" id="heading" style="    left: 86%;text-decoration: none;">
                Logout
            </a>
        </div>
        <div class="content">
            <div class="contentsectionone">
                <h1 style="color: #080848;margin-bottom: 0px;">
                    Judges / Magistrate
                </h1>
                <br>
                    <img alt="Judges - Magistrate" src="images/court.png" style="width: 500px;height: 300px;"/>
                    <p>
                        Welcome
                        <?php echo $_SESSION['username']; ?>
                        ,
                                You are now logged In as
                        <?php echo $_SESSION['occupation']; ?>
                    </p>
                    <br>
                        <p>
                            <?php echo $_SESSION['email']; ?>
                        </p>

            <div id="viewallchargesheetsreviewed">
                <a id="allreviews" href="viewall.php">View Court Records</a>
            </div>
                   
               
            </div>
            <div class="contentsectiontwo">
                <h2 style="text-align: center;">
                    Available Cases To be Presided
                </h2>
                <div style="height: 500px;overflow: auto;">
                    <?php if($results): ?>
                    <?php if(mysqli_num_rows($results)>
                    0): ?>
                    <?php while($row=mysqli_fetch_assoc($results)): ?>
                    <div style="width: 80%;margin: 10px auto; padding: 10px;background-color: #d0e0d0;">
                        <h3>
                            <small style="color: green">
                                Suspect
                            </small>
                            <?php echo $row['name']; ?>
                            <a id="addcourtrecord" href="addcourtrecord.php?id=<?php echo $row['id']; ?>" >Add a Court Record</a>
                        </h3>
                        <div style="padding: 15px;background-color: #f9f9f9;">
                            <small style="color: green">
                                Charge
                            </small>
                            <p style="margin: 0px;padding: 0px;">
                                <?php echo  $row['charge']; ?>
                            </p>
                        </div>
                        <div style="padding: 15px;background-color: #f9f9f9;">
                            <small style="color: green">
                                Charge Sheet Status
                            </small>
                            <p style="margin: 0px;padding: 0px;">
                                <?php echo  $row['status']; ?>
                            </p>
                        </div>
                        <div style="padding: 15px;background-color: #f9f9f9;">
                            <small style="color: green">
                                Prosecutor Remarks
                            </small>
                            <p style="margin: 0px;padding: 0px;">
                                <?php echo  $row['remarks']; ?>
                            </p>
                        </div><br>
                        <div>
                             <a id="viewmore" href="view.php?id=<?php echo $row['id']; ?>" >View More</a>
                            
                        </div><br>
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
                </div>
            </div>
        </div>

    <div class="footer" style="text-align: center;">
       <small>&copy 2018 Brenda, Court Management System. Police DepartMent</small>
    </div>
                <script src="../js/jquery.js" type="text/javascript">
                </script>
           
       
    </body>
</html>
