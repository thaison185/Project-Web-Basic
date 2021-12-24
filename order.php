<?php 
session_start();

$id = $_SESSION['id'];

require_once('connect.php');

$cart = json_decode($_COOKIE['cart']);
$total = 0;
foreach ($cart as $each) {
	$id = $each->{'id'};
	$sql = "select * from items where id = '$id'";
	$result = mysqli_query($connect,$sql);
	$item = mysqli_fetch_array($result);

	switch ($each->{'size'}) {
		case 'small':
			$price = $item['price_s'];
			break;
	
		case 'medium':
			$price = $item['price_m'];
			break;
	
		case 'large':
			$price = $item['price_l'];
			break;
	}
	$total += $each->{'quantity'}*$price;
}

$sql = "INSERT INTO orders(customer_id, description, price, status) 
VALUES ('$id','','$total','0')";
// echo $sql;
$result = mysqli_query($connect,$sql);

$sql = "select max(id) from orders 
where customer_id = '$id'";
// echo $sql;
$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];
// echo $order_id;

foreach ($cart as $each) {
	$id = $each->{'id'};

	switch ($each->{'size'}) {
		case 'small':
			$price = $item['price_s'];
			break;
	
		case 'medium':
			$price = $item['price_m'];
			break;
	
		case 'large':
			$price = $item['price_l'];
			break;
	}
	$item_id = $each->{'id'};
	$quantity = $each->{'quantity'};
	$price = $price*$each->{'quantity'};
	$ice = $each->{'ice'};
	$sugar = $each->{'sugar'};
	$option = "$ice, $sugar";
	$size = $each->{'size'};

	$sql = "INSERT INTO order_detail(order_id, item_id, quantity, price, option, size) 
	VALUES ('$order_id','$item_id','$quantity','$price','$option','$size')";
	echo $sql;
	$result = mysqli_query($connect,$sql);

}

// Order_Details
// order_id
// item_id
// quantity
// price
// options
// size