<?php 

// die(json_encode(isset($_POST['new_passsword'])));

$error = null;

session_start();

$id = $_SESSION['id'];

// if( isset($_POST['username'])) {
// 	$username = $_POST['username'];
// } else {
// 	$error = "An error occurred!";
// }

if($_POST['name']) {
	$name = $_POST['name'];
} else {
	$error = "An error occurred!";
}

if($_POST['gender'] !== null) {
	$gender = $_POST['gender'];
} else {
	$error = "An error occurred!";
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
	$error = "An error occurred!";
}

if($_POST['phone']) {
	$phone = $_POST['phone'];
} else {
	$error = "An error occurred!";
}

if($_POST['DOB']) {
	$DOB = $_POST['DOB'];
} else {
	$error = "An error occurred!";
}

if($_POST['address']) {
	$address = $_POST['address'];
} else {
	$error = "An error occurred!";
}

if($_POST['old_password']) {
	$old_password = $_POST['old_password'];
} else {
	$error = "An error occurred!";
}

$hashed_new_password_str = '';
if($_POST['new_password']) {
	$new_password = $_POST['new_password'];
	$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
	$hashed_new_password_str = "hashed_password = '$hashed_new_password',";
	// echo("<br> \"$new_password\" <br>vclllllllllllllllllll<br>");
}

if($error) {
	$_SESSION['flash_msg'] = "error-- $error";
	header('location:../frontend/update_info.php');
	exit;
}


// $regex = "/^(?=.*[a-zA-Z])[\w._]{8,20}$/";
// if(!preg_match($regex, $username)) {
// 	$error = "An error occurred!";
// }
$regex = "/^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(\ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)+$/";
if(!preg_match($regex, $name)) {
	$error = "An error occurred!";
}
$regex = "/^\w+@\w+(\.\w+)+$/";
if(!preg_match($regex, $email)) {
	$error = "An error occurred!";
}
$regex = "/^[\+\-0-9]{9,15}$/";
if(!preg_match($regex, $phone)) {
	$error = "An error occurred!";
}
if($new_password) {
	$regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/";
	if(!preg_match($regex, $new_password)) {
		$error = "An error occurred!";
	}
}

if($error) {
	$_SESSION['flash_msg'] = "error-- $error";
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
	// $_SESSION['flash_msg'] = "error-- Email or Phone number has been registered!";
	echo("error-- Email or Phone number has been registered!");
	// header('location:../frontend/update_info.php');
	exit;
}

$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

if (!password_verify($old_password, $each['hashed_password'])) {
	// $_SESSION['flash_msg'] = 'error-- Incorrect account or password!';
	echo("error-- Incorrect account or password!");
	// header('location:../frontend/update_info.php');
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

$_SESSION['flash_msg'] = 'success Update info thành công!';

header('location:../frontend/update_info.php');