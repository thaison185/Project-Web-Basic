<?php 
$id = $_GET['id'];

require_once('../../connect.php');

$sql = "select * from items
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $each['name'] ?> - Starwar Coffee</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/item_details.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<?php include('back.php') ?>
<?php include('flash_msg.php'); ?>
	<!-- item start -->
		<div class="item">
			<form method="get" action="../backend/progress_update_cart.php">
				<input type="text" name="id" value="<?php echo $each['id'] ?>" style="display: none;">
				<div class="img" style="background: url(../../<?php echo $each['image'];  ?>); background-size: cover; background-position: center center;"></div>
				<div class="item-body">
					<div class="item-name"><?php echo $each['name'] ?></div>
					<div class="item-price">$9</div>
					<div class="item-size radio-box">
						<label>
							<input type="radio" name="size" value="S"<?php if($each['s_price'] == 0) echo ' disabled'?>>
							<div>Small</div>
						</label>
						<label>
							<input type="radio" name="size" value="M" checked<?php if($each['m_price'] == 0) echo ' disabled'?>>
							<div>Medium</div>
						</label>
						<label>
							<input type="radio" name="size" value="L"<?php if($each['s_price'] == 0) echo ' disabled'?>>
							<div>Large</div>
						</label>
					</div>
					<?php if($each['ice'] == 1) { ?>
						<div class="item-ice radio-box">
							<label>
								<input type="radio" name="ice" value="hot">
								<div>Hot</div>
							</label>
							<label>
								<input type="radio" name="ice" value="0% ice">
								<div>0% ice</div>
							</label>
							<label>
								<input type="radio" name="ice" value="50% ice" checked>
								<div>50% ice</div>
							</label>
							<label>
								<input type="radio" name="ice" value="100% ice">
								<div>100% ice</div>
							</label>
						</div>
					<?php } ?>
					<?php if($each['sugar'] == 1) { ?>
						<div class="item-sugar radio-box">
							<label>
								<input type="radio" name="sugar" value="0% sugar">
								<div>0% sugar</div>
							</label>
							<label>
								<input type="radio" name="sugar" value="50% sugar" checked>
								<div>50% sugar</div>
							</label>
							<label>
								<input type="radio" name="sugar" value="100% sugar">
								<div>100% sugar</div>
							</label>
						</div>
					<?php } ?>
				</div>
				<div class="btn">
					<!-- <label>Buy now
						<input type="submit" class="buy_now" name="action" value="buy_now">
					</label> -->
					<label>Add to cart
						<input type="submit" class="add_to_cart" name="action" value="add_to_cart">
					</label>
				</div>
			</form>
		</div>
	<!-- item end -->
</body>
</html>