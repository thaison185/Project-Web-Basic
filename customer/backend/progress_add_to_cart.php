<?php

// die($_GET['size']);

session_start();

$id = $_GET['id'];
// die($id);

$cart = [];
$total_quantity = 0;
if(isset($_COOKIE['cart'])) {
	$cart = json_decode($_COOKIE['cart']);
	foreach ($cart as $each) {
		$total_quantity += $each->{'quantity'};
	}
}

if ($total_quantity >= 50) {
	// $_SESSION['flash_msg'] = "error-- The number of products in the cart cannot exceed 50!";
	// header('location:../frontend/index.php');
	echo "error-- The number of products in the cart cannot exceed 50!";
	exit;
}
$size = $_GET['size'];
$ice = -1;
$sugar = -1;

if(isset($_GET['ice'])) {
	$ice = $_GET['ice'];
}

if(isset($_GET['sugar'])) {
	$sugar = $_GET['sugar'];
}

$found = 0;
if($cart) {
	foreach ($cart as $each) {
		if($each->{'id'} == $id && $each->{'size'} == $size && $each->{'ice'} == $ice && $each->{'sugar'} == $sugar) {
			$each->{'quantity'}++;
			$found = 1;
			break;
		}
}

}
if(!$found) {
	$item = [
		'id' => $id,
		'size' => $size,
		'ice' => $ice,
		'sugar' => $sugar,
		'quantity' => 1
	];
	array_push($cart,$item);
}
// echo json_encode($item);
// echo json_encode($cart);
// header('location:../frontend/index.php');
// setcookie('cart',json_encode($cart),time() + (86400 * 30), '/');

echo "success add";

setcookie('cart',json_encode($cart),time() + (86400 * 30), '/');