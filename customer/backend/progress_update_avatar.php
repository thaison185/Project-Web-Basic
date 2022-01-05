<?php 

session_start();

$id = $_SESSION['id'];

$avatar = $_FILES['avatar'];

if (!$avatar['tmp_name']) {
	header('../frontend/update_info.php');
	exit;
}

$path_folder = '../../data/img/avatar/';
$file_extension = explode('.',$avatar['tmp_name'])[1];
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

echo($sql);

$result = mysqli_query($connect,$sql);

require('refresh_session.php');

header('location:../frontend/update_info.php');