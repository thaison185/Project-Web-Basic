<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
<?php session_start(); ?>
<?php include('back.php') ?>
<form method="post" action="progress_login.php">
	<table>
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
			<td>Username</td>
			<td>
				<input type="text" name="username">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="">
			</td>
		</tr>
	</table>
</form>
</body>
</html>