<?php
	include	'../function.php';
	include	'../db.php';
	$name=$_POST['name'];
	$address=$_POST['address'];
	$mobno=$_POST['mobno'];
	$email=$_POST['email'];
	$regist=$_POST['regist'];
	$password=$_POST['password'];
	$q="select email from user";
	$old_email=$con->query($q);
	foreach ($old_email as $e) {
			if($e['email']==$email){
			header('location: ../registration.php?email_error=0');	
			}
		}


	$table=array('name','email','password','mobno','register_user','address');
	$data=array($name,$email,$password,$mobno,$regist,$address);
	$result=insert('user',$table,$data);
	if($result==true) {

		 $to = $email;
         $subject = "Government Polytechnic Jaunpur  : ".$name;                 
        $message = "Dear :".$name."<br/>".
        "your Email Id is:".$email."<br/>"." &  Mobile :".$mobno.""; 
         $header = "From: $name\r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
           $headers = 'From: sujeet@sokoni.co.in' . "\r\n" .
        'Reply-To: From: sujeet@sokoni.co.in' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
         $retval = mail ($to,$subject,$message,$header);

		header('location: ../registration.php?ins=1');
	} /*else {
		
		header('location: ../registration.php?error=0');	
	}*/
