<?php 


include '../../register/assets/databaseconnection.php';
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// INSERT INTO `prosecutorremarks` (`id`, `prosecutor`, `chargesheet`, `remarks`, `status`) VALUES (NULL, NULL, NULL, NULL, '')
	// {remarks: "Tsets", chargesheetnum: "30", status: "Approved", prosecutor: "karistheprosecutor@mailinator.com"}

	$remarks=mysqli_real_escape_string($conn,validate($_POST['remarks']));
	$chargesheetnum=mysqli_real_escape_string($conn,validate($_POST['chargesheetnum']));
	$status=mysqli_real_escape_string($conn,validate($_POST['status']));
	$prosecutor=mysqli_real_escape_string($conn,validate($_POST['prosecutor']));
	$sendstatus='prosecutor-'.$status;
	if (!empty($chargesheetnum)&&!empty($status)) {
		# code...
		$sql="INSERT INTO `prosecutorremarks` (`prosecutor`, `chargesheet`, `remarks`, `status`) 
		VALUES ('$prosecutor', '$chargesheetnum', '$remarks', '$status')";
		if (mysqli_query($conn,$sql)) {

			if (mysqli_query($conn,"UPDATE chargesheets SET sendstatus='$sendstatus' WHERE id='$chargesheetnum'")) {
				echo "success";
			}else{
				echo mysqli_error($conn);
			}
			
		}else{
			//echo "failed";
			echo mysqli_error($conn);
		}

	}else{
		echo "failed";
	}

}

?>