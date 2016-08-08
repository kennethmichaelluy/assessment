<?php
include('database_connection.php');	
		session_start();
		$sql = "UPDATE `accounts` SET `status`='offline' WHERE `username`='".$_SESSION['account']."'";
				mysqli_query($conn, $sql);
		session_destroy();
	    header('location:index.php');
		
?>