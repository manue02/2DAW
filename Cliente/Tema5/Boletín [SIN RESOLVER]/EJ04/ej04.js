// Dado el formulario que permite la entrada de una provincia
//  con su código correspondiente, y dos listas múltiples que inicialmente estarán
//  vacías. Una vez pulsado el botón “agregar provincia” deberá introducirse la provincia en la
//  lista múltiple de la izquierda. Los botones con las flechas deberán pasar de izquierda a derecha o
//  viceversa las provincias seleccionadas de una de las listas múltiple de origen a la de destino. Habrá
//   que controlar que si la provincia ya existe en alguna de las dos listas múltiples, no se permitirá que se agregue de nuevo.

frmEntrada.btnAgregar.addEventListener("click", agregarProvincia);

function agregarProvincia() {
	let provincia = frmEntrada.txtProvincia.value;
	let codigo = frmEntrada.txtCodigo.value;

	if (provinciaYaExiste(provincia)) {
		alert("La provincia ya existe");
		return;
	}

	let opcion = new Option(provincia, codigo);
	frmEntrada.lstProvincias.add(opcion);
}

function provinciaYaExiste(provincia) {
	for (let i = 0; i < frmEntrada.lstProvincias.length; i++) {
		if (frmEntrada.lstProvincias.options[i].text == provincia) {
			return true;
		}
	}
	return false;
}

function moverProvincias(origen, destino) {
	for (let i = 0; i < origen.length; i++) {
		if (origen.options[i].selected) {
			let opcion = new Option(origen.options[i].text, origen.options[i].value);
			destino.add(opcion);
			origen.remove(i);
			i--;
		}
	}
}
