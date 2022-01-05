<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Starwar coffee</title>
	<!-- logo -->
	<link rel="icon" type="text/css" href="https://cdn-icons-png.flaticon.com/512/184/184483.png">
	<!-- ggfont preconnect -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../assests/css/index.css">
	<!-- script -->
	<script src="../assests/js/auto_slider.js" type="text/javascript"></script>
</head>
<body>
<div id="main">
	<?php include('header.php'); ?>
	<!-- slider-start -->
	<div id="slider">

		<input type="radio" id="radio-btn-1" name="slider" checked>
		<input type="radio" id="radio-btn-2" name="slider">
		<input type="radio" id="radio-btn-3" name="slider">

		<div class="slides">
			<div class="slide">
				<img src="../../data/img/slides/slide1.jpg">
			</div>
			<div class="slide">
				<img src="../../data/img/slides/slide2.jpg">
			</div>
			<div class="slide">
				<img src="../../data/img/slides/slide3.jpg">
			</div>
		</div>

		<div class="radio-box">
			<label for='radio-btn-1' class='radio-btn radio-btn-1'></label>
			<label for='radio-btn-2' class='radio-btn radio-btn-2'></label>
			<label for='radio-btn-3' class='radio-btn radio-btn-3'></label>
		</div>
	</div>
	<!-- slider-end -->
	<?php include('error.php'); ?>
	<!-- items-start -->
	<div id="items">
		<?php 
		include('../../connect.php');

		$page = 1;
		if(isset($_GET['page'])) {
			if($_GET['page']) {
				$page = $_GET['page'];
			}
		}

		$search = '';
		if(isset($_GET['search'])) {
			if($_GET['search']) {
				$search = $_GET['search'];
			}
		}

		$sql = "select count(*) from items
		where name like '%$search%'";
		// echo $sql;
		$result = mysqli_query($connect,$sql);
		$n_items = mysqli_fetch_array($result)['count(*)'];

		$items_per_page = 6;
		$n_pages = ceil($n_items / $items_per_page);

		$offset = ($page - 1)*$items_per_page;
		$sql = "select * from items 
		where name like '%$search%'
		limit $items_per_page offset $offset";
		// echo $sql;
		$result = mysqli_query($connect,$sql);
		// echo json_encode($result[0]);
		?>

		<?php forEach($result as $each) { ?>
			<!-- item start -->
			<a href="item_details.php?id=<?php echo$each['id'] ?>" class="item">
				<form method="get" action="../backend/progress_update_cart.php">
					<input type="text" name="id" value="<?php echo $each['id'] ?>" style="display: none;">
					<div class="img" style="background: url(../../<?php echo $each['image'];  ?>);
    background-size: cover; background-position: center center;"></div>
					<div class="item-body">
						<div class="item-name"><?php echo $each['name'] ?></div>
						<div class="item-price">
							<span class="price-s"><?php if ($each['s_price'] != 0) echo '$' . $each['s_price'] ?></span>
							<span class="price-m"><?php if ($each['m_price'] != 0) echo '$' . $each['m_price'] ?></span>
							<span class="price-l"><?php if ($each['l_price'] != 0) echo '$' . $each['l_price'] ?></span>
						</div>
						<div class="item-size radio-box">
							<label>
								<input type="radio" class="price-s" name="size" value="S"<?php if($each['s_price'] == 0) echo ' disabled'?>>
								<div>Small</div>
							</label>
							<label>
								<input type="radio" class="price-m" name="size" value="M" checked<?php if($each['m_price'] == 0) echo ' disabled'?>>
								<div>Medium</div>
							</label>
							<label>
								<input type="radio" class="price-l" name="size" value="L"<?php if($each['l_price'] == 0) echo ' disabled'?>>
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
			</a>
			<!-- item end -->
		<?php } ?>
	</div>
	<!-- items end -->
	<!-- pages start -->
	<?php include('pages.php') ?>
	<!-- pages end -->
	<!-- footer-start -->
	<?php
		include('footer.php');
	?>
	<!-- footer-end -->

	<?php mysqli_close($connect) ?>
</div>
</body>
</html>