<?php 
require '../../register/assets/databaseconnection.php';
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
// echo $_SESSION['email'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$personname=mysqli_real_escape_string($conn,validate($_POST['personname']));
	// echo $personname;
	$response=[];

	$sql ="SELECT * FROM chargesheets WHERE name LIKE '%".$personname."%'";
	$results=mysqli_query($conn,$sql);
	if ($results) {
			if (mysqli_num_rows($results)>0) {
				// $response['row']=mysqli_fetch_assoc($results);
				$response['row']=mysqli_fetch_all($results,MYSQLI_ASSOC);
				$response['status']='success';
				# code...
			}else{
				$response['status']='none';
			}
	}else{
		$response['status']=mysqli_error($conn);
	}
	echo json_encode($response);
}









 ?>
