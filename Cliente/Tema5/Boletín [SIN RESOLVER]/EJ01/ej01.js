// Dado el formulario con los datos de tres actores seleccionables mediante un radiobutton,
// añadir un manejador de eventos al botón para que al pulsar sobre él muestre por consola los datos del actor seleccionado.

formulario.consultar.addeventlistener("click", mostrarDatos);

function mostrarDatos() {
	var datos = document.getElementsByName("actor");
	for (var i = 0; i < datos.length; i++) {
		if (datos[i].checked) {
			console.log(datos[i].value);
		}
	}
}
