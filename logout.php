<?php
	session_start();
	unset($_SESSION['account']);
	unset($_SESSION['password']);
	
	header('location:index.php');
	exit;
?>