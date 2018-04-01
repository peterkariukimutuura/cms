<?php 
require '../../register/assets/databaseconnection.php';
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$old=mysqli_real_escape_string($conn,validate($_POST['old']));
	$old=sha1($old);
	$new=mysqli_real_escape_string($conn,validate($_POST['new']));
	$userid=mysqli_real_escape_string($conn,validate($_POST['userid']));

	$sql ="SELECT * FROM users WHERE id ='$userid'";
	$results=mysqli_query($conn,$sql);
	if ($results) {
		# code...
		if (mysqli_num_rows($results)>0) {
			# code...
			$row=mysqli_fetch_assoc($results);
			if ($old!==$row['password']) {
				echo "Oops! Operation Failed ! You have Provided A wrong Password Try Again!";
			}else{
				$newpassword=sha1($new);
				$news="UPDATE users SET password='$newpassword' WHERE id='$userid'";
				if (mysqli_query($conn,$news)) {
					# code...
					echo "Password Successfully Changed!";
				}else{
					echo mysqli_error($conn);
				}
				// var_dump($row);
			}

			
		}else{
			echo "Operation Failed Kindly Try Again Later!";
		}

	}else{
		echo mysqli_error($conn);
	}


}









 ?>
