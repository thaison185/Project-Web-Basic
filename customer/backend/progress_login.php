<?php 
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require_once('../../connect.php');

$sql = "select * from customers
where username = '$username'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
// die($sql);
// die(json_encode($each));
if (!$each) {
	// $_SESSION['flash_msg'] = "error Account not found!";
	echo("error-- Account not found!");
	// header('location:../frontend/login.php');
	// die('ktt');
	exit;
}

if(password_verify($password,$each['hashed_password'])) {
	$_SESSION['id'] = $each['id'];
	// die($_SESSION['id']);
	$_SESSION['username'] = $each['username'];
	$_SESSION['name'] = $each['name'];
	$_SESSION['gender'] = $each['gender'];
	$_SESSION['phone'] = $each['phone'];
	$_SESSION['avatar'] = $each['avatar'];
	$_SESSION['address'] = $each['address'];
	// die(json_encode($each));
	header('location:../frontend/index.php');
	// die('tt');
	exit;
} else {
	// $_SESSION['flash_msg'] = "error Password does not match!";
	echo("error-- Password does not match!");
	// die($each['hashed_password']);
	// header('location:../frontend/login.php');
	exit;
}

mysql_close($connect);