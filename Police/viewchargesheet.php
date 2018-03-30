<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");
}else{
  if ($_SESSION['occupation']!=="Police") {
    $_SESSION['errormessage']="Kindly login With A Police Account to Proceed To Proceed!";
    header("location:http://localhost/courtcasesystem/login/");
  }
}

$sql ="SELECT * FROM chargesheets ORDER BY id desc";
$results=mysqli_query($conn,$sql);
if ($results) {
// var_dump(mysqli_fetch_assoc($results));
}else{
  // echo mysqli_error($conn);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
   <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a  id="heading" class="pull-left">Court Case System</a>
    <h1 id="headlink" style="font-size: 20px;margin-top: 22px;">Charge Sheets Inventory</h1>
    <a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 87%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
  <a href="index.php" id="goback">Go Back</a>
  <div class="sectionone">
    <?php if(mysqli_num_rows($results)>0): ?>
    <table id="chargesheet">
      <tr>
        <th><small>No#</small></th>
        <th><small>Police Person Name</small></th>
        <th><small>OB Number</small></th>
        <th><small>ID Number</small></th>
        <th><small>Names</small></th>
        <th><small>Date Of Birth</small></th>
        <th><small>Charge</small></th>
        <th><small>Date of Arrest</small></th>
        <th><small>Action</small></th>
      </tr>
      <?php while($row=mysqli_fetch_assoc($results)): ?>
      <tr>
        <td><small><?php echo $row['id']; ?></small></td>
        <td><small><?php echo $row['addedby']; ?></small></td>
        <td><small><?php echo $row['ob']; ?></small></td>
        <td><small><?php echo $row['identitynumber']; ?></small></td>
        <td><small><?php echo $row['name']; ?></small></td>
        <td><small><small><?php echo $row['dateofbirth']; ?></small></small></td>
        <td style="width: 30%;text-align: left;"><small><?php echo substr($row['charge'], 0,100); ?><br>
          <a href="view.php?id=<?php echo($row['id']); ?>">read more..</a></small></td>
        <td><small><?php echo $row['dateofarrest']; ?></small></td>
        <td><small id="sendtoprosecutor<?php echo($row['id']); ?>"><?php
         
           if ($row['sendstatus']=='not-send') {
            echo "<button class='sendtoprosecutor".$row['id']."' id='sendtoprosecutor' onclick='sendtoprosecutor(\"".$row['id']."\")' type='button'>Send to Prosecutor</button>";
           }else if($row['sendstatus']=='sent to prosecutor'){
            echo "<small style='color:blue'>Waiting Prosecutor Approval</small>";
           }else if ($row['sendstatus']=="prosecutor-Approved") {
            echo "<small style='color:green'>Approved By Prosecutor</small>";
             # code...
           }else if ($row['sendstatus']=="prosecutor-Rejected") {
            echo "<small style='color:Red'>Rejected By Prosecutor</small>";
             # code...
           }
         ?></small></td>
      </tr>
    <?php endwhile; ?>
    </table>
    <?php else: ?>
    <div class="info">
      Oops, You have No Records Here
    </div>
  <?php endif; ?>
    
  </div>


  <div class="footer">
    <small>&copy 2018 Court Management System. Police DepartMent</small>
  </div>







<script type="text/javascript" src="../js/jquery.js"></script>

<script>

    function sendtoprosecutor(value){
      var assert=confirm("Confirm You want to send this Charge Sheet to Prosecutor?");
      if (assert) {
        if(value!==''){
          $('.sendtoprosecutor'+value).hide();
          $('#sendtoprosecutor'+value).html("<span style='color:green;'>Sending,Kindly Wait!</span>");
          $.ajax({
            type:'POST',
            url:'assets/updatechargesheet.php',
            data:{id:value},
            success:function(response){
              console.log(response);
              if (response=="success") {
                setTimeout(() => {
                  location.reload();
                }, 2000);
              }else{
                alert("Oops,Kindly Try Again Later.")
              }
            },
            error:function(response){
              console.log(response);
            }

          });
        }

      }

      console.log(value);
    }
</script>


   

  </body>
</html>
