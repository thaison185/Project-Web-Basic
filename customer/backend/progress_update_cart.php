<?php 

// die(($_COOKIE['cart']));
session_start();

$id = $_GET['id'];
// die($id);
$action = $_GET['action'];

$cart = [];
$total_quantity = 0;
if(isset($_COOKIE['cart'])) {
	$cart = json_decode($_COOKIE['cart']);
	foreach ($cart as $each) {
		$total_quantity += $each->{'quantity'};
	}
}

if($action == 'del') {
	array_splice($cart,$id,1);
	// echo json_encode($cart);
} else if($action == 'inc') {
	if ($total_quantity >= 50) {
		$_SESSION['error'] = "Số lượng sản phẩm trong giỏ hàng không được vượt quá 50!";
	header('location:../frontend/cart.php');
	exit;
	}
	$cart[$id]->{'quantity'}++;
	// echo $cart[$id]['quantity'];
} else if($action == 'dec') {
	if ($cart[$id]->{'quantity'} == 1) {
		array_splice($cart,$id,1);
	} else
		$cart[$id]->{'quantity'}--;
} else if($action == 'add_to_cart') {
	if ($total_quantity >= 50) {
		$_SESSION['error'] = "Số lượng sản phẩm trong giỏ hàng không được vượt quá 50!";
	header('location:../frontend/index.php');
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
	echo json_encode($cart);
	header('location:../frontend/index.php');
	setcookie('cart',json_encode($cart),time() + (86400 * 30), '/');
	exit;
}

setcookie('cart',json_encode($cart),time() + (86400 * 30), '/');

header('location:../frontend/cart.php');