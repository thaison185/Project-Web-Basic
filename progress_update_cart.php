<?php 

$id = $_GET['id'];
$action = $_GET['action'];

$cart = json_decode($_COOKIE['cart']);

if($action == 'del') {
	array_splice($cart,$id,1);
	// echo json_encode($cart);
} else if($action == 'inc') {
	$cart[$id]->{'quantity'}++;
	// echo $cart[$id]['quantity'];
} else if($action == 'dec') {
	if ($cart[$id]->{'quantity'} == 1) {
		array_splice($cart,$id,1);
	} else
		$cart[$id]->{'quantity'}--;
}

setcookie('cart',json_encode($cart),time() + (86400 * 30));

header('location:cart.php');