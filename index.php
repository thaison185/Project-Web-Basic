<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="./assests/css/index_style.css">
	<link rel="stylesheet" type="text/css" href="./assests/css/header.css">
	<link rel="stylesheet" type="text/css" href="./assests/css/footer.css">
	<link rel="stylesheet" type="text/css" href="./assests/font/themify-icons/themify-icons.css">
	<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
</head>
<body>
<div id="main">
	<?php session_start(); ?>
	<!-- header-start -->
	<?php
		require_once('header.php');
	?>
	<!-- header-end -->
	<!-- slider-start -->
	<div id="slider">
		<div class="slides">
			<div class="slide">
				<img src="./assests/img/slides/slide1.jpg">
			</div>
		</div>
		<div class="radio">
			<div class="radio-btn"></div>
			<div class="radio-btn"></div>
			<div class="radio-btn"></div>
		</div>
	</div>
	<!-- slider-end -->
	<!-- items-start -->
	<div id="items">
		<?php 
		require_once('connect.php');

		$sql = "select count(*) from items";
		$result = mysqli_query($connect,$sql);
		$n_items = mysqli_fetch_array($result)['count(*)'];

		$sql = "select * from items";
		$result = mysqli_query($connect,$sql);
		// echo json_encode($result[0]);
		?>

		<?php foreach ($result as $each) { ?>
			<!-- item start -->
			<div class="item">
				<form method="post" action="progress_process_items.php">
					<input type="text" name="id" value="<?php echo $each['id'] ?>" style="display: none;">
					<img src="<?php echo $each['image'];  ?>">
					<div class="item-body">
						<div class="item-name"><?php echo $each['name'] ?></div>
						<div class="item-price">$9</div>
						<div class="item-size radio-box">
							<label>
								<?php if($each['price_s'] != 0) {?>
									<input type="radio" name="size" value="small">
								<?php } ?>
								<div>Small</div>
							</label>
							<label>
								<?php if($each['price_m'] != 0) {?>
									<input type="radio" name="size" value="medium" checked>
								<?php } ?>
								<div>Medium</div>
							</label>
							<label>
								<?php if($each['price_l'] != 0) {?>
									<input type="radio" name="size" value="large">
								<?php } ?>
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
		<?php }  ?>
	</div>
	<!-- items end -->
	<!-- footer-start -->
	<?php
		require_once('footer.php');
	?>
	<!-- footer-end -->

	<?php mysqli_close($connect) ?>
</div>
</body>
</html>