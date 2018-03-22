<?php 

include '../../register/assets/databaseconnection.php';
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$casenumber=mysqli_real_escape_string($conn,validate($_POST['casenumber']));
	$casestatus=mysqli_real_escape_string($conn,validate($_POST['casestatus']));
	$chargesheet=mysqli_real_escape_string($conn,validate($_POST['chargesheet']));
	$courtname=mysqli_real_escape_string($conn,validate($_POST['courtname']));
	$hearingdate=mysqli_real_escape_string($conn,validate($_POST['hearingdate']));
	$judgesnotes=mysqli_real_escape_string($conn,validate($_POST['judgesnotes']));
	$plea=mysqli_real_escape_string($conn,validate($_POST['plea']));
	$pleadate=mysqli_real_escape_string($conn,validate($_POST['pleadate']));
	$pleaoutcomes=mysqli_real_escape_string($conn,validate($_POST['pleaoutcomes']));
	$sentence=mysqli_real_escape_string($conn,validate($_POST['sentence']));

	$sql="INSERT INTO `courtrecord` (`casenumber`, `chargesheet`, `court`, `pleaDate`, `plea`, `plea_status`, `hearingDate`, `judgesNotes`, `sentence`, `caseStatus`) VALUES ('$casenumber', '$chargesheet', '$courtname', '$pleadate', '$plea', '$pleaoutcomes', '$hearingdate', '$judgesnotes', '$sentence', '$casestatus')";
	if (mysqli_query($conn,$sql)) {
		# code...
		echo "success";
	}else{
		echo mysqli_error($conn);
	}
	


}