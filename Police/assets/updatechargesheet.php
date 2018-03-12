<?php 

include '../../register/assets/databaseconnection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id=mysqli_real_escape_string($conn,$_POST['id']);

	$sql="UPDATE chargesheets set sendstatus='sent to prosecutor' WHERE id=$id";
	if (mysqli_query($conn,$sql)) {
		# code...
		echo "success";
	}else{
		echo "error";
	}
}






 ?>