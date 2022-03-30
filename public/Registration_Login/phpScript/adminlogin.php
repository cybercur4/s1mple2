<?php
	include('../function.php');
	include('../db.php');
		$pass=$_POST["password"];
		$email=$_POST["email"];
		$q="SELECT  *  FROM admin WHERE email='$email' AND password='$pass' ";
		$result= $con->query($q);
		if($result->num_rows > 0)
		{
		session_start();
		$row=select('admin','email',$email);
		foreach($row as $r){
		 $_SESSION['adminid']=$r['id'];
		}
			header('location: ../admin/index.php');
		}
		else{ 
				header('location: ../adminlogin.php?error=1');
		}?>