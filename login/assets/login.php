<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	//$password=sha1($password);


	

	if (mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'")) {

		$result=mysqli_query($conn,"SELECT * FROM users WHERE email ='$email'");
		$check = mysqli_num_rows($result);

		if ($check>0) {
			
			$row=mysqli_fetch_assoc($result);
			

			if ($row['password']==$password) {

				$_SESSION['username']=$row['username'];
				$_SESSION['occupation']=$row['occupation'];
				$_SESSION['email']=$row['email'];
				
				if ($row['occupation']=="Prosecutor") {
					header("location:http://localhost/courtcasesystem/Prosecutor/");
				}

				if ($row['occupation']=="Police") {
					header("location:http://localhost/courtcasesystem/Police/");

				}

				if ($row['occupation']=="Clerk") {
					header("location:http://localhost/courtcasesystem/Clerk/");

				}

				if ($row['occupation']=="Judge/Magistrate") {
					header("location:http://localhost/courtcasesystem/Judge-Magistrate/");
					
				}

				
			}else{
				$_SESSION['errormessage']="The Password You entered Is Incorrect!";
			}
			


		}else{
			$_SESSION['errormessage']="User Not Found ,Kindly Create an Account";
		}
		

	}else{
		$_SESSION['errormessage']=mysqli_error($conn);
	}



}


?>