<?php 
session_start();

// die($_POST['name'] == '1');
// die(isset($_POST['notes']));

// kiem tra gio hang trong
if (!isset(json_decode($_COOKIE['cart'])['0'])) {
	// echo("error-- empty cart!");
	header('location:../frontend/index.php');
	$_SESSION['flash_msg'] = 'error-- Empty cart!';
	exit;
}

// kiem tra id
if(isset($_SESSION['id']))
	$customer_id = $_SESSION['id'];
else
	$customer_id = 0;
// die($id);

if ($customer_id == 0)
	if($_POST['name'] == '' || $_POST['phone'] == '' || $_POST['address'] == '') {
		// echo("error-- Delivery info required!");
		header('location:../frontend/cart.php');
		$_SESSION['flash_msg'] = 'error-- Delivery info required!';
		exit;
	}

$reciever = $_POST['reciever'];
if ($reciever == 0) {
	$reciever_info = 
	"Name: " . $_SESSION['name'] . 
	"\nPhone: " . $_SESSION['phone'] . 
	"\nAddress: " . $_SESSION['address'];
} else {
	$reciever_info = 
	"Name: " . $_POST['name'] . 
	"\nPhone : " . $_POST['phone'] . 
	"\nAddress: " . $_POST['address'];
}

$notes = $_POST['notes'];

// die(isset($_POST['notes']));

require_once('../../connect.php');

$cart = json_decode($_COOKIE['cart']);
$i = 0;
$description = '';
$total = 0;
foreach ($cart as $each) {
	$id = $each->{'id'};
	$sql = "select * from items where id = '$id'";
	$result = mysqli_query($connect,$sql);
	$item = mysqli_fetch_array($result);

	switch ($each->{'size'}) {
		case 'S':
			$price = $item['s_price'];
			break;
	
		case 'M':
			$price = $item['m_price'];
			break;
	
		case 'L':
			$price = $item['l_price'];
			break;
	}
	$total += $each->{'quantity'}*$price;
}

$description = $reciever_info;
if (strlen($notes) > 0) {
	$description = $description . '\nNotes: ' . $notes;
}

// die($description);

$sql = "INSERT INTO orders(customer_id, description, price, status) 
VALUES ('$customer_id','$description','$total','Pending')";
// echo $sql;
$result = mysqli_query($connect,$sql);

$sql = "select max(id) from orders 
where customer_id = '$customer_id'";
// echo $sql;
$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];
// echo $order_id;

foreach ($cart as $each) {
	$id = $each->{'id'};
	$sql = "select * from items where id = '$id'";
	$result = mysqli_query($connect,$sql);
	$item = mysqli_fetch_array($result);

	switch ($each->{'size'}) {
		case 'S':
			$price = $item['s_price'];
			break;
	
		case 'M':
			$price = $item['m_price'];
			break;
	
		case 'L':
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
	// echo $sql;
	$result = mysqli_query($connect,$sql);

}
require_once('../backend/delete_cart.php');

$_SESSION['flash_msg'] = 'success Order Success!';

header("location:../frontend/order_details.php?id=$order_id");

// Order_detailss
// order_id
// item_id
// quantity
// price
// optionss
// size