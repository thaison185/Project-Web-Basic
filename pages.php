<style type="text/css">
	#pages {
		width: 1000px;
		display: block;
		padding: 0 50px 10px;
		margin: 20px;
		margin-right: auto;
		margin-left: auto;
	}

	#pages a {
		color: black;
		font-weight: bold;
		text-decoration: none;
		padding-right: 10px;
	}
</style>

<div id="pages">
<?php for ($i=1; $i <= $n_pages; $i++) { ?>
	<a href="<?php echo basename($_SERVER['PHP_SELF']); ?>?page=<?php echo $i ?>"><?php echo $i ?></a>
<?php } ?>
</div>