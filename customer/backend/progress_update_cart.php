<?php 

// die($_GET['size']);

session_start();

$id = $_GET['id'];
// die($id);
$type = $_GET['type'];
// die($type);

$cart = [];
$total_quantity = 0;
if(isset($_COOKIE['cart'])) {
	$cart = json_decode($_COOKIE['cart']);
	foreach ($cart as $each) {
		$total_quantity += $each->{'quantity'};
	}
}

if($type == 'del') {
	array_splice($cart,$id,1);
	echo "success del";
	// echo json_encode($cart);
} else if($type == 'inc') {
	if ($total_quantity >= 50) {
		// $_SESSION['flash_msg'] = "error-- The number of products in the cart cannot exceed 50!";
		// header('location:../frontend/cart.php');
		echo "error-- The number of products in the cart cannot exceed 50!";
		exit;
	}
	$cart[$id]->{'quantity'}++;
	echo "success inc";
	// echo $cart[$id]['quantity'];
} else if($type == 'dec') {
	if ($cart[$id]->{'quantity'} == 1) {
		array_splice($cart,$id,1);
	} else
		$cart[$id]->{'quantity'}--;
	echo "success dec";
}

setcookie('cart',json_encode($cart),time() + (86400 * 30), '/');

// echo "1";

// header('location:../frontend/cart.php');