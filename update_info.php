<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update info</title>

	<link rel="stylesheet" type="text/css" href="./assests/css/register_style.css">

	<script src="check_regex.js" type="text/javascript"></script>
</head>
<body>
<?php 
session_start();
$id = $_SESSION['id'];
require_once('connect.php');

$sql = "select * from customers
where id = '$id'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

 ?>
<form method="post" action="progress_update_info.php">
	<input type="text" name="id" value="<?php echo $each['id'] ?>" style='display: none;'>
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" id="username" name="username" value="<?php echo $each['username'] ?>">
				<span id="span_regex_username"></span>
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" id="name" name="name" value="<?php echo $each['name'] ?>">
				<span id="span_regex_name"></span>
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" name="gender" value="0"<?php if($each['gender'] == 0 ){ echo ' checked';} ?>>
				Male
				<input type="radio" name="gender" value="1"<?php if($each['gender'] == 1 ){ echo ' checked';} ?>>
				Female
				<input type="radio" name="gender" value="2"<?php if($each['gender'] == 2 ){ echo ' checked';} ?>>
				Orther
				<span id="span_regex_gender"></span>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="email" id="email" name="email" value="<?php echo $each['email'] ?>">
				<span id="span_regex_email"></span>
			</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>
				<input type="text" id="phone" name="phone" value="<?php echo $each['phone'] ?>">
				<span id="span_regex_phone"></span>
			</td>
		</tr>
		<tr>
			<td>DOB</td>
			<td>
				<input type="date" id="DOB" name="DOB" value="<?php echo $each['DOB'] ?>">
				<span id="span_regex_DOB"></span>
			</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>
				<input type="text" id="address" name="address" value="<?php echo $each['address'] ?>">
				<span id="span_regex_address"></span>
			</td>
		</tr>
		<tr>
			<td>New password</td>
			<td>
				<input type="password" id="password" name="new_password">
				<span id="span_regex_password"></span>
			</td>
		</tr>
		<tr>
			<td>Old password</td>
			<td>
				<input type="password" id="password" name="old_password">
				<span id="span_regex_password"></span>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" onclick="return check_regex()" name="">
			</td>
		</tr>
	</table>
</form>
</body>
</html>