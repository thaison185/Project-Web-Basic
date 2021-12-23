<div id="header">
	<div id="logo">
		<img src="./assests/img/logo/logo.png">
	</div>
	<div class="nav">
		<a href="#">Menu</a>
		<a href="#">Store</a>
		<a href="#">About us</a>
	</div>
	<div class="login-register">
		<?php if (isset($_SESSION['id'])) {?>
			Xin chào <?php echo $_SESSION['name'] ?>!
			<div class="sub-menu">
				<a href="update_info.php">Update info</a>
				<a href="logout.php">Đăng xuất!</a>
			</div>
		<?php } else { ?>
		<a href="login.php">login</a>/<a href="register.php">register</a>
		<?php }; ?>
	</div>
	<div class="cart">
		<i class="ti-shopping-cart cart-icon"></i>
	</div>
	<div class="search">
		<i class="ti-search search-icon"></i>
	</div>
</div>