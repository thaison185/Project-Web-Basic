<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
</head>
<body>
<h1>CART</h1>
<?php include('back.php') ?>
<?php 
if(!isset($_COOKIE['cart'])) { 
	?>
	<h2>Cart is Empty!</h2>
<?php
die();
 } 
$cart = json_decode($_COOKIE['cart']);
if(count($cart) == 0) { ?>
	<h2>Cart is Empty!</h2>
<?php
die();
 }

require_once('connect.php');

$total = 0;
 ?>
<table border="1px" width="100%">
	<tr>
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
		?>
		<tr>
			<td><?php echo $item['name'] ?></td>
			<td><img width="100px" src="<?php echo $item['image'] ?>"></td>
			<td>
				size <?php  echo $each->{'size'} ?><br>
				<?php if($each->{'ice'} != -1) echo $each->{'ice'}; ?><br>
				<?php if($each->{'sugar'} != -1) echo $each->{'sugar'}; ?>
			</td>
			<td>$<?php echo $price ?></td>
			<td>
				<a href="progress_update_cart.php?id=<?php echo $index ?>&action=dec">-</a>
				<?php echo $each->{'quantity'} ?>
				<a href="progress_update_cart.php?id=<?php echo $index ?>&action=inc">+</a>
			</td>
			<td>$<?php echo $each->{'quantity'}*$price ?></td>
			<td>
				<a href="progress_update_cart.php?id=<?php echo $index ?>&action=del" style="color: red;">Delete</a>

			</td>
		</tr>
	<?php } ?>
</table>
<h2 >Total: $<?php echo $total ?></h2>
<!-- style="position: absolute; bottom: -120px; left: 0; padding-bottom: 20px;" -->
<h2><a href="order.php">Order</a></h2>
 <!-- style="position: absolute; bottom: -120px; right: 0; padding-bottom: 20px;" -->
</body>
</html>