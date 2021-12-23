<?php 
session_start();

$id = $_POST['id'];
$username = $_POST['username'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$DOB = $_POST['DOB'];
$address = $_POST['address'];
$old_password = md5($_POST['old_password']);

if(!isset($new_password)) {
	$new_password = $old_password;
} else {
	$new_password = md5($_POST['new_password']);
}

require_once('connect.php');

$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

if ($each['hashed_password'] != $old_password) {
	$_SESSION['error'] = 'sai mật khẩu!';
	header('location:update_info.php');
	exit;
}

$sql = "update customers
set 
username = '$username',
name = '$name',
gender = '$gender',
email = '$email',
phone = '$phone',
DOB = '$DOB',
address = '$address',
hashed_password = '$new_password'
where id = '$id'";

$result = mysqli_query($connect,$sql);
die($sql);

mysql_close($connect);