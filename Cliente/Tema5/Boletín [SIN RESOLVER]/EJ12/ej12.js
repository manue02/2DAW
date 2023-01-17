//validar si el input esta vacio o no

formulario.addEventListener("submit", validar);

function validar(e) {
	let input = formulario.txtTexto;
	if (input.value == "") {
		alert("El campo no puede estar vacio");
		e.preventDefault();
	}
}
