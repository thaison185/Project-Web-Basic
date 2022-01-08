function check_blank() {
	let username = document.getElementById('username').value;
	let password = document.getElementById('password').value;
	// console.log(!(username && password));
	// return false;
	if (!(username && password)) {
		document.getElementById('flash_msg').innerHTML = 'bạn cần điền đủ thông tin!';
		return false;
	}
	// document.getElementById('span_regex_blank').innerHTML = '';
	return true;
}