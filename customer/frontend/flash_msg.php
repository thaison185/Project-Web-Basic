<style type="text/css">
	.success {
		color: #20ff20;
	}
	.error {
		color: red;
	}
</style>

<?php if (isset($_SESSION['flash_msg'])) { ?>
	<div id="flash_msg" class="<?php echo $_SESSION['flash_msg_type']; ?>">
	<?php echo $_SESSION['flash_msg']; ?>
	</div>
	<?php 
		unset($_SESSION['flash_msg_type']);
		unset($_SESSION['flash_msg']); 
	?>
<?php } else { ?>
	<div id="flash_msg" style="color: white !important;">---</div>
<?php } ?>