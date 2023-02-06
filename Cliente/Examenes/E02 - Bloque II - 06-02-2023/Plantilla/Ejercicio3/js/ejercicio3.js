formulario.addEventListener("submit", validarFormulario);

function validarFormulario(event) {
	const regExpMarca = /^[A-ZÑÁÉÍÓÚ][a-zñáéíóú]?(s[A-ZÑÁÉÍÓÚ][a-zñáéíóú]*)*/;
	const regExpFechaNac = /\d\d\d\d\/\d\d\/\d\d/;
	const regExpColor = /[A-ZÑÁÉÍÓÚ][a-zñáéíóú]+/;
	const regExpMatriculaCategoria = /^[0-9]{4}[A-Z]{4}$/;
	const regExpMatriculaAntigua = /^[A-Z\-]{2}[0-9\-]{4}[A-Z\-]{2}$/;
	const regExpMatriculaHistorica = /^H[0-9]{4}[A-Z]{3}$/;

	const marca = formulario.marca.value.trim();
	const modelo = formulario.modelo.value.trim();
	const fechaMatriculacion = formulario.fechaMatriculacion.value.trim();
	const TipoMatricula = formulario.tipoMatricula.value.trim();
	const Matricula = formulario.matricula.value.trim();
	const TipoColor = formulario.color.value.trim();

	let errores = [];
	let vacios = [];
	let hayErrores = false;
	let salida = "";

	switch (TipoMatricula) {
		case "actual":
			categoria = 0;
			break;
		case "antigua":
			categoria = 1;
			break;
		case "historica":
			categoria = 2;
			break;
	}

	if (marca.length == 0) {
		vacios.push("Marca");
		hayErrores = true;
	} else if (!regExpMarca.test(marca)) {
		errores.push("Marca");
		hayErrores = true;
	}

	if (modelo.length == 0) {
		vacios.push("Modelo");
		hayErrores = true;
	} else if (!regExpMarca.test(modelo)) {
		errores.push("Modelo");
		hayErrores = true;
	}

	if (TipoColor.length == 0) {
		vacios.push("Tipo de color");
		hayErrores = true;
	} else if (!regExpColor.test(TipoColor)) {
		errores.push("Tipo de color");
		hayErrores = true;
	}

	if (fechaMatriculacion.length == 0) {
		vacios.push("Fecha de Matriculacion");
		hayErrores = true;
	} else if (!regExpFechaNac.test(fechaMatriculacion)) {
		errores.push("Fecha de Matriculacion");
		hayErrores = true;
	}

	if (TipoMatricula == 0) {
		if (Matricula.length == 0) {
			vacios.push("Tipo de matricula");
			hayErrores = true;
		} else if (!regExpMatriculaCategoria.test(Matricula)) {
			errores.push("Tipo de matricula");
			hayErrores = true;
		}
	}

	if (TipoMatricula == 1) {
		if (fechaMatriculacion.length == 0) {
			vacios.push("Tipo de matricula");
			hayErrores = true;
		} else if (!regExpMatriculaAntigua.test(fechaMatriculacion)) {
			errores.push("Tipo de matricula");
			hayErrores = true;
		}
	}

	if (TipoMatricula == 2) {
		if (fechaMatriculacion.length == 0) {
			vacios.push("Tipo de matricula");
			hayErrores = true;
		} else if (!regExpMatriculaHistorica.test(fechaMatriculacion)) {
			errores.push("Tipo de matricula");
			hayErrores = true;
		}
	}

	if (hayErrores) {
		event.preventDefault(); //Para parar el evento submit por defecto
		if (vacios.length > 0) {
			salida += "<h3>CAMPOS VACÍOS:</h3><ul>";
			for (let elem of vacios) {
				salida += "<li>" + elem + "</li>";
			}
			salida += "</ul>";
		}
		if (errores.length > 0) {
			salida += "<h3>CAMPOS CON ERRORES:</h3><ul>";
			for (let elem of errores) {
				salida += "<li>" + elem + "</li>";
			}
			salida += "</ul>";
		}
		document.getElementById("salida").innerHTML = salida;
	}
}
