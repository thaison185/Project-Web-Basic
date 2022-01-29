<link rel="stylesheet" type="text/css" href="../assets/css/items.css">
<script src="../assets/js/functional_items_btn.js" type="text/javascript"></script>
<div id="items">
	<?php 

	$page = 1;
	if(isset($_GET['page'])) {
		if($_GET['page']) {
			$page = $_GET['page'];
		}
	}

	$search = '';
	if(isset($_GET['search'])) {
		$search = $_GET['search'];
	}

	$category = '';
	if(isset($_GET['category'])) {
		$category = $_GET['category'];
	}

	$sql = "select count(*) from items
	where name like '%$search%' and ( category = '$category' or '$category' = '' )";
	// echo $sql;
	$result = mysqli_query($connect,$sql);
	$n_items = mysqli_fetch_array($result)['count(*)'];
	// echo $sql;

	$items_per_page = 6;
	$n_pages = ceil($n_items / $items_per_page);

	$offset = ($page - 1)*$items_per_page;
	$sql = "select * from items 
	where name like '%$search%' and ( category = '$category' or '$category' = '' )
	limit $items_per_page offset $offset";
	// echo $sql;
	$result = mysqli_query($connect,$sql);
	// echo json_encode($result[0]);
	?>

	<?php if ($n_items == 0) { ?>
		<h1>Không tìm thấy bất kì sản phẩm nào!</h1>	
	<?php } ?>

	<?php forEach($result as $each) { ?>
		<!-- item start -->
		<a id="item-<?php echo $each['id'] ?>" href="item_details.php?id=<?php echo $each['id'] ?>" class="item">
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
						<input type="radio" name="size-<?php echo $each['id'] ?>" value="S"<?php if($each['s_price'] == 0) echo ' disabled'?>>
						<div>Small</div>
					</label>
					<label>
						<input type="radio" name="size-<?php echo $each['id'] ?>" value="M" checked<?php if($each['m_price'] == 0) echo ' disabled'?>>
						<div>Medium</div>
					</label>
					<label>
						<input type="radio" name="size-<?php echo $each['id'] ?>" value="L"<?php if($each['l_price'] == 0) echo ' disabled'?>>
						<div>Large</div>
					</label>
				</div>
				<?php if($each['ice'] == 1) { ?>
					<div class="item-ice radio-box">
						<label>
							<input type="radio" name="ice-<?php echo $each['id'] ?>" value="hot">
							<div>Hot</div>
						</label>
						<label>
							<input type="radio" name="ice-<?php echo $each['id'] ?>" value="0% ice">
							<div>0% ice</div>
						</label>
						<label>
							<input type="radio" name="ice-<?php echo $each['id'] ?>" value="50% ice" checked>
							<div>50% ice</div>
						</label>
						<label>
							<input type="radio" name="ice-<?php echo $each['id'] ?>" value="100% ice">
							<div>100% ice</div>
						</label>
					</div>
				<?php } ?>
				<?php if($each['sugar'] == 1) { ?>
					<div class="item-sugar radio-box">
						<label>
							<input type="radio" name="sugar-<?php echo $each['id'] ?>" value="0% sugar">
							<div>0% sugar</div>
						</label>
						<label>
							<input type="radio" name="sugar-<?php echo $each['id'] ?>" value="50% sugar" checked>
							<div>50% sugar</div>
						</label>
						<label>
							<input type="radio" name="sugar-<?php echo $each['id'] ?>" value="100% sugar">
							<div>100% sugar</div>
						</label>
					</div>
				<?php } ?>
			</div>
			<div class="btn">
				<label>Add to cart
					<button class="btn_add_to_cart" name="action" data-id="<?php echo$each['id'] ?>" data-type="add_to_cart"></button>
				</label>
			</div>
		</a>
		<!-- item end -->
	<?php } ?>
</div>