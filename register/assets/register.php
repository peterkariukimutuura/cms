<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$occupation=mysqli_real_escape_string($conn,$_POST['occupation']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$password=sha1($password);



	$check = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE email ='$email' AND occupation='$occupation'"));
	if ($check>0) {
		$_SESSION['errormessage']=$email. " is already registered as " .$occupation . " Kindly try with another email.";
	}else{

		$sql="INSERT INTO `users` (`username`, `occupation`, `email`, `password`) VALUES ('$username', '$occupation', '$email', '$password')";

		if (mysqli_query($conn,$sql)) {
			switch ($occupation) {
				case '1':
					$occupation="Prosecutor";
					break;
				case '2':
					$occupation="Police";
					break;
				case '3':
					$occupation="Clerk";
					break;
				case '4':
					$occupation="Judge/Magistrate";
					break;
				
				default:
					# code...
					break;
			}
			$_SESSION['successmessage']="You Have Been Successfully Registered as ".$occupation;
		}else{
			$_SESSION['errormessage']=mysqli_error($conn);
		}
	}
}


 ?>