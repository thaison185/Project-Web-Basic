<?php 

session_start();

if (isset($_SESSION['role'])) {
	session_destroy();
	header('location:../frontend/index.php');
	exit;
}

if(basename($_SERVER['PHP_SELF']) != 'index.php' && 
	basename($_SERVER['PHP_SELF']) != 'cart.php' &&
	basename($_SERVER['PHP_SELF']) != 'order_details.php') {
	if (!isset($_SESSION['id'])) {
		header("location:../frontend/index.php");
		exit;
	}
}