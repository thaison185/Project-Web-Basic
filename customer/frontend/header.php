<link rel="stylesheet" type="text/css" href="../assets/css/header.css">
<link rel="stylesheet" type="text/css" href="../assets/font/themify-icons/themify-icons.css">

<div id="header">
	<a href="index.php" id="logo">
		<img src="../../data/img/Logo_mini2_dark_edit.png">
		<div class="shop_name">'s coffee</div>
	</a>
	<div class="nav">
	<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
		<div class="category">Catogery <i class="ti-angle-down"></i>
			<div class="sub-menu">
				<?php 
				$sql = "SELECT DISTINCT category FROM items";
				// echo $sql;
				$result = mysqli_query($connect,$sql);
				foreach ($result as $each) { ?>
					<a href="index.php?category=<?php echo $each['category'] ?>"><?php echo $each['category']; ?></a>
				<?php } ?>
			</div>
		</div>
	<?php } else { ?>
		<div><?php echo ucfirst(str_replace('.php','',str_replace('_',' ',basename($_SERVER['PHP_SELF'])))) ?></div>
	<?php } ?>
	</div>
	<div class="login-register">
		<?php if (isset($_SESSION['id'])) {?>
			<div class="avatar">
				<img src="<?php if ($_SESSION['avatar']) { echo $_SESSION['avatar'];} else { echo "../../data/img/customers/default.jpg";}?>">
			</div>
			<span class="name">
				<?php echo $_SESSION['name'] ?>
			</span>
			<div class="sub-menu">
				<a href="update_info.php">Update info</a>
				<a href="orders_log.php">Orders</a>
				<a href="../backend/logout.php">Đăng xuất!</a>
			</div>
		<?php } else { ?>
		<a class="login-btn" href="login.php">login</a>
		<a class="register-btn" href="register.php">register</a>
		<?php }; ?>
	</div>
	<div class="cart">
		<a href="cart.php">
		<?php 
		if (isset($_COOKIE['cart'])) {
			$cart = json_decode($_COOKIE['cart']);
		} else {
			$cart = [];
		}
		if (count($cart) > 0) { 
			$quantity = 0;
			foreach ($cart as $each) {
				$quantity += $each->{'quantity'};
			}
			?>
			<i class="ti-shopping-cart-full cart-icon"></i>
			<span class="cart-quantity" value="<?php echo $quantity ?>"><?php echo $quantity > 9 ? "9+" : $quantity ?></span>
		<?php } else { ?>
			<i class="ti-shopping-cart cart-icon"></i>
			<span class="cart-quantity" value="0" style="display: none;"></span>
		<?php } ?>
		</a>
	</div>
	<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
	<div class="search">
		<form>
			<label>
				<input type="search" name="search" value="">
				<i  class="ti-search search-icon"></i>
			</label>
		</form>
	</div>
	<?php } ?>
</div>