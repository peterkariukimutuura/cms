<?php 
function validate($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
// echo $_SESSION['email'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=mysqli_real_escape_string($conn,validate($_POST['username']));
	$email=mysqli_real_escape_string($conn,validate($_POST['email']));
	$userid=$_SESSION['userid'];

	$file_name =$_FILES['image']['name'];
	$imagepath="";

	if (!empty($file_name)) {
	    $file_size = $_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];

	    $imagepath='images/profilepic/'.time().$file_name;
	    if (!empty($imagepath)) {
	    	move_uploaded_file($file_tmp, $imagepath);
	    }

	}

	$sql="UPDATE users SET username='$username',email= '$email',image='$imagepath' 
					WHERE id='$userid'";
	if (mysqli_query($conn,$sql)) {
		# code...
		echo "successfully editted Profile";
		$_SESSION['email']=$email;
		$_SESSION['username']=$username;
	}else{
		echo mysqli_error($conn);
	}



}









 ?>