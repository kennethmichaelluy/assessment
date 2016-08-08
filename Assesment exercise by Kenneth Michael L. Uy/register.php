<?php
include('database_connection.php');	

		
			if (isset($_POST['register'])){
		
		
		
$usernamee = filter_var($_POST['usernamee'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$passwordd = filter_var($_POST['passwordd'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$cpassword = filter_var($_POST['cpassword'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$type = filter_var($_POST['type'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		

		
		$username_check = "SELECT `username` FROM `accounts`";
		$result = mysqli_query($conn, $username_check);
	
		
          while ($row = mysqli_fetch_assoc($result)) {
				
				$usernameExist = $row['username'];
						  
			}
		
		if($usernameExist == $usernamee){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('username already exist!')
			window.location.href='sign_up.php'
		</SCRIPT>");
			exit();
		}
		
	if (!$usernamee | !$passwordd | !$cpassword | !$firstname |  !$lastname  |  !$type){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('you didnt complete all of the requirements feilds')
			window.location.href='sign_up.php'
		</SCRIPT>");
		exit();
	}
		if ($passwordd != $cpassword){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('password doesnt match')
			window.location.href='sign_up.php'
		</SCRIPT>");
		exit();
	}
	
	

		
	
	
	$sql = "INSERT INTO `accounts` (`username`, `password`, `first_name`, `last_name`, `type`,`status`) VALUES 
	                                            ('$usernamee', '$passwordd', '$firstname', '$lastname','$type','offline')";

	if($conn->query($sql) === TRUE){  
		echo ("<SCRIPT LANGUAGE ='JavaScript'> 
			window.alert('Register success!!!');
			window.location.href='index.php'
		</SCRIPT>");
	}else {
		echo ("<SCRIPT LANGUAGE ='JavaScript'> 
			window.alert('FAILED!!!');
			window.location.href='sign_up.php'
			</SCRIPT>");
	}
	
	
	
	

	
	}
	

?>