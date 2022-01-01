<?php include('check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link rel="stylesheet" type="text/css" href="./assests/css/order_details.css">
</head>
<body>
	<?php include('header.php'); ?>
	<?php include('back.php'); ?>
	<?php 
	if (isset($_GET['id'])) {
		$order_id = $_GET['id'];
	} else {
		header('location:index.php');
		exit;
	}
	 ?>
	<h1>Order #<?php echo $order_id ?></h1>
</body>
</html>