let cliente = new Agencia();
console.log(cliente);

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
		case "frmBajaReserva":
			frmBajaReserva.style.display = "block";
			break;
		case "frmListadoUnCliente":
			frmListadoUnCliente.style.display = "block";
			break;
		case "frmEntreDosFechas":
			frmEntreDosFechas.style.display = "block";
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

function mostrarListadoAlojamientos() {
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado de Alojamientos</h1>");
	oVentana.document.write(cliente.ListadoAlojamiento());
	oVentana.document.close();
	oVentana.document.title = "Listado de alojamientos";
}

function mostrarListadoClientesConFiltro() {
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado de un cliente</h1>");
	oVentana.document.write(cliente.listadoFiltroClientes());
	oVentana.document.close();
	oVentana.document.title = "Listado de un cliente";
}

function mostrarListadoEntreDosFechas() {
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado de Entre dos fechas</h1>");
	oVentana.document.write(cliente.listadoEntreDosFechas());
	oVentana.document.close();
	oVentana.document.title = "Listado de un Entre dos fechas";
}

function mostrarListadoHabitacionesDesayuno() {
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado de habitaciones con Desayuno</h1>");
	oVentana.document.write(cliente.ListadoHabitacionesDesayuno());
	oVentana.document.close();
	oVentana.document.title = "Listado de habitaciones con Desayuno";
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

// aceptarAltaAlojamiento
function aceptarAltaAlojamiento() {
	let numPersonas = parseInt(frmAltaAlojamiento.txtnumPersona.value.trim());

	let numDormitorios = parseInt(frmAltaAlojamiento.txtDormitorios.value.trim());

	let sDesayuno = frmAltaAlojamiento.rbtTipoDesayuno.value;
	let bADesayuno = sDesayuno == "Si" ? true : false;

	let sParking = frmAltaAlojamiento.rbtTipoParking.value;
	let bParking = sParking == "Si" ? true : false;
	let oAlojamiento;

	if (isNaN(numPersonas) || isNaN(numDormitorios)) {
		alert("Faltan datos por rellenar");
	} else {
		// Continuo con el alta del alojamiento
		let iCodigo = cliente.siguienteCodigoAlojamiento();
		if (frmAltaAlojamiento.rbtTipoAlojamiento.value == "Habitacion") {
			oAlojamiento = new Habitacion(iCodigo, numPersonas, bADesayuno);
		} else {
			oAlojamiento = new Apartamento(iCodigo, numPersonas, numDormitorios, bParking);
		}

		// Insertar el nuevo alojamiento
		if (cliente.AltaAlojamiento(oAlojamiento)) {
			alert("Alojamiento registrado OK");
			frmAltaAlojamiento.reset(); // Vaciamos los campos del formulario
			frmAltaAlojamiento.style.display = "none";
		} else {
			alert("Alojamiento registrado previamente");
		}
	}
}

function aceptarAltaReserva() {
	let sCliente = frmAltaReserva.txtCliente.value.trim();
	let numAlojamiento = parseInt(frmAltaReserva.txtAlojamientos.value.trim());
	let sFechaInicio = Date.parse(frmAltaReserva.txtFechaInicio.value.trim());
	let sFechaFin = Date.parse(frmAltaReserva.txtFechaFin.value.trim());
	let iCodigo = cliente.siguienteCodigoReservas();

	let f1 = new Date();
	let f2 = new Date(sFechaInicio);
	let f3 = new Date(sFechaFin);

	let dia = f1.getDate();
	let mes = f1.getMonth();
	let año = f1.getFullYear();

	let diaActual = f1.getTime();
	let DiaReservaInicio = f2.getTime();
	let DiaReservaFin = f3.getTime();

	let oReserva = new Reserva(iCodigo, sCliente, numAlojamiento, sFechaInicio, sFechaFin);

	if (sCliente.length == 0 || isNaN(numAlojamiento) || diaActual > DiaReservaInicio || diaActual > DiaReservaFin) {
		alert("Faltan datos por rellenar o las fechas es incorreco");
	} else {
		alert(cliente.AltaReserva(oReserva));
		frmAltaReserva.reset();
		frmAltaReserva.style.display = "none";
	}
}

function aceptarBajaReserva() {
	let sId = parseInt(frmBajaReserva.txtIdReserva.value.trim());

	if (isNaN(sId)) {
		alert("El id tiene que ser mayor a 0");
	} else {
		alert(cliente.BajaReserva(sId));
		frmBajaReserva.reset();
		frmBajaReserva.style.display = "none";
	}
}
