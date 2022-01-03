<?php 
$error = '';

if( isset($_POST['username'])) {
	$username = $_POST['username'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_POST['name'])) {
	$name = $_POST['name'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_POST['gender'])) {
	$gender = $_POST['gender'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_FILES['avatar'])) {
	$avatar = $_FILES['avatar'];
	// $avatar = "$avatar";
} else {
	$avatar = null;
}
// die(json_encode($avatar));

if( isset($_POST['email'])) {
	$email = $_POST['email'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_POST['phone'])) {
	$phone = $_POST['phone'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_POST['DOB'])) {
	$DOB = $_POST['DOB'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_POST['address'])) {
	$address = $_POST['address'];
} else {
	$error = "đã xảy ra lỗi!";
}

if( isset($_POST['password'])) {
	$password = $_POST['password'];
	$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
	$error = "đã xảy ra lỗi!";
}

if($error) {
	session_start();
	$_SESSION['error'] = $error;
	// die($error);
	header('location:../frontend/register.php');
	exit;
}

$error = null;
$regex = "/^(?=.*[a-zA-Z])[\w._]{8,20}$/";
if(!preg_match($regex, $username)) {
	$error = "đã xảy ra lỗi!";
}
$regex = "/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(\ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)+$/";
if(!preg_match($regex, $name)) {
	$error = "đã xảy ra lỗi!";
}
$regex = "/^\w+@\w+(\.\w+)+$/";
if(!preg_match($regex, $email)) {
	$error = "đã xảy ra lỗi!";
}
$regex = "/^[\+\-0-9]{9,15}$/";
if(!preg_match($regex, $phone)) {
	$error = "đã xảy ra lỗi!";
}
$regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/";
if(!preg_match($regex, $password)) {
	$error = "đã xảy ra lỗi!";
}

if($error) {
	session_start();
	$_SESSION['error'] = $error;
	header('location:../frontend/register.php');
	exit;
}

require_once('../../connect.php');

$sql = "select count(*) from customers
where username = '$username' or email = '$email' or phone = '$phone'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result)['count(*)'];

if($each > 0) {
	session_start();
	$_SESSION['error'] = "username hoặc email hoặc số điện thoại đã đăng ký!";
	header('location:../frontend/register.php');
	exit;
}

$sql = "select max(id) from customers";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result)['max(id)'];
$id = $each;
// die($each);
if (!$id) {
	$id = 1;
}
else
	$id++;
// echo json_encode($avatar);
// die(!!$avatar);
if($avatar['tmp_name']) {
	$path_folder = '../../data/img/avatar/';
	$file_extension = explode('.',$avatar['tmp_name'])[1];
	$file_name = time() . rand(0,9999);
	$path_file_avatar = $path_folder . $file_name . '.' . $file_extension;
	// die($path_file_avatar); 
	move_uploaded_file($avatar['tmp_name'], $path_file_avatar);
}

$sql = "insert into customers(id,username,name,gender,avatar,email,phone,DOB,address,hashed_password)
values('$id','$username','$name','$gender','$path_file_avatar','$email','$phone','$DOB','$address','$hashed_password')";

$result = mysqli_query($connect,$sql);
echo($sql);

mysql_close($connect);