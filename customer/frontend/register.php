<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/register.css">

	<script src="../assets/js/validate_register.js" type="text/javascript"></script>
</head>
<body>
<?php include('back.php') ?>
<form method="post" action="../backend/progress_register.php" enctype="multipart/form-data">
	<h1>Register</h1>
	<table>
		<tr>
			<td>Username</td>
			<td>
				<input type="text" id="username" name="username" >
				<span id="span_regex_username" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>
				<input type="text" id="name" name="name">
				<span id="span_regex_name" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<label>
					<input type="radio" name="gender" value="0">
					Male
				</label>
				<label>
					<input type="radio" name="gender" value="1">
					Female
				</label>
				<label>
					<input type="radio" name="gender" value="2">
					Orther
				</label>
				<span id="span_regex_gender" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>Avatar</td>
			<td>
				<input type="file" id="avatar" name="avatar">
				<!-- <span id="span_regex_avatar" class="error"></span> -->
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="email" id="email" name="email">
				<span id="span_regex_email" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td>
				<input type="text" id="phone" name="phone">
				<span id="span_regex_phone" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>DOB</td>
			<td>
				<input type="date" id="DOB" name="DOB">
				<span id="span_regex_DOB" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>
				<input type="text" id="address" name="address">
				<span id="span_regex_address" class="error"></span>
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" id="password" name="password">
				<span id="span_regex_password" class="error"></span>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php include('flash_msg.php'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" onclick="return check_regex()" name="" value="Register">
			</td>
		</tr>
	</table>
</form>
</body>
</html>