<?php 
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

require_once('connect.php');

$sql = "select * from customers
where username = '$username'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
// die($sql);
echo json_encode($each);
if (!$each) {
	$_SESSION['error'] = "không tìm thấy tài khoản!";
	header('location:login.php');
	// die('ktt');
	exit;
}

// $sql = "select count(*) from customers
// where username = '$username',
// hashed_password = '$password'";
// $result = mysqli_query($connect,$sql);
// $each = mysqli_fetch_array($result)['count(*)'];

if($each['hashed_password'] == $password){
	$_SESSION['id'] = $each['id'];
	$_SESSION['username'] = $each['username'];
	$_SESSION['name'] = $each['name'];
	// die(json_encode($each));
	header('location:index.php');
	// die('tt');
	exit;
} else {
	$_SESSION['error'] = "mật khẩu không trùng khớp!";
	header('location:login.php');
	// die('ktk');
	exit;
}

mysql_close($connect);