function check_blank() {
	let username = document.getElementById('username').value;
	let password = document.getElementById('password').value;
	// console.log(!(username && password));
	// return false;
	if (!(username && password)) {
		document.getElementById('flash_msg').html = 'Require login information!';
		return false;
	}
	return true;
}