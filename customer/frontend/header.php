<link rel="stylesheet" type="text/css" href="../assests/css/header.css">
<link rel="stylesheet" type="text/css" href="../assests/font/themify-icons/themify-icons.css">

<div id="header">
	<a href="index.php" id="logo">
		<img src="../../data/img/logo.png">
	</a>
	<div class="nav">
	<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') { ?>
		<button href="#" onclick="document.getElementById('items').scrollIntoView();">Menu</button>
		<button href="#" onclick="document.getElementById('footer').scrollIntoView();">Store</button>
		<button href="#" onclick="document.getElementById('footer').scrollIntoView();">About us</button>
	<?php } else { ?>
		<div><?php echo ucfirst(str_replace('.php','',str_replace('_',' ',basename($_SERVER['PHP_SELF'])))) ?></div>
	<?php } ?>
	</div>
	<div class="login-register">
		<?php if (isset($_SESSION['id'])) {?>
			<div class="avatar">
				<img src="<?php if ($_SESSION['avatar']) { echo $_SESSION['avatar'];} else { echo "../../data/img/avatar/default.jpg";}?>">
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
		<a href="login.php">login</a>/<a href="register.php">register</a>
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
			if ($quantity > 9)
				$quantity = '9+';
			?>
			<i class="ti-shopping-cart-full cart-icon"></i>
			<span class="cart-quantity"><?php echo $quantity ?></span>
		<?php } else { ?>
			<i class="ti-shopping-cart cart-icon"></i>
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