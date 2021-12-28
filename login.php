<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="./assests/css/login_style.css">
</head>
<body>
<?php session_start(); ?>
<?php include('back.php') ?>
<form method="post" action="progress_login.php">
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
			<td>
				<div id="error">
					<?php if (isset($_SESSION['error'])) {
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					}
					?>
				</div>
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