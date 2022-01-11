<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../assests/css/cart.css">
	<!-- scripts -->
	<script src="../assests/js/check_blank_order.js" type="text/javascript"></script>
</head>
<body>
<?php include('header.php'); ?>
<?php include('back.php') ?>
<?php include('flash_msg.php'); ?>
<?php 
if(!isset($_COOKIE['cart'])) { 
	?>
	<img class="empty_cart" src="../../data/img/empty_cart.png">
<?php
die();
 } 
$cart = json_decode($_COOKIE['cart']);
if(count($cart) == 0) { ?>
	<img class="empty_cart" src="../../data/img/empty_cart.png">
<?php
die();
 }

require_once('../../connect.php');

$total = 0;
 ?>
<table>
	<tr class="head">
		<td><h3>Name</h3></td>
		<td><h3>Image</h3></td>
		<td><h3>Options</h3></td>
		<td><h3>Price per item</h3></td>
		<td><h3>Quantity</h3></td>
		<td><h3>Price</h3></td>
		<td><h3>Update</h3></td>
	</tr>
	<?php foreach ($cart as $index => $each) { ?>
		<?php 
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
		?>
		<tr>
			<td onclick="window.location='item_details.php?id=<?php echo $item['id'] ?>';"><?php echo $item['name'] ?></td>
			<td class="img" onclick="window.location='item_details.php?id=<?php echo $item['id'] ?>';"><img src="../../<?php echo $item['image'] ?>"></td>
			<td>
				size <?php  echo $each->{'size'} ?><br>
				<?php if($each->{'ice'} != -1) echo $each->{'ice'}; ?><br>
				<?php if($each->{'sugar'} != -1) echo $each->{'sugar'}; ?>
			</td>
			<td>$<?php echo $price ?></td>
			<td>
				<a href="../backend/progress_update_cart.php?id=<?php echo $index ?>&action=dec"><i class="ti-minus"></i></a>
				<?php echo $each->{'quantity'} ?>
				<a href="../backend/progress_update_cart.php?id=<?php echo $index ?>&action=inc"><i class="ti-plus"></i></a>
			</td>
			<td>$<?php echo $each->{'quantity'}*$price ?></td>
			<td>
				<a href="../backend/progress_update_cart.php?id=<?php echo $index ?>&action=del" style="color: red;"><i class="ti-trash"></i></a>

			</td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="6" style="text-align: center;">Total:</td>
		<td> 
			<h2>$<?php echo $total ?></h2>
		</td>
	</tr>
</table>
<form method="post" action="../backend/order.php">
	<table>	
		<tr>
			<td>
				Notes:
				<textarea class="notes" name="notes"></textarea>
			</td>
		</tr>
	<?php if (isset($_SESSION['id'])) { ?>
		<input type="radio" id="reciever_0" name="reciever" value="0" checked>
		<input type="radio" id="reciever_1" name="reciever" value="1">
		<tr>
			<td>Delivery address:</td>
		</tr>
		<tr>
			<td class="reciever_0">
				<label for="reciever_0">Use your delivery info</label>
			</td>
		</tr>
		<tr>
			<td>Or</td>
		</tr>
		<tr>
			<td class="reciever_1">
				<label for="reciever_1">Fill in new delivery info</label>
			</td>
		</tr>
	<?php } else { ?>
		<input type="radio" id="reciever_1" name="reciever" value="1" checked style="display:none;">
		<tr>
			<td>Fill in delivery info</td>
		</tr>
	<?php } ?>
		<table class="reciever_info">
			<tr>
				<td>Name</td>
				<td>
					<input type="text" id="name" name="name">
				</td>
			</tr>	
			<tr>
				<td>Phone</td>
				<td>
					<input type="text" id="phone" name="phone">
				</td>
			</tr>	
			<tr>
				<td>Address</td>
				<td>
					<textarea id="address" name="address"></textarea>
				</td>
			</tr>	
		</table>	
	</table>
	<button type="submit" onclick="return check_blank()">Order</button>
</form>
<!-- <span class="error" id="span_regex_blank"></span> -->
</body>
</html>