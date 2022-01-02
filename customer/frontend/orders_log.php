<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../assests/css/orders_log.css">
</head>
<body>
	<?php include('header.php'); ?>
	<!-- <?php include('back.php') ?> -->
	<?php include('error.php'); ?>
	<?php
	$customer_id = $_SESSION['id'];

	$page = 1;
	if(isset($_GET['page'])) {
		if($_GET['page']) {
			$page = $_GET['page'];
		}
	}

	require_once('../../connect.php');

	$sql = "select count(*) from orders
	where customer_id = '$customer_id'";
	// echo $sql;
	$result = mysqli_query($connect,$sql);
	$n_orders = mysqli_fetch_array($result)['count(*)'];
	// die($n_orders);	

	$orders_per_page = 10;
	$n_pages = ceil($n_orders / $orders_per_page);

	$offset = ($page - 1)*$orders_per_page;
	$sql = "select * from orders 
	where customer_id = '$customer_id'
	limit $orders_per_page offset $offset";
	$result = mysqli_query($connect,$sql);

	// $empty = !mysqli_fetch_array($result);
	// die($empty);
	// $each = mysqli_fetch_array($result);
	// echo ($each);
	if($n_orders) { ?>
		<table>
			<tr>
				<td><h3>Id</h3></td>
				<td><h3>Date</h3></td>
				<td><h3>Items</h3></td>
				<td><h3>Description</h3></td>
				<td><h3>Total</h3></td>
				<td><h3>Status</h3></td>
			</tr>
			<?php foreach ($result as $each_order) { ?>
				<?php 
				$order_id = $each_order['id'];

				require_once('../../connect.php');

				$sql = "select count(*) from order_details 
				where order_id = '$order_id'";
				$result = mysqli_query($connect,$sql);
				$quantity = mysqli_fetch_array($result)['count(*)'];
				// echo $quantity;
				// echo($sql);

				$sql = "select * from order_details 
				join items
				on order_details.item_id = items.id 
				where order_details.order_id = '$order_id'";
				$result_detail = mysqli_query($connect,$sql);
				// $each_item = $result;
				// die(json_encode($each_item));
				$items_in_order = '';
				$count = 0;
				foreach ($result_detail as $each_item) {
					if(++$count == 4) {
						$items_in_order = $items_in_order . "...";
						break;
					}
					$items_in_order = $items_in_order . $each_item['quantity'] . ' ' . $each_item['name'] . ' size ' . $each_item['size'] . "\n";
				}

				 ?>
				<tr>
					<td
					>#<?php echo $each_order['id'] ?></td>
					<td onclick="window.location='order_detail.php?id=<?php echo $each_order['id'] ?>';"><?php echo $each_order['date'] ?></td>
					<td onclick="window.location='order_detail.php?id=<?php echo $each_order['id'] ?>';"><?php echo nl2br($items_in_order) ?></td>
					<td onclick="window.location='order_detail.php?id=<?php echo $each_order['id'] ?>';"><?php echo nl2br($each_order['description']) ?></td>
					<td onclick="window.location='order_detail.php?id=<?php echo $each_order['id'] ?>';">$<?php echo $each_order['price'] ?></td>
					<td class="<?php echo $each_order['status'] ?>" onclick="window.location='order_detail.php?id=<?php echo $each_order['id'] ?>';"><?php echo $each_order['status'] ?></td>
				</tr>
			<?php } ?>
		</table>
	<?php } else { ?>
		<h2 class="empty_log">Log is Empty!</h2>
	<?php } ?>
	<!-- pages start -->
	<?php include('pages.php') ?>
	<!-- pages end -->
</body>
</html>