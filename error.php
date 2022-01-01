<style type="text/css">
	#error {
		color: red;
	}
</style>

<div id="error">
	<?php if (isset($_SESSION['error'])) {
		echo $_SESSION['error'];
		unset($_SESSION['error']);
	}
	?>
</div>