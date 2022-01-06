<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="../assests/css/login.css">
</head>
<body>
<?php session_start(); ?>
<?php include('back.php') ?>
<div id="temp" style="position: fixed; color:red; font-size: 50px;">
	tk: <a href="../../data/username.php" style="color:yellow;text-decoration:none;">username.php</a>
	<br>
	mk: Default1
</div>
<form method="post" action="../backend/progress_login.php">
	<h1>Login</h1>
	<table>
		<tr>
			<td>Username</td>
		</tr>
		<tr>
			<td>
				<input type="text" name="username">
			</td>
		</tr>
		<tr>
			<td>Password</td>
		</tr>
		<tr>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php include('flash_msg.php'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="">
			</td>
		</tr>
	</table>
</form>
</body>
</html>