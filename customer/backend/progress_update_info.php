<?php 
$error = null;


session_start();
$id = $_SESSION['id'];

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

if( isset($_POST['new_password'])) {
	$new_password = $_POST['new_password'];
	$hashed_new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
}

if( isset($_POST['old_password'])) {
	$old_password = $_POST['old_password'];
} else {
	$error = "đã xảy ra lỗi!";
}

if($error) {
	$_SESSION['error'] = $error . '1';
	header('location:update_info.php');
	exit;
}


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
if($new_password) {
	$regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/";
	if(!preg_match($regex, $new_password)) {
		$error = "đã xảy ra lỗi!";
	}
}

if($error) {
	$_SESSION['error'] = $error . '2';
	header('location:update_info.php');
	exit;
}

require_once('../../connect.php');

$sql = "select count(*) from customers
where (username = '$username' or email = '$email' or phone = '$phone')
and id != '$id'";
$result = mysqli_query($connect,$sql);
echo($sql) ;
$each = mysqli_fetch_array($result)['count(*)'];

if($each > 0) {
	$_SESSION['error'] = "username hoặc email hoặc số điện thoại đã đăng ký!";
	header('location:update_info.php');
	exit;
}

$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

if (!password_verify($old_password, $each['hashed_password'])) {
	$_SESSION['error'] = 'sai mật khẩu!';
	header('location:../frontend/update_info.php');
	exit;
}

if($avatar) {
	$path_folder = '../../data/img/avatar/';
	$file_extension = explode('.',$avatar['tmp_name'])[1];
	$fiel_name = time() . rand(0,9999);
	$path_file_avatar = $path_folder . $fiel_name . '.' . $file_extension;
	$avatar_str = "avatar = '$path_file_avatar',";
	// die($path_file_avatar); 
	move_uploaded_file($avatar['tmp_name'], $path_file_avatar);
} else {
	$avatar_str = '';
}

$sql = "update customers
set 
username = '$username',
name = '$name',
gender = '$gender',"
.
$avatar_str
.
"email = '$email',
phone = '$phone',
DOB = '$DOB',
address = '$address',
hashed_password = '$hashed_new_password'
where id = '$id'";

echo($sql);


$result = mysqli_query($connect,$sql);

require('refresh_session.php');

// header('location:../frontend/index.php');