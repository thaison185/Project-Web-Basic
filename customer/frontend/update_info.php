<?php require_once('../backend/check_login.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update info</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/update_info.css">

	<script src="../assets/js/validate_update_info.js" type="text/javascript"></script>
</head>

<body>
	<?php include('header.php'); ?>
	<?php include('back.php'); ?>
	<?php
	$id = $_SESSION['id'];
	require_once('../../connect.php');

	$sql = "select * from customers
where id = '$id'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
	?>
	<div id="form_change_avatar">
		<div class="cover" onclick="document.querySelector('#form_change_avatar').style.display = 'none';"></div>
		<form method="post" action="../backend/progress_update_avatar.php" enctype="multipart/form-data">
			<h1>Select image to change avatar</h1><br>
			<input type="file" name="avatar">
			<input type="submit" name="">
		</form>
	</div>
	<div id="avatar">
		<button onclick="document.querySelector('#form_change_avatar').style.display = 'flex';"><i class="ti-camera"></i></button>
		<img src="<?php if ($each['avatar']) {
						echo $each['avatar'];
					} else echo "../../data/img/avatar/default.jpg" ?>">
	</div>
	<form id="update_info" method="post" action="../backend/progress_update_info.php">
		<h1>Update info</h1>
		<input type="text" name="id" value="<?php echo $each['id'] ?>" style='display: none;'>
		<table>
			<tr>
				<td>Username</td>
				<td>
					<input type="text" id="username" name="username" value="<?php echo $each['username'] ?>" disabled>
					<span id="span_regex_username" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>
					<input type="text" id="name" name="name" value="<?php echo $each['name'] ?>">
					<span id="span_regex_name" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<label>
						<input type="radio" name="gender" value="0" <?php if ($each['gender'] == 0) {
																		echo ' checked';
																	} ?>>
						Male
					</label>
					<label>
						<input type="radio" name="gender" value="1" <?php if ($each['gender'] == 1) {
																		echo ' checked';
																	} ?>>
						Female
					</label>
					<label>
						<input type="radio" name="gender" value="2" <?php if ($each['gender'] == 2) {
																		echo ' checked';
																	} ?>>
						Orther
					</label>
					<span id="span_regex_gender" class="error"></span>
				</td>
			</tr>
			<!-- <tr>
			<td>Avatar</td>
			<td>
				Keep old avatar
				<img class="old_avatar" src="<?php if ($each['avatar']) {
													echo $each['avatar'];
												} else echo "../../data/img/avatar/default.jpg" ?>">
				or
				<input type="file" id="avatar" name="avatar">
				<span id="span_regex_avatar" class="error"></span>
			</td>
		</tr> -->
			<tr>
				<td>Email</td>
				<td>
					<input type="email" id="email" name="email" value="<?php echo $each['email'] ?>">
					<span id="span_regex_email" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>
					<input type="text" id="phone" name="phone" value="<?php echo $each['phone'] ?>">
					<span id="span_regex_phone" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>DOB</td>
				<td>
					<input type="date" id="DOB" name="DOB" value="<?php echo $each['DOB'] ?>">
					<span id="span_regex_DOB" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>Address</td>
				<td>
					<input type="text" id="address" name="address" value="<?php echo $each['address'] ?>">
					<span id="span_regex_address" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>New password</td>
				<td>
					<input type="password" id="new_password" name="new_password" placeholder="Optional">
					<span id="span_regex_new_password" class="error"></span>
				</td>
			</tr>
			<tr>
				<td>Old password</td>
				<td>
					<input type="password" id="old_password" name="old_password" placeholder="Required">
					<span id="span_regex_old_password" class="error"></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php include('flash_msg.php'); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" onclick="return check_regex()" name="">
				</td>
			</tr>
		</table>
	</form>
</body>

</html>