function check_blank() {
	let name = document.getElementById('name').value;
	let phone = document.getElementById('phone').value;
	let address = document.getElementById('address').value;
	let reciever_1 = document.getElementById('reciever_1').checked;
	// console.log(!(name && phone && address));
	// return false;
	if (!(name && phone && address) && reciever_1 ) {
		document.getElementById('flash_msg').innerHTML = 'bạn cần điền đủ thông tin!';
		return false;
	}
	// document.getElementById('span_regex_blank').innerHTML = '';
	return true;
}