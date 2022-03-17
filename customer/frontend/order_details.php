<?php session_start(); ?>
<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="../assets/css/order_details.css">
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
	<?php if (isset($_SESSION['id'])) {
		if ($_SESSION['id'] == $each['customer_id']) {?>
	<div class="description">
		<?php echo nl2br($each['description']) ?>
	</div>
	<?php	}
	} ?>
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
				<td>
					<h3>
						$<?php echo $each_item['price']; ?>
					</h3>
				</td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="5" style="text-align: center;">Total:</td>
			<td>
				<h1>
					$<?php echo $each['price']; ?>
				</h1>
			</td>
		</tr>
	</table>
</body>
</html>