<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>
</head>
<body>
<h1>Orders</h1>
<?php include('back.php') ?>
<?php
session_start();

$customer_id = $_SESSION['id'];

require_once('connect.php');

$sql = "select * from orders 
where customer_id = '$customer_id'";
$result = mysqli_query($connect,$sql);
// $each = mysqli_fetch_array($result);

 ?>
<table border="1px" width="100%">
	<tr>
		<td><h3>Id</h3></td>
		<td><h3>Date</h3></td>
		<td><h3>Description</h3></td>
		<td><h3>Total</h3></td>
		<td><h3>Status</h3></td>
	</tr>
	<?php foreach ($result as $each) { ?>
		<tr>
			<td><?php echo $each['id'] ?></td>
			<td><?php echo $each['date'] ?></td>
			<td><?php echo nl2br($each['description']) ?></td>
			<td>$<?php echo $each['price'] ?></td>
			<td><?php echo $each['status'] ?></td>
		</tr>
	<?php } ?>
</table>
</body>
</html>