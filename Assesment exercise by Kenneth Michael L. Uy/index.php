<?php
include('database_connection.php');
	session_start();
	
	if(isset($_SESSION['account'])){
		header('location:index.php');
	}else{
?>

<!DOCTYPE >
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Exercise</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<script type="text/script" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js.js"></script>
	</head>
	<body>
		<header>
		</header>
		
			<div id="outer-div" class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<div id="form" class="form-group">
							<h3>Log in</h3>
							<form method="POST" action = "index.php">
								<div class="inner-addon left-addon">
									<i class="glyphicon glyphicon-user"></i><input type="text" name="username" class="form-control" placeholder="Username:" id="user-name" required><br>
								</div>		
								<div class="inner-addon left-addon">	
									<i class="glyphicon glyphicon-lock"></i><input type="password" name="password" class="form-control" placeholder="Password:" id="pass-word" required><br>
								</div>
								<button onclick="click()" name="login" type="submit" id="button" class="btn btn-default" >Login</button>
								<a id="sign-up" href="sign_up.php">Sign Up</a>
							</form>
						</div>
					</div>
					<div class="col-lg-4">
					</div>				
				</div>
			</div>
		
	</body>
	
	<footer>
		
	</footer>
	
</html>

<?php

		
	
	
	if (isset($_POST['login'])){
		
		
		
		$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

	
			if (!$_POST['username'] | !$_POST['password']){
				echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('you didnt complete all of the requirements feilds')
					window.location.href='index.php'
				</SCRIPT>");
			exit();
			}
			
		$sql = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
		$result = $conn->query($sql);
		
	
			
		
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
					
				$_SESSION['account'] = $row['username'];
				$sql = "UPDATE `accounts` SET status='online' WHERE username='".$_SESSION['account']."'";
				mysqli_query($conn, $sql);
				header('location:home.php');
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			
			window.location.href='home.php'
		</SCRIPT>");
			}
			}
			
			
			
		
		
		else{
			
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('WRONG COMBINATION !!')
			window.location.href='index.php'
		</SCRIPT>");
			
		}
		$conn->close();

	}
	
	}
?>