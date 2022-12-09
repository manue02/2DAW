let almacen = new Almacen();
console.log(almacen);

datosIniciales();

function datosIniciales() {}

// Gestión de formularios
function gestionFormularios(sFormularioVisible) {
	ocultarTodosLosFormularios();

	// Hacemos visible el formulario que llega como parámetro
	switch (sFormularioVisible) {
		case "frmAltaCatalogo":
			frmAltaCatalogo.style.display = "block";
			break;
		case "frmEntradaStock":
			frmEntradaStock.style.display = "block";
			break;
		case "frmSalidaStock":
			frmSalidaStock.style.display = "block";
			break;
	}
}

function ocultarTodosLosFormularios() {
	let oFormularios = document.querySelectorAll("form");

	for (let i = 0; i < oFormularios.length; i++) {
		oFormularios[i].style.display = "none";
	}
}

function aceptarAltaCatalogo() {
	// Añadir código

	let sNombre = frmAltaCatalogo.txtNombre.value.trim();
	let sPrecio = parseInt(frmAltaCatalogo.txtPrecio.value.trim());

	let sPulgadas = parseInt(frmAltaCatalogo.txtPulgadas.value.trim());

	let sFullHD = frmAltaCatalogo.rbtFullHD.value;
	let bFullHD = sFullHD == "S" ? true : false;

	let sCarga = parseInt(frmAltaCatalogo.txtCarga.value.trim());

	let oCatalogo;

	if (isNaN(sPrecio) || sNombre.length == 0) {
		alert("Faltan datos por rellenar");
	} else {
		// Continuo con el alta del catalogo

		if (frmAltaCatalogo.rbtElectrodomestico.value == "TV") {
			oAlojamiento = new Televisor(sNombre, sPrecio, sPulgadas, bFullHD);
		} else {
			oAlojamiento = new Lavadora(sNombre, sPrecio, sCarga);
		}

		// Insertar el nuevo catalogo
		if (almacen.AltaCatalago(oCatalogo)) {
			alert("Catalago registrado OK");
			frmAltaCatalogo.reset(); // Vaciamos los campos del formulario
			frmAltaCatalogo.style.display = "none";
		} else {
			alert("Catalogo registrado previamente");
		}
	}
}

function aceptarEntradaStock() {
	// Añadir código

	let iNombre = frmEntradaStock.txtNombre.value.trim();
	let iUnidades = parseInt(frmEntradaStock.txtUnidades.value.trim());

	if (iNombre.length == 0 || isNaN(iUnidades)) {
		alert("Faltan datos por rellenar");
	} else {
		// Continuo con el registro del stock
		let sRespuesta = almacen.EntradaDeStock(iNombre, iUnidades);

		alert(sRespuesta);

		if (sRespuesta.includes("Correcto") > 0) {
			frmTallaje.reset();
			frmTallaje.style.display = "none";
		}
	}
}

function aceptarSalidaStock() {
	// Añadir código

	let iNombre = frmEntradaStock.txtNombre.value.trim();
	let iUnidades = parseInt(frmEntradaStock.txtUnidades.value.trim());

	if (iNombre.length == 0 || isNaN(iUnidades)) {
		alert("Faltan datos por rellenar");
	} else {
		let sRespuesta = almacen.SalidaDeStock(iNombre, iUnidades);

		alert(sRespuesta);

		if (sRespuesta.includes("Correcto") > 0) {
			frmTallaje.reset();
			frmTallaje.style.display = "none";
		}
	}
}

function mostrarListadoCatalogo() {
	// Añadir código
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado de Catalogo</h1>");
	oVentana.document.write(almacen.ListadoCatalogo());
	oVentana.document.close();
	oVentana.document.title = "Listado de Catalogo";
}

function mostrarListadoStock() {
	// Añadir código
	let oVentana = open("", "_blank", "");
	oVentana.document.open();
	oVentana.document.write("<h1>Listado de Stock</h1>");
	oVentana.document.write(almacen.ListarListadoStock());
	oVentana.document.close();
	oVentana.document.title = "Listado de Stock";
}

function mostrarTotales() {
	// Añadir código
}
