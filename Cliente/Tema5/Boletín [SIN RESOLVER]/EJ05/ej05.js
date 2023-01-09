function marcar() {
	formulario.verano.checked = formulario.verano.checked ? false : true;
}

function addManejador() {
	let botonMarcar = document.getElementById("botonMarcar");
	botonMarcar.addEventListener("click", marcar);
}

function deleteManejador() {
	let botonMarcar = document.getElementById("botonMarcar");
	botonMarcar.removeEventListener("click", marcar);
}
