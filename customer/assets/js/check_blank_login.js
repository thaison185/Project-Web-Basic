function check_blank() {
	let username = document.querySelector('#username').value;
	let password = document.querySelector('#password').value;
	// console.log(!(username && password));
	// return false;
	if (!(username && password)) {
		document.querySelector('#flash_msg').innerHTML = 'Require login information!';
		return false;
	}
	return true;
}