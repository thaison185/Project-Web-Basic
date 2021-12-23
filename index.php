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
		<!-- item start -->
		<div class="item">
			<img src="./assests/img/items/capuchino.png">
			<form>
				<div class="item-body">
					<input type="text" name="" value="1" style="display='none';">
					<div class="item-name">Capuchino</div>
					<div class="item-price">$9</div>
					<div class="item-size radio-box">
						<label>
							<input type="radio" name="size" value="Large">
							<div>Large</div>
						</label>
						<label>
							<input type="radio" name="size" value="Medium" checked>
							<div>Medium</div>
						</label>
						<label>
							<input type="radio" name="size" value="Small">
							<div>Small</div>
						</label>
					</div>
					<div class="item-ice radio-box" style="display: none;">
						<label>
							<input type="radio" name="iced" value="Hot">
							<div>Hot</div>
						</label>
						<label>
							<input type="radio" name="iced" value="0% ice">
							<div>0% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="50% ice" checked>
							<div>50% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="100% ice">
							<div>100% ice</div>
						</label>
					</div>
				</div>
				<div class="btn">
					<button class="buy-now">Buy now</button>
					<button class="add-to-cart">Add to cart</button>
				</div>
			</form>

		</div>
		<!-- item end -->
		<!-- item start -->
		<div class="item">
			<img src="./assests/img/items/capuchino.png">
			<form>
				<div class="item-body">
					<input type="text" name="" value="2" style="display='none';">
					<div class="item-name">Capuchino</div>
					<div class="item-price">$9</div>
					<div class="item-size radio-box">
						<label>
							<input type="radio" name="size" value="Large">
							<div>Large</div>
						</label>
						<label>
							<input type="radio" name="size" value="Medium" checked>
							<div>Medium</div>
						</label>
						<label>
							<input type="radio" name="size" value="Small">
							<div>Small</div>
						</label>
					</div>
					<div class="item-ice radio-box">
						<label>
							<input type="radio" name="iced" value="Hot">
							<div>Hot</div>
						</label>
						<label>
							<input type="radio" name="iced" value="0% ice">
							<div>0% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="50% ice" checked>
							<div>50% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="100% ice">
							<div>100% ice</div>
						</label>
					</div>
				</div>
				<div class="btn">
					<button class="buy-now">Buy now</button>
					<button class="add-to-cart">Add to cart</button>
				</div>
			</form>

		</div>
		<!-- item end -->
		<!-- item start -->
		<div class="item">
			<img src="./assests/img/items/capuchino.png">
			<form>
				<div class="item-body">
					<input type="text" name="" value="3" style="display='none';">
					<div class="item-name">Capuchino</div>
					<div class="item-price">$9</div>
					<div class="item-size radio-box">
						<label>
							<input type="radio" name="size" value="Large">
							<div>Large</div>
						</label>
						<label>
							<input type="radio" name="size" value="Medium" checked>
							<div>Medium</div>
						</label>
						<label>
							<input type="radio" name="size" value="Small">
							<div>Small</div>
						</label>
					</div>
					<div class="item-ice radio-box">
						<label>
							<input type="radio" name="iced" value="Hot">
							<div>Hot</div>
						</label>
						<label>
							<input type="radio" name="iced" value="0% ice">
							<div>0% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="50% ice" checked>
							<div>50% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="100% ice">
							<div>100% ice</div>
						</label>
					</div>
				</div>
				<div class="btn">
					<button class="buy-now">Buy now</button>
					<button class="add-to-cart">Add to cart</button>
				</div>
			</form>

		</div>
		<!-- item end -->
		<!-- item start -->
		<div class="item">
			<img src="./assests/img/items/capuchino.png">
			<form>
				<div class="item-body">
					<input type="text" name="" value="4" style="display='none';">
					<div class="item-name">Capuchino</div>
					<div class="item-price">$9</div>
					<div class="item-size radio-box">
						<label>
							<input type="radio" name="size" value="Large">
							<div>Large</div>
						</label>
						<label>
							<input type="radio" name="size" value="Medium" checked>
							<div>Medium</div>
						</label>
						<label>
							<input type="radio" name="size" value="Small">
							<div>Small</div>
						</label>
					</div>
					<div class="item-ice radio-box">
						<label>
							<input type="radio" name="iced" value="Hot">
							<div>Hot</div>
						</label>
						<label>
							<input type="radio" name="iced" value="0% ice">
							<div>0% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="50% ice" checked>
							<div>50% ice</div>
						</label>
						<label>
							<input type="radio" name="iced" value="100% ice">
							<div>100% ice</div>
						</label>
					</div>
				</div>
				<div class="btn">
					<button class="buy-now">Buy now</button>
					<button class="add-to-cart">Add to cart</button>
				</div>
			</form>

		</div>
		<!-- item end -->
	</div>
	<!-- items-end -->
	<!-- footer-start -->
	<?php
		require_once('footer.php');
	?>
	<!-- footer-end -->
</div>
</body>
</html>