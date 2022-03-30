<?php
	session_start();
	$host="localhost";
	$user="root";
	$password="";
	$db="sfscuhc";
	$con=mysqli_connect($host,$user,$password,$db);
	if(mysqli_connect_errno()){
		die("Failed to connect with Mysql:".mysqli_connect_errno());
	}
	if(isset($_POST['Email'])){
		$email= mysqli_real_escape_string($con,$_POST['Email']);
		$password=$_POST['Password'];
		if(empty($email) || empty($password)){
		
		}else{
			$sql="SELECT  *  FROM user WHERE email='$email'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)){
			    $row = mysqli_fetch_assoc($result);
				if($row['password']==$password){
					$_SESSION['id']= $row['id'];
					header('location: ../../user/index.php');
					exit();
				}else{
					header('location: ../index.php?msg=password');
				}
			}else{
				header('location: ../index.php?msg=email');
			}
				
		}
		
	}
?>