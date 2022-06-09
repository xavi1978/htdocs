"use strict";
const boton = document.getElementById("buttonRegistro");

boton.addEventListener("click", registrarUsuario);

const inputName = document.getElementById("nameSignup");
const inputEmail = document.getElementById("emailSignup");
const inputPhone = document.getElementById("phoneSignup");
const inputPassword = document.getElementById("passwordSignup");
const inputCaptcha_valor = document.getElementById(
	"g-recaptcha-response"
).value;

grecaptcha.ready(function () {
	// do request for recaptcha token
	// response is promise with passed token
	grecaptcha
		.execute("6LeXj00gAAAAAJ51Xf57GeW34QJW3cggJgzzA7NJ", {
			action: "validate_captcha",
		})
		.then(function (token) {
			// add token value to form
			document.getElementById("g-recaptcha-response").value = token;
			checkRecaptcha();
		});
});

function checkRecaptcha() {
	let inputCaptcha_valor = document.getElementById(
		"g-recaptcha-response"
	).value;
	console.log(inputCaptcha_valor);
	if (inputCaptcha_valor != "") {
		boton.disabled = false;
		return true;
	}
	return false;
}

function registrarUsuario() {
	let inputName_valor = inputName.value;
	let inputEmail_valor = inputEmail.value;
	let inputPhone_valor = inputPhone.value;
	let inputPassword_valor = inputPassword.value;

	let nameBoolean = true;
	let emailBoolean = true;
	let phoneBoolean = true;
	let passwordBoolean = true;

	if (inputName_valor == "" || !isNaN(inputName_valor)) {
		nameBoolean = false;
	}
	if (inputName_valor.length < 2) {
		nameBoolean = false;
	}
	if (inputEmail_valor == "" || !isNaN(inputEmail_valor)) {
		emailBoolean = false;
	}
	if (inputPhone_valor == "" || !isNaN(inputPhone_valor)) {
		phoneBoolean = false;
	}
	if (inputPassword_valor == "" || !isNaN(inputPassword_valor)) {
		passwordBoolean = false;
	}

	$.ajax({
		url: "./registrarse.php",
		type: "POST",
		data: {
			api: "checkEmail",
			email: inputEmail_valor,
		},
		// dataType:"json",
		success: function (response) {
			if (response == 0) {
				console.error(response);
			} else {
				console.log(response);
				if (response == "null") {
					console.error("ERROR");
				} else {
					console.error("OK");
				}
			}
		},
		error: function (error) {
			console.error("ERROR:" + error);
		},
	});
	if (nameBoolean) {
		inputName.classList.remove("inputError");
		inputName.classList.add("inputSuccess");
	} else {
		inputName.classList.remove("inputSuccess");
		inputName.classList.add("inputError");
	}
	if (emailBoolean) {
		inputEmail.classList.remove("inputError");
		inputEmail.classList.add("inputSuccess");
	} else {
		inputEmail.classList.remove("inputSuccess");
		inputEmail.classList.add("inputError");
	}
	if (phoneBoolean) {
		inputPhone.classList.remove("inputError");
		inputPhone.classList.add("inputSuccess");
	} else {
		inputPhone.classList.remove("inputSuccess");
		inputPhone.classList.add("inputError");
	}
	if (passwordBoolean) {
		inputPassword.classList.remove("inputError");
		inputPassword.classList.add("inputSuccess");
	} else {
		inputPassword.classList.remove("inputSuccess");
		inputPassword.classList.add("inputError");
	}

	if (
		nameBoolean &&
		emailBoolean &&
		phoneBoolean &&
		passwordBoolean &&
		checkRecaptcha()
	) {
		// guardar en DB
	}
}
