<?php 


$servername="localhost";
$user="root";
$password="";
$database="courtcasesystem";

$conn = mysqli_connect($servername,$user,$password,$database);



// $_SESSION['successmessage']=null;

if (!$conn) {
	$_SESSION['successmessage']="Not Connected To the database";
	
}


















 ?>