function validarFormulario() {
	//obtener los valores de los campos
	let apellidos = formulario.apellidos;
	let nombre = formulario.nombre;
	let fechaNacimiento = formulario.fechaNacimiento;
	let dni = formulario.dni;
	let email = formulario.email;
	let usuario = formulario.usuario;
	let telefono = formulario.telefono;
	let twitter = formulario.twitter;

	//validar apellidos
	let expresionApellidos = /^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)*$/;
	if (!expresionApellidos.test(apellidos) || apellidos == "") {
		alert("Los apellidos no son válidos o no se han introducido");
		return false;
	}

	//validar nombre
	let expresionNombre = /^[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+(\s[A-ZÁÉÍÓÚÑ][a-záéíóúñ]+)*$/;
	if (!expresionNombre.test(nombre) || nombre == "") {
		alert("El nombre no es válido o no se ha introducido");
		return false;
	}

	//validar fecha de nacimiento
	let expresionFechaNacimiento = /^\d{2}\/\d{2}\/\d{4}$/;
	if (!expresionFechaNacimiento.test(fechaNacimiento) || fechaNacimiento == "") {
		alert("La fecha de nacimiento no es válida o no se ha introducido");
		return false;
	}

	//validar DNI
	let expresionDni = /^\d{8}[A-Z]$/;
	if (!expresionDni.test(dni) || dni == "") {
		alert("El DNI no es válido o no se ha introducido");
		return false;
	}

	//validar correo electrónico
	let expresionEmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$/;
	if (!expresionEmail.test(email) || email == "") {
		alert("El correo electrónico no es válido o no se ha introducido");
		return false;
	}

	//validar usuario
	let expresionUsuario = /^[a-z]{7}\d{3}$/;
	if (!expresionUsuario.test(usuario) || usuario == "") {
		alert("El usuario no es válido o no se ha introducido");
		return false;
	}

	//validar teléfono
	let expresionTelefono = /^[6-9]\d{8}$/;
	if (!expresionTelefono.test(telefono) || telefono == "") {
		alert("El teléfono no es válido o no se ha introducido");
		return false;
	}

	//validar usuario de Twitter
	let expresionTwitter = /^@[a-z0-9]{4,15}$/;
	if (!expresionTwitter.test(twitter) || twitter == "") {
		alert("El usuario de Twitter no es válido o no se ha introducido");
		return false;
	}

	return true;
}

//asignar la función al evento submit del formulario
document.formulario.onsubmit = validarFormulario;

// https://developer.mozilla.org/es/docs/Web/JavaScript/Guide/Regular_Expressions
