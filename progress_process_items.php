<?php 

$action = $_POST['action'];
// die($action);

$id = $_POST['id'];
$size = $_POST['size'];
$ice = -1;
$sugar = -1;

if(isset($_POST['ice'])) {
	$ice = $_POST['ice'];
}
if(isset($_POST['sugar'])) {
	$sugar = $_POST['sugar'];
}

// setcookie('test','111');

if($action == 'add_to_cart') {
	$cart = [];
	$found = 0;
	if(isset($_COOKIE['cart'])) {
		$cart = json_decode($_COOKIE['cart']);
		// echo json_encode($cart);
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
	setcookie('cart',json_encode($cart));
}