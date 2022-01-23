<?php require_once('../backend/check_login.php'); ?>
<?php include('../../connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Q's coffee</title>
	<!-- logo -->
	<link rel="icon" type="text/css" href="https://cdn-icons-png.flaticon.com/512/184/184483.png">
	<!-- ggfont preconnect -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="../assets/css/index.css">
	<!-- script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="../assets/js/update_display.js" type="text/javascript"></script>
</head>
<body>
<div id="main">
	<?php include('header.php'); ?>

	<?php include('slider.php') ?>
	<?php include('flash_msg.php'); ?>
	<?php include('items.php') ?>
	<?php include('pages.php') ?>

	<?php include('footer.php'); ?>

	<?php mysqli_close($connect) ?>
</div>
</body>
</html>