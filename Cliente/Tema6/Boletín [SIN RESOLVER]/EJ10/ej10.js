document.getElementById("boton").addEventListener("click", Seleccionada);

// Función que se ejecuta al pulsar el botón de añadir tarea
function Seleccionada() {
	// Se obtienen los datos de la tarea
	let tarea = document.getElementsByName("tarea")[0].value;
	let prioridad = document.getElementsByName("prioridad")[0].value;
	//contador de tareas
	let contador = 1;

	// Se crea la tabla
	let tabla = document.createElement("table");
	tabla.setAttribute("id", "tabla");
	document.body.appendChild(tabla);

	// Se crea la fila
	let fila = document.createElement("tr");
	fila.setAttribute("id", "fila");
	tabla.appendChild(fila);

	// Se crea la celda con el orden
	let celdaOrden = document.createElement("td");
	celdaOrden.setAttribute("id", "celdaOrden");
	fila.appendChild(celdaOrden);

	// Se crea la celda con la tarea
	let celdaTarea = document.createElement("td");
	celdaTarea.setAttribute("id", "celdaTarea");
	fila.appendChild(celdaTarea);

	// Se crea la celda con la prioridad
	let celdaPrioridad = document.createElement("td");
	celdaPrioridad.setAttribute("id", "celdaPrioridad");
	fila.appendChild(celdaPrioridad);

	// Se crea la celda con la papelera
	let celdaPapelera = document.createElement("td");
	celdaPapelera.setAttribute("id", "celdaPapelera");
	fila.appendChild(celdaPapelera);

	// Se crea la imagen de la papelera
	let papelera = document.createElement("img");
	papelera.setAttribute("src", "papelera.png");
	papelera.setAttribute("id", "papelera");
	celdaPapelera.appendChild(papelera);

	// Se crea el texto del orden y cada vez que se añada una tarea se incrementa
	let textoOrden = document.createTextNode(contador);
	celdaOrden.appendChild(textoOrden);

	// Se crea el texto de la tarea
	let textoTarea = document.createTextNode(tarea);
	celdaTarea.appendChild(textoTarea);

	// Se crea el texto de la prioridad
	let textoPrioridad = document.createTextNode(prioridad);
	celdaPrioridad.appendChild(textoPrioridad);

	// Se crea el evento de la papelera
	papelera.addEventListener("click", EliminarTarea);
}

// Función que se ejecuta al pulsar la papelera
function EliminarTarea() {
	// Se obtiene la tabla
	let tabla = document.getElementById("tabla");

	// Se elimina la fila
	tabla.removeChild(fila);
}
