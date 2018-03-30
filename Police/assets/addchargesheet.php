<?php 
session_start();
include '../../register/assets/databaseconnection.php';
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$policetype=mysqli_real_escape_string($conn,validate($_POST['policetype']));
	$obnumber=mysqli_real_escape_string($conn,validate($_POST['obnumber']));
	$idnumber=mysqli_real_escape_string($conn,validate($_POST['idnumber']));
	$fullnames=mysqli_real_escape_string($conn,validate($_POST['fullnames']));
	$gender=mysqli_real_escape_string($conn,validate($_POST['gender']));
	$dateofbirth=mysqli_real_escape_string($conn,validate($_POST['dateofbirth']));
	$description=mysqli_real_escape_string($conn,validate($_POST['description']));
	$dateofarrest=mysqli_real_escape_string($conn,validate($_POST['dateofarrest']));
	$addedby=$_SESSION['username'];

	
	if (!empty($policetype)&&!empty($obnumber)&&!empty($idnumber)&&!empty($fullnames)&&!empty($gender)&&!empty($dateofbirth)&&!empty($description)&&!empty($dateofarrest)) {
		
		$sql="INSERT INTO `chargesheets` ( `policetype`, `ob`, `identitynumber`, `name`, `gender`, `dateofbirth`, `charge`, `dateofarrest`, `sendstatus`,`addedby`) VALUES ('$policetype', '$obnumber', '$idnumber', '$fullnames', '$gender', '$dateofbirth', '$description', '$dateofarrest', 'not-send','$addedby')";

		if (mysqli_query($conn,$sql)) {
			// $id= mysqli_insert_id($conn);
			// $ob=$id+1;
			// if (mysqli_query($conn,"UPDATE chargesheets set ob='$ob' WHERE id='$id' ")) {
				// $_SESSION['successmessage']="A new Charge Sheet Has Been Successfully Created!";
				echo  "A new Charge Sheet Has Been Successfully Created!";
			// }
			// mysqli_close($conn);
		}else{
			// $_SESSION['errormessage']=mysqli_error($conn);
			echo mysqli_error($conn);

		}

	}else{
		// $_SESSION['errormessage']="Could Not Insert Charge Details:Make Sure All Required Fields Have Values!";
		echo "Could Not Insert Charge Details:Make Sure All Required Fields Have Values!";
	}




}





 ?>