<?php 
	session_start();
	$_SESSION['admin'] = 0;
	session_destroy();
	header('Location: index.php');
	
?>