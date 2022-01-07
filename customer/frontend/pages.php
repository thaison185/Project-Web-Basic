<style type="text/css">
	#pages {
		width: 1000px;
		display: block;
		padding: 0 0 10px 50px;
		margin: 20px;
		margin-right: auto;
		margin-left: auto;
	}

	#pages a {
		color: black;
		/*font-weight: bold;*/
		text-decoration: none;
		padding-right: 10px;
	}
</style>

<?php 
$query = '';
if (isset($search)) {
	if ($search) {
		$query = $query."&search=$search";
	}
}
if (isset($category)) {
	if ($category) {
		$query = $query."&category=$category";
	}
}
 ?>

<div id="pages">
	<?php if ($page > 5) { ?>
		<a href="<?php echo basename($_SERVER['PHP_SELF']); ?>?page=<?php echo '1' ?><?php echo $query; ?>"><<</a>
		<a href="<?php echo basename($_SERVER['PHP_SELF']); ?>?page=<?php echo $page-1 ?><?php echo $query; ?>"><</a>
	<?php } ?>
<?php for ($i=$page-4; $i <= $page+4; $i++) { 
		if ($i > 0 && $i <= $n_pages) {
	?>
	<a href="<?php echo basename($_SERVER['PHP_SELF']); ?>?page=<?php echo $i ?><?php echo $query; ?>" style="<?php if ($i == $page) echo "font-weight: bold; font-size: 20px" ?>"><?php echo $i ?></a>
<?php } }?>
	<?php if ($page < $n_pages-4) { ?>
		<a href="<?php echo basename($_SERVER['PHP_SELF']); ?>?page=<?php echo $page+1 ?><?php echo $query; ?>">></a>
		<a href="<?php echo basename($_SERVER['PHP_SELF']); ?>?page=<?php echo $n_pages ?><?php echo $query; ?>">>></a>
	<?php } ?>
</div>