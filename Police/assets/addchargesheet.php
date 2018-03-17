<?php 

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

			$_SESSION['successmessage']="A new Charge Sheet Has Been Successfully Created!";
		}else{
			$_SESSION['errormessage']=mysqli_error($conn);
		}

	}else{
		$_SESSION['errormessage']="Could Not Insert Charge Details:Make Sure All Required Fields Have Values!";
	}




}





 ?>