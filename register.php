<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>

	<link rel="stylesheet" type="text/css" href="./assests/css/register_style.css">

	<script src="check_regex.js" type="text/javascript"></script>
</head>
<body>
<?php include('back.php') ?>
<form method="post" action="progress_register.php">
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" id="username" name="username" >
				<span id="span_regex_username"></span>
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" id="name" name="name">
				<span id="span_regex_name"></span>
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" name="gender" value="0">
				Male
				<input type="radio" name="gender" value="1">
				Female
				<input type="radio" name="gender" value="2">
				Orther
				<span id="span_regex_gender"></span>
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="email" id="email" name="email">
				<span id="span_regex_email"></span>
			</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>
				<input type="text" id="phone" name="phone">
				<span id="span_regex_phone"></span>
			</td>
		</tr>
		<tr>
			<td>DOB</td>
			<td>
				<input type="date" id="DOB" name="DOB">
				<span id="span_regex_DOB"></span>
			</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>
				<input type="text" id="address" name="address">
				<span id="span_regex_address"></span>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" id="password" name="password">
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