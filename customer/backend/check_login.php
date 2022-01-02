<?php 

session_start();

if (isset($_SESSION['role'])) {
	session_destroy();
	header('location:index.php');
	exit;
}

if(basename($_SERVER['PHP_SELF']) != 'index.php' && basename($_SERVER['PHP_SELF']) != 'cart.php') {
	if (!isset($_SESSION['id'])) {
		header("location:index.php");
		exit;
	}
}