<?php 

session_start();

$id = $_SESSION['id'];

$avatar = $_FILES['avatar'];

if (!$avatar['tmp_name']) {
	// header('../frontend/update_info.php');
	echo("error-- Image not found!");
	exit;
}

$path_folder = '../../data/img/customers/';
// $file_extension = explode('.',$avatar['name'])[1];
$file_extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
$fiel_name = time() . rand(0,9999);
$path_file_avatar = $path_folder . $fiel_name . '.' . $file_extension;
// $avatar_str = "avatar = '$path_file_avatar',";
// die($path_file_avatar); 
move_uploaded_file($avatar['tmp_name'], $path_file_avatar);

require_once('../../connect.php');

$sql = "update customers
set 
avatar = '$path_file_avatar'
where id = '$id'";

// echo($sql);

$result = mysqli_query($connect,$sql);

require('refresh_session.php');

$_SESSION['flash_msg'] = 'success Change avatar successfully!';

header('location:../frontend/update_info.php');