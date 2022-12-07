let albergue = new Albergue();

ocultarTodosLosFormularios();

// Gestión de formularios
function gestionFormularios(sFormularioVisible) {
	ocultarTodosLosFormularios();

	// Hacemos visible el formulario que llega como parámetro
	switch (sFormularioVisible) {
		case "frmAltaMascota":
			frmAltaMascota.style.display = "block";
			break;
		case "frmAltaColaborador":
			frmAltaColaborador.style.display = "block";
			break;
		case "frmMovimientoMascota":
			frmMovimientoMascota.style.display = "block";
			break;
	}
}

function ocultarTodosLosFormularios() {
	let oFormularios = document.querySelectorAll("form");

	for (let i = 0; i < oFormularios.length; i++) {
		oFormularios[i].style.display = "none";
	}
}

function mostrarListadoColaboradores() {
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado Colaboradores</h1>");
	oVentana.document.write(albergue.listadoColaboradores());
	oVentana.document.close();
	oVentana.document.title = "Listado colaboradores";
}

function aceptarAltaColaborador() {
	let sDNI = frmAltaColaborador.txtDNI.value.trim();
	let sNombre = frmAltaColaborador.txtNombre.value.trim();
	let sApellidos = frmAltaColaborador.txtApellidos.value.trim();
	let oColaborador = new Colaborador(sDNI, sNombre, sApellidos);
	if (sDNI.length == 0 || sNombre.length == 0 || sApellidos.length == 0) {
		alert("Faltan datos por rellenar");
	} else {
		alert(albergue.altaColaborador(oColaborador));
		frmAltaColaborador.reset();
		frmAltaColaborador.style.display = "none";
	}
}
