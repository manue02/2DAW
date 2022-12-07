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
