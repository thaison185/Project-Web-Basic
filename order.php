<?php 
session_start();
if(isset($_SESSION['id']))
	$customer_id = $_SESSION['id'];
else
	$customer_id = 0;
// die($id);

require_once('connect.php');

$cart = json_decode($_COOKIE['cart']);
$total = 0;
foreach ($cart as $each) {
	$id = $each->{'id'};
	$sql = "select * from items where id = '$id'";
	$result = mysqli_query($connect,$sql);
	$item = mysqli_fetch_array($result);

	switch ($each->{'size'}) {
		case 's':
			$price = $item['s_price'];
			break;
	
		case 'm':
			$price = $item['m_price'];
			break;
	
		case 'l':
			$price = $item['l_price'];
			break;
	}
	$total += $each->{'quantity'}*$price;
}

$sql = "INSERT INTO orders(customer_id, description, price, status) 
VALUES ('$customer_id','','$total','pending')";
echo $sql;
$result = mysqli_query($connect,$sql);

$sql = "select max(id) from orders 
where customer_id = '$customer_id'";
echo $sql;
$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];
// echo $order_id;

foreach ($cart as $each) {
	$id = $each->{'id'};

	switch ($each->{'size'}) {
		case 's':
			$price = $item['s_price'];
			break;
	
		case 'm':
			$price = $item['m_price'];
			break;
	
		case 'l':
			$price = $item['l_price'];
			break;
	}
	$item_id = $each->{'id'};
	$quantity = $each->{'quantity'};
	$price = $price*$each->{'quantity'};
	$ice = $each->{'ice'};
	$sugar = $each->{'sugar'};
	if($ice != -1) {
		if ($sugar != -1) {
			$options = "$ice, $sugar";
		} else {
			$options = "$ice";
		}
	} else {
		if ($sugar != -1) {
			$options = "$sugar";
		} else {
			$options = '';
		}
	}
	$size = $each->{'size'};

	$sql = "INSERT INTO `order_details`(`order_id`, `item_id`, `quantity`, `price`, `options`, `size`)
	VALUES ('$order_id','$item_id','$quantity','$price','$options','$size')";
	echo $sql;
	$result = mysqli_query($connect,$sql);

}
require_once('delete_cart.php');

// Order_detailss
// order_id
// item_id
// quantity
// price
// optionss
// size