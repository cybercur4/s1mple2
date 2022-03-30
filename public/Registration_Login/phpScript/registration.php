<?php
	include	'../../db.php';
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$c_password=$_POST['c_password'];
	$gender=$_POST['gender'];
	if($password==$c_password){
		$sql="INSERT INTO user(name,email,password,gender) VALUES('$name','$email','$password','$gender')";
		$result=mysqli_query($con,$sql);
		if($result==true) {
			header('location: ../index.php?ins=1');
		} 
		else {
			header('location: ../index.php?error=0');	
		}
	}
	else{
		echo "Confirm Password not match";
	}
	
