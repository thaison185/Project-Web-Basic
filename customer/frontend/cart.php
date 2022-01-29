<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/cart.css">
	<!-- scripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../assets/js/check_blank_order.js" type="text/javascript"></script>
	<script src="../assets/js/functional_cart_btn.js" type="text/javascript"></script>
	<script src="../assets/js/update_display.js" type="text/javascript"></script>
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
		<tr id="item-<?php echo $index ?>">
			<td class="item_name" onclick="window.location='item_details.php?id=<?php echo $item['id'] ?>';"><?php echo $item['name'] ?></td>
			<td class="item_img" onclick="window.location='item_details.php?id=<?php echo $item['id'] ?>';"><img src="../../<?php echo $item['image'] ?>"></td>
			<td class="item_size">
				size <?php  echo $each->{'size'} ?><br>
				<?php if($each->{'ice'} != -1) echo $each->{'ice'}; ?><br>
				<?php if($each->{'sugar'} != -1) echo $each->{'sugar'}; ?>
			</td>
			<td class="item_price_per_item">
				$<span class="span_price_per_item"><?php echo $price ?></span>
			</td>
			<td class="item_quantity">
				<button class="btn" data-id="<?php echo $index ?>" data-type="dec">
					<i class="ti-minus"></i>
				</button>
				<span class="span_quantity"><?php echo $each->{'quantity'} ?></span>
				<button class="btn" data-id="<?php echo $index ?>" data-type="inc">
					<i class="ti-plus"></i>
				</button>
			</td>
			<td class="item_price">
				<h3>
					$<span class="span_price"><?php echo $each->{'quantity'}*$price ?></span>
				</h3>
			</td>
			<td class="item_del_btn">
				<button class="btn" data-id="<?php echo $index ?>" data-type="del"><i class="ti-trash trash_icon"></i></button>

			</td>
		</tr>
	<?php } ?>
	<tr>
		<td colspan="6" style="text-align: center;">Total:</td>
		<td> 
			<h1>
				$<span class="span_total"><?php echo $total ?></span>
			</h1>
		</td>
	</tr>
</table>
<form method="post" action="../backend/order.php">
	Notes: <textarea class="notes" name="notes"></textarea>
	<br>
	<br>
<?php if (isset($_SESSION['id'])) { ?>
	<input type="radio" id="reciever_0" name="reciever" value="0" checked>
	<input type="radio" id="reciever_1" name="reciever" value="1">
	<h2>Delivery address:</h2>
	<br>
	<label class="reciever_0" for="reciever_0">Use your delivery info</label>
	<!-- <br> -->
	<!-- <br> -->
		Or
	<!-- <br> -->
	<!-- <br> -->
	<label class="reciever_1" for="reciever_1">Fill in new delivery info</label>
	<br>
	<br>
		
<?php } else { ?>
	<input type="radio" id="reciever_1" name="reciever" value="1" checked style="display:none;">
	Fill in delivery info
	<br>
<?php } ?>
	<button type="submit" onclick="return check_blank()">Order</button>
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
</form>
<!-- <span class="error" id="span_regex_blank"></span> -->
<script type="text/javascript">
	// update_price_display();
</script>
</body>
</html>