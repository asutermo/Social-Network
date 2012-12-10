//validate each field
function validate_signup(form) {
	var msg = "";
	if (form.user.value == "" || form.user.value == undefined) {
		msg += "Username does not work. <br />";
	}
	if (form.first.value == "" || form.first.value == undefined) {
		msg += "Enter your first name. <br />";
	}
	if (form.last.value == "" || form.last.value == undefined) {
		msg += "Enter your last name. <br />";
	}

	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var address = form.email.value;
	if(reg.test(address) == false) {
		msg += "You must provide a valid email address. <br />";
	}

	if ((form.password.value == "" 
		|| form.password.value == undefined) 
		|| (form.password.value != form.rpassword.value)) {
		msg += "Password and password confirmation do not match. <br />";
	}

	if (form.age.value == "" 
		|| form.age.value == undefined
		|| form.age < 13 
		|| form.age > 150) {
		msg += "Enter a valid age. <br />";
	}

	if (msg != "") {
		document.getElementById("error").innerHTML=msg+"<br />";
		return false;
	} 
	else {
		return true;
	}
}

//validate each field
function validate_edit(form) {
	var msg = "";
	if (form.user.value == "" || form.user.value == undefined) {
		msg += "Username does not work. <br />";
	}
	if (form.first.value == "" || form.first.value == undefined) {
		msg += "Enter your first name. <br />";
	}
	if (form.last.value == "" || form.last.value == undefined) {
		msg += "Enter your last name. <br />";
	}

	if (form.age.value == "" 
		|| form.age.value == undefined
		|| form.age < 13 
		|| form.age > 150) {
		msg += "Enter a valid age. <br />";
	}

	if (msg != "") {
		document.getElementById("error").innerHTML=msg+"<br />";
		return false;
	} 
	else {
		return true;
	}
}