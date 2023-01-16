formulario.txtEntrada.addEventListener("copy", mensajeNoCopiar);

function mensajeNoCopiar(e) {
	alert("No se puede copiar");
	e.preventDefault();
}
