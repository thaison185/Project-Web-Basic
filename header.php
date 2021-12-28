<div id="header">
	<a href="index.php" id="logo">
		<img src="./assests/img/logo/logo.png">
	</a>
	<div class="nav">
		<button href="#" onclick="document.getElementById('items').scrollIntoView();">Menu</button>
		<button href="#" onclick="document.getElementById('footer').scrollIntoView();">Store</button>
		<button href="#" onclick="document.getElementById('footer').scrollIntoView();">About us</button>
	</div>
	<div class="login-register">
		<?php if (isset($_SESSION['id'])) {?>
			Xin chào <?php echo $_SESSION['name'] ?>!
			<div class="sub-menu">
				<a href="update_info.php">Update info</a>
				<a href="orders_log.php">Orders</a>
				<a href="logout.php">Đăng xuất!</a>
			</div>
		<?php } else { ?>
		<a href="login.php">login</a>/<a href="register.php">register</a>
		<?php }; ?>
	</div>
	<div class="cart">
		<a href="cart.php">
			<i class="ti-shopping-cart cart-icon"></i>
		</a>
	</div>
	<div class="search">
		<form>
				<label>
					<input type="search" name="search" value="">
					<i  class="ti-search search-icon"></i>
				</label>
			</form>
	</div>
</div>