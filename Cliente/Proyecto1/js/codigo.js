let cliente = new Agencia();

ocultarTodosLosFormularios();

// Gestión de formularios
function gestionFormularios(sFormularioVisible) {
	ocultarTodosLosFormularios();

	// Hacemos visible el formulario que llega como parámetro
	switch (sFormularioVisible) {
		case "frmAltaCliente":
			frmAltaCliente.style.display = "block";
			break;
		case "frmAltaAlojamiento":
			frmAltaAlojamiento.style.display = "block";
			break;
		case "frmAltaReserva":
			frmAltaReserva.style.display = "block";
			break;
	}
}

function ocultarTodosLosFormularios() {
	let oFormularios = document.querySelectorAll("form");

	for (let i = 0; i < oFormularios.length; i++) {
		oFormularios[i].style.display = "none";
	}
}

function mostrarListadoClientes() {
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado Clientes</h1>");
	oVentana.document.write(cliente.listadoClientes());
	oVentana.document.close();
	oVentana.document.title = "Listado colaboradores";
}

function aceptarAltaCliente() {
	let sDNI = frmAltaCliente.txtDNI.value.trim();
	let sNombre = frmAltaCliente.txtNombre.value.trim();
	let sApellidos = frmAltaCliente.txtApellidos.value.trim();
	let sUsuario = sApellidos.slice(0, 3) + sApellidos.slice(sApellidos.indexOf(" ") + 1).slice(0, 3) + sDNI.slice(-4, -1);
	let oCliente = new Cliente(sDNI, sNombre, sApellidos, sUsuario);
	if (sDNI.length == 0 || sNombre.length == 0 || sApellidos.length == 0) {
		alert("Faltan datos por rellenar");
	} else {
		alert(cliente.AltaCliente(oCliente));
		frmAltaCliente.reset();
		frmAltaCliente.style.display = "none";
	}
}
