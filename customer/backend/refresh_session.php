<?php 

session_start();

if (!isset($_SESSION['id'])) {
	header('location:../frontend/index.php');
	exit;
}

$id = $_SESSION['id'];

require_once('../../connect.php');

$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
// die($sql);

$_SESSION['id'] = $each['id'];
$_SESSION['username'] = $each['username'];
$_SESSION['name'] = $each['name'];
$_SESSION['phone'] = $each['phone'];
$_SESSION['avatar'] = $each['avatar'];
$_SESSION['address'] = $each['address'];