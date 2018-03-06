<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$occupation=mysqli_real_escape_string($conn,$_POST['occupation']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$password=sha1($password);

	$sql="INSERT INTO `users` (`username`, `occupation`, `email`, `password`) VALUES ('$username', '$occupation', '$email', '$password')";

	if (mysqli_query($conn,$sql)) {
		$_SESSION['successmessage']="You Have Been Successfully Registered as ".$occupation;
	}else{
		$_SESSION['successmessage']=mysqli_error($conn);
	}
}


 ?>