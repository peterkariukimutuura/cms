<?php 
session_start();

//include the connection from the database

include '../register/assets/databaseconnection.php';


if (!isset($_SESSION['username'])&&!isset($_SESSION['occupation'])&&!isset($_SESSION['email'])) {
  $_SESSION['errormessage']="Kindly login To Proceed!";
  header("location:http://localhost/courtcasesystem/login/");

}


$sql="SELECT * FROM chargesheets WHERE sendstatus='sent to prosecutor' ORDER BY id DESC";
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

    <title>Prosecuter</title>
	
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
   <link rel="stylesheet" href="../register/css/stylesheet.css">
     <link rel="stylesheet" href="../Police/css/styles.css">
     <link rel="stylesheet" href="css/styles.css">


  </head>

  <body>
	<div id="navbar">
		<a id="heading" class="pull-left">Court Case System</a>
		<h1 id="headlink">Home</h1>
		<a id="profilepage" href="profile.php">Welcome,<?php echo $_SESSION['username']; ?></a>
		<a id="heading" style="left: 86%;text-decoration: none;" class="pull-right" href="assets/logout.php">Logout</a>
	</div>
	<div class="contentholder">
		<div class="areaone">
			<h1>Prosecuter Department</h1><br>
			<img style="width: 70%;" src="images/logo.png" alt="The Prosecutor">
			<p>Welcome <?php echo $_SESSION['username']; ?>, You are now logged In as <?php echo $_SESSION['occupation']; ?></p><br>
		</div>
		<div class="areatwo">
			<h2 style="text-align:  center;">Available Charge Sheets That Requires Your Approval.</h2>
	
			<?php if(mysqli_num_rows($results)>0): ?>
			<table>
				<tr>
					<th>No#</th>
					<th>Person's Name</th>
					<th>Age</th>
					<th>Charge</th>
					<th>Date Of Arrest</th>
					<th>Action</th>
				</tr>
				<?php while($row=mysqli_fetch_assoc($results)): ?>
					<tr>
						<td><small><?php echo $row['id']; ?></small></td>
						<td><small><?php echo $row['name']; ?></small></td>
						<td><small><?php echo $row['age']; ?></small></td>
						<td style="width: 45%;"><small><?php echo substr($row['charge'], 0,100); ?><br>
							<a href="">read more...</a>
						 </small></td>
						<td><small><?php echo $row['dateofarrest']; ?></small></td>
						<td style="text-align: center;">
							<small><button id="approve">Approve</button><button id="reject">Reject</button></small>
						</td>
					</tr>
				<?php endwhile; ?>
			</table>
		<?php else: ?>
			<div class="alertinfo">
				No Records Added
				
			</div>
		<?php endif; ?>
			
		</div>
		
	</div>
  

<!-- 
<p><?php echo $_SESSION['email']; ?></p> -->






<script type="text/javascript" src="../js/jquery.js"></script>


   

  </body>
</html>
