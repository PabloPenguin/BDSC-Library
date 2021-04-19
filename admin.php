<?php
    ob_start();
    session_start();
	
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	
	if (!$Username || !$Password) {
		header('Location: login.php');
		exit();
	}
	include 'connection.php'; 
	$hash_pass = $Password;
	
	$pass_check_query = "SELECT *
						FROM Users
						WHERE Username = '$Username'
						AND Password = '$hash_pass'";
	$pass_check_result = mysqli_query ($dbcon, $pass_check_query);
	$pass_check_rows = mysqli_num_rows($pass_check_result);
	
	if($pass_check_rows<1) {
		header('Location: login.php');
		exit();
	}
	else{
		$_SESSION['admin'] = 1;
		header('Location: index.php');
	}
	
?>
