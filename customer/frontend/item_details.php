<?php session_start(); ?>
<?php 
$id = $_GET['id'];

require_once('../../connect.php');

$sql = "select * from items
where id = '$id'";
// echo $sql;
$result = mysqli_query($connect,$sql);
$item = mysqli_fetch_array($result);
// echo json_encode($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $item['name'] ?> - Q's Coffee</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/item_details.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
	<!-- script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../assets/js/functional_items_btn.js" type="text/javascript"></script>
	<script src="../assets/js/update_display.js" type="text/javascript"></script>
</head>
<body>
<?php include('header.php'); ?>
<?php include('back.php') ?>
	<!-- item start -->
		<div class="item" id="item-<?php echo $item['id'] ?>">
			<input type="text" name="id" value="<?php echo $item['id'] ?>" style="display: none;">
			<div class="img" style="background: url(../../<?php echo $item['image'];  ?>);
background-size: cover; background-position: center center;"></div>
			<div class="item-body">
				<div class="item-name"><?php echo $item['name'] ?></div>
				<div class="item-price">
					<span class="price-s"><?php if ($item['s_price'] != 0) echo '$' . $item['s_price'] ?></span>
					<span class="price-m"><?php if ($item['m_price'] != 0) echo '$' . $item['m_price'] ?></span>
					<span class="price-l"><?php if ($item['l_price'] != 0) echo '$' . $item['l_price'] ?></span>
				</div>
				<div class="item-size radio-box">
					<label>
						<input type="radio" name="size-<?php echo $item['id'] ?>" value="S"<?php if($item['s_price'] == 0) echo ' disabled'?>>
						<div>Small</div>
					</label>
					<label>
						<input type="radio" name="size-<?php echo $item['id'] ?>" value="M" checked<?php if($item['m_price'] == 0) echo ' disabled'?>>
						<div>Medium</div>
					</label>
					<label>
						<input type="radio" name="size-<?php echo $item['id'] ?>" value="L"<?php if($item['l_price'] == 0) echo ' disabled'?>>
						<div>Large</div>
					</label>
				</div>
				<?php if($item['ice'] == 1) { ?>
					<div class="item-ice radio-box">
						<label>
							<input type="radio" name="ice-<?php echo $item['id'] ?>" value="hot">
							<div>Hot</div>
						</label>
						<label>
							<input type="radio" name="ice-<?php echo $item['id'] ?>" value="0% ice">
							<div>0% ice</div>
						</label>
						<label>
							<input type="radio" name="ice-<?php echo $item['id'] ?>" value="50% ice" checked>
							<div>50% ice</div>
						</label>
						<label>
							<input type="radio" name="ice-<?php echo $item['id'] ?>" value="100% ice">
							<div>100% ice</div>
						</label>
					</div>
				<?php } ?>
				<?php if($item['sugar'] == 1) { ?>
					<div class="item-sugar radio-box">
						<label>
							<input type="radio" name="sugar-<?php echo $item['id'] ?>" value="0% sugar">
							<div>0% sugar</div>
						</label>
						<label>
							<input type="radio" name="sugar-<?php echo $item['id'] ?>" value="50% sugar" checked>
							<div>50% sugar</div>
						</label>
						<label>
							<input type="radio" name="sugar-<?php echo $item['id'] ?>" value="100% sugar">
							<div>100% sugar</div>
						</label>
					</div>
				<?php } ?>
			</div>
			<?php include('flash_msg.php'); ?>
			<div class="btn">
				<label>Add to cart
					<button class="btn_add_to_cart" name="action" data-id="<?php echo$item['id'] ?>" data-type="add_to_cart"></button>
				</label>
			</div>
		</div>
	<!-- item end -->
</body>
</html>