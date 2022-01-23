<style type="text/css">
	.success {
		color: #20ff20 !important;
	}
	.error-- {
		color: red !important;
	}
</style>

<?php if (isset($_SESSION['flash_msg'])) { ?>
	<div id="flash_msg" class="<?php echo substr($_SESSION['flash_msg'],0,7) ?>">
	<?php echo substr($_SESSION['flash_msg'],8) ?>
	</div>
	<?php 
		unset($_SESSION['flash_msg']); 
	?>
<?php } else { ?>
	<div id="flash_msg" class="error--">​</div>
<?php } ?>