<?php 
$username = $_POST['username'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$DOB = $_POST['DOB'];
$address = $_POST['address'];
$password = md5($_POST['password']);

require_once('connect.php');

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

$sql = "insert into customers(id,username,name,gender,email,phone,DOB,address,hashed_password)
values('$id','$username','$name','$gender','$email','$phone','$DOB','$address','$password')";

$result = mysqli_query($connect,$sql);
die($sql);

mysql_close($connect);