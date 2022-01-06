<?php 

// die(json_encode(isset($_POST['new_passsword'])));

$error = null;

session_start();

$id = $_SESSION['id'];

// if( isset($_POST['username'])) {
// 	$username = $_POST['username'];
// } else {
// 	$error = "đã xảy ra lỗi!";
// }

if($_POST['name']) {
	$name = $_POST['name'];
} else {
	$error = "đã xảy ra lỗi!1";
}

if($_POST['gender'] !== null) {
	$gender = $_POST['gender'];
} else {
	$error = "đã xảy ra lỗi!2";
}

// if( $_FILES['avatar']['name']) {
// 	$avatar = $_FILES['avatar'];
// 	// $avatar = "$avatar";
// } else {
// 	$avatar = null;
// }
// die(json_encode($avatar));

if($_POST['email']) {
	$email = $_POST['email'];
} else {
	$error = "đã xảy ra lỗi!3";
}

if($_POST['phone']) {
	$phone = $_POST['phone'];
} else {
	$error = "đã xảy ra lỗi!4";
}

if($_POST['DOB']) {
	$DOB = $_POST['DOB'];
} else {
	$error = "đã xảy ra lỗi!5";
}

if($_POST['address']) {
	$address = $_POST['address'];
} else {
	$error = "đã xảy ra lỗi!6";
}

if($_POST['old_password']) {
	$old_password = $_POST['old_password'];
} else {
	$error = "đã xảy ra lỗi!7";
}

$hashed_new_password_str = '';
if($_POST['new_password']) {
	$new_password = $_POST['new_password'];
	$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
	$hashed_new_password_str = "hashed_password = '$hashed_new_password',";
	// echo("<br> \"$new_password\" <br>vclllllllllllllllllll<br>");
}

if($error) {
	$_SESSION['flash_msg'] = $error . '1';
	$_SESSION['flash_msg_type'] = "error";
	header('location:../frontend/update_info.php');
	exit;
}


// $regex = "/^(?=.*[a-zA-Z])[\w._]{8,20}$/";
// if(!preg_match($regex, $username)) {
// 	$error = "đã xảy ra lỗi!";
// }
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
	$_SESSION['flash_msg'] = $error . '2';
	$_SESSION['flash_msg_type'] = "error";
	header('location:update_info.php');
	exit;
}

require_once('../../connect.php');

$sql = "select count(*) from customers
where (email = '$email' or phone = '$phone')
and id != '$id'";
$result = mysqli_query($connect,$sql);
echo($sql) ;
$each = mysqli_fetch_array($result)['count(*)'];
echo(json_encode($each));

if($each > 0) {
	$_SESSION['flash_msg'] = "email hoặc số điện thoại đã đăng ký!";
	$_SESSION['flash_msg_type'] = "error";
	header('location:../frontend/update_info.php');
	exit;
}

$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

if (!password_verify($old_password, $each['hashed_password'])) {
	$_SESSION['flash_msg'] = 'sai mật khẩu!';
	$_SESSION['flash_msg_type'] = "error";
	header('location:../frontend/update_info.php');
	exit;
}

// if($avatar) {
// 	$path_folder = '../../data/img/avatar/';
// 	$file_extension = explode('.',$avatar['tmp_name'])[1];
// 	$fiel_name = time() . rand(0,9999);
// 	$path_file_avatar = $path_folder . $fiel_name . '.' . $file_extension;
// 	$avatar_str = "avatar = '$path_file_avatar',";
// 	// die($path_file_avatar); 
// 	move_uploaded_file($avatar['tmp_name'], $path_file_avatar);
// } else {
// 	$avatar_str = '';
// }

// .$avatar_str.
// username = '$username',
$sql = "update customers
set 
name = '$name',
gender = '$gender',
email = '$email',
phone = '$phone',
DOB = '$DOB',"
.$hashed_new_password_str.
"address = '$address'
where id = '$id'";

echo($sql);


$result = mysqli_query($connect,$sql);

require('refresh_session.php');

$_SESSION['flash_msg'] = 'update info thành công!';
$_SESSION['flash_msg_type'] = 'success';

header('location:../frontend/update_info.php');