<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="../assests/css/order_details.css">
</head>
<body>
	<?php include('header.php'); ?>
	<?php include('back.php'); ?>
	<?php 
	if (isset($_GET['id'])) {
		$order_id = $_GET['id'];
	} else {
		header('location:index.php');
		exit;
	}
	include('../../connect.php');

	$sql = "select * from orders
	where id = '$order_id'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);
	 ?>
	<h1>Order #<?php echo $order_id ?></h1>
	<div class="date"><?php echo $each['date']  ?></div>
	<?php include('flash_msg.php'); ?>
	<div class="status <?php echo $each['status'] ?>"><?php echo $each['status']  ?></div>
	<table width="100%">
		<tr class="head">
			<td>Name</td>
			<td>Image</td>
			<td>Size</td>
			<td>Options</td>
			<td>Quantity</td>
			<td>Price</td>
		</tr>
		<?php 

		$sql = "select * from order_details
		join items
		on items.id = order_details.item_id
		where order_id = '$order_id'";
		// echo $sql;
		$result = mysqli_query($connect,$sql);

		foreach ($result as $each_item) { ?>
			<tr>
				<td onclick="window.location='item_details.php?id=<?php echo $each_item['item_id'] ?>';"><?php echo $each_item['name']; ?></td>
				<td onclick="window.location='item_details.php?id=<?php echo $each_item['item_id'] ?>';" class="img"><img src="../../<?php echo $each_item['image']; ?>"></td>
				<td><?php echo $each_item['size']; ?></td>
				<td><?php echo $each_item['options']; ?></td>
				<td><?php echo $each_item['quantity']; ?></td>
				<td>$<?php echo $each_item['price']; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="5" style="text-align: right;">Total:</td>
			<td>$<?php echo $each['price']; ?></td>
		</tr>
	</table>
</body>
</html>