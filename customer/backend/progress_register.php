<?php 

session_start();

$error = '';

if($_POST['username']) {
	$username = $_POST['username'];
} else {
	$error = "An error occurred!";
}

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

$avatar = $_FILES['avatar'];
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

if($_POST['password']) {
	$password = $_POST['password'];
	$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
	$error = "An error occurred!";
}

if($error) {
	$_SESSION['flash_msg'] = "error $error";
	// die($error);
	header('location:../frontend/register.php');
	// echo("error-- $error");
	exit;
}

$error = null;
$regex = "/^(?=.*[a-zA-Z])[\w._]{8,20}$/";
if(!preg_match($regex, $username)) {
	$error = "An error occurred!";
}
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
$regex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/";
if(!preg_match($regex, $password)) {
	$error = "An error occurred!";
}

if($error) {
	$_SESSION['flash_msg'] = "error $error";
	header('location:../frontend/register.php');
	// echo("error-- $error");
	exit;
}

require_once('../../connect.php');

$sql = "select count(*) from customers
where username = '$username' or email = '$email' or phone = '$phone'";
// echo $sql;
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result)['count(*)'];

if($each > 0) {
	$_SESSION['flash_msg'] = "error Username or Email or Phone number has been registered!";
	header('location:../frontend/register.php');
	// echo("error-- Username or Email or Phone number has been registered!");
	exit;
}

$sql = "select max(id) from customers";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result)['max(id)'];
$id = $each+1;
// die($each);
// echo json_encode($avatar);
// die(!!$avatar);

$path_file_avatar = 'null';
if($avatar['tmp_name']) {
	$path_folder = '../../data/img/avatar/';
	$file_extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
	$file_name = time() . rand(0,9999);
	$path_file_avatar = '\''.$path_folder . $file_name . '.' . $file_extension;
	// die($path_file_avatar); 
	move_uploaded_file($avatar['tmp_name'], $path_file_avatar);
}

$sql = "insert into customers(id,username,name,gender,avatar,email,phone,DOB,address,hashed_password)
values('$id','$username','$name','$gender',$path_file_avatar,'$email','$phone','$DOB','$address','$hashed_password')";

$result = mysqli_query($connect,$sql);
// echo($sql);

mysqli_close($connect);

$_SESSION['flash_msg'] = 'success Register successful!';

header('location:../frontend/login.php');