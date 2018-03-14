<?php 


include '../../register/assets/databaseconnection.php';
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

INSERT INTO `prosecutorremarks` (`id`, `prosecutor`, `chargesheet`, `remarks`, `status`) VALUES (NULL, NULL, NULL, NULL, '')

	$remarks=mysqli_real_escape_string($conn,validate($_POST['remarks']));
	$chargesheetnum=mysqli_real_escape_string($conn,validate($_POST['chargesheetnum']));
	$status=mysqli_real_escape_string($conn,validate($_POST['status']));
	$prosecutor=mysqli_real_escape_string($conn,validate($_POST['prosecutor']));
	if (!empty($remarks)&&!empty($chargesheetnum)&&!empty($status)) {
		# code...
		$sql="INSERT INTO `prosecutorremarks` (`prosecutor`, `chargesheet`, `remarks`, `status`) 
		VALUES ('$prosecutor', '$chargesheetnum', '$status', '$prosecutor')";
		if (mysqli_query($sql,$results)) {
			echo "success";
		}else{
			//echo "failed";
			echo mysqli_error($conn);
		}

	}else{
		echo "failed";
	}

}

?>