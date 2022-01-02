function check_regex() {
	let regex_check = true;
	let regex;
	
	//regex username
	let username = document.getElementById('username').value;
	regex = /^(?=.*[a-zA-Z])[\w._]{8,20}$/;
	if(!regex.test(username))
	{
		document.getElementById('span_regex_username').innerHTML = "Username không hợp lệ! (dài từ 8-20 ký tự, chứa các kí tự a-z,A-Z,0-9,dấu .,dấu _ )";
		regex_check = false;
	} else {
		document.getElementById('span_regex_username').innerHTML = '';
	}

	//regex name
	let name = document.getElementById('name').value;
	regex = /^[AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]+(\ [AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ][aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz]*)+$/;
	if(!regex.test(name))
	{
		document.getElementById('span_regex_name').innerHTML = "Tên không hợp lệ! (Tên không chứa các ký tự đặc biệt )";
		regex_check = false;
	} else {
		document.getElementById('span_regex_name').innerHTML = '';
	}
	
	//regex genger
	let gender_array = document.getElementsByName('gender');
	if(!(gender_array[0].checked || gender_array[1].checked || gender_array[2].checked))
	{
		document.getElementById('span_regex_gender').innerHTML = "Giới tính không được để trống!";
		regex_check = false;
	} else {
		document.getElementById('span_regex_gender').innerHTML = '';
	}

	//regex email
	let email = document.getElementById('email').value;
	regex = /^\w+@\w+(\.\w+)+$/;
	if(!regex.test(email))
	{
		document.getElementById('span_regex_email').innerHTML = "Mail không hợp lệ!";
		regex_check = false;
	} else {
		document.getElementById('span_regex_email').innerHTML = '';
	}
	
	//regex phone
	let phone = document.getElementById('phone').value;
	regex = /^[\+\-0-9]{9,15}$/;
	if(!regex.test(phone))
	{
		document.getElementById('span_regex_phone').innerHTML = "Số điện thoại không hợp lệ!";
		regex_check = false;
	} else {
		document.getElementById('span_regex_phone').innerHTML = '';
	}
	
	//regex DOB
	let DOB = document.getElementById('DOB').value;
	if(!DOB)
	{
		document.getElementById('span_regex_DOB').innerHTML = "Ngày sinh không được để trống!";
		regex_check = false;
	} else {
		document.getElementById('span_regex_DOB').innerHTML = '';
	}
	
	//regex address
	let address = document.getElementById('address').value;
	regex = /^(?!.*[\"\<\>]).{10,}$/;
	if(!regex.test(address))
	{
		document.getElementById('span_regex_address').innerHTML = "Địa chỉ không được để trống!";
		regex_check = false;
	} else {
		document.getElementById('span_regex_address').innerHTML = '';
	}
	
	
	//regex password
	let password = document.getElementById('password').value;
	regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	if(!regex.test(password))
	{
		document.getElementById('span_regex_password').innerHTML = "Mật khẩu không hợp lệ! (mật khẩu phải chứa ít nhất 8 ký tự, ít nhất 1 chữ cái thường, 1 chữ cái in hoa và 1 số)";
		regex_check = false;
	} else {
		document.getElementById('span_regex_password').innerHTML = '';
	}

	if(regex_check)
		return true;
	else
		return false;
}