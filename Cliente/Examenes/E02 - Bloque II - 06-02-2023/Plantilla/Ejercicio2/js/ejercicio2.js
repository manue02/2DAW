// Obtener los elementos del DOM
let seleccionOrigen = document.querySelectorAll('.contenedor input[type="checkbox"]');
let capasDestino = document.querySelectorAll('.capasDestino input[type="radio"]');
let botonEjecutar = document.getElementById("botonEjecutar");
let botonRestaurar = document.getElementById("botonRestaurar");
let operaciones = document.querySelectorAll('[name="operaciones"]');
let clonar = document.querySelectorAll('[name="clonar"]');

// Agregar evento click al botón de ejecutar
botonEjecutar.addEventListener("click", moverObjetos);

// Agregar evento click al botón de restaurar
botonRestaurar.addEventListener("click", restaurar);

// Función para mover los objetos al destino
function moverObjetos() {
	// Obtener la capa de destino seleccionada
	let capaDestino;

	capasDestino.forEach(function (capa) {
		if (capa.checked) {
			capaDestino = capa.parentNode;
			console.log(capaDestino);
		}
	});

	// Obtener la operación seleccionada
	let operacion;
	operaciones.forEach(function (op) {
		if (op.checked) {
			operacion = op.value;
		}
	});

	// Obtener la opción de clonar seleccionada
	let clonarSeleccion;
	clonar.forEach(function (clon) {
		if (clon.checked) {
			clonarSeleccion = clon.value;
			console.log(clonarSeleccion);
		}
	});

	// Iterar por cada objeto del origen
	seleccionOrigen.forEach(function (objeto) {
		if (objeto.checked) {
			// Clonar objeto si está seleccionada la opción de clonar
			let objetoClonado;
			if (clonarSeleccion === "si") {
				objetoClonado = objeto.parentNode.cloneNode(true);
			}

			console.log(objeto);

			// Mover objeto al destino
			if (operacion === "append") {
				capaDestino.appendChild(objeto.parentNode);
			} else if (operacion === "prepend") {
				capaDestino.prepend(objeto.parentNode);
			} else if (operacion === "before") {
				capaDestino.before(objeto.parentNode);
			} else if (operacion === "after") {
				capaDestino.after(objeto.parentNode);
			}

			// Si se clonó el objeto, agregarlo también al origen
			if (clonarSeleccion === "si") {
				objeto.parentNode.parentNode.appendChild(objetoClonado);
			}
		}
	});
}

// Función para restaurar el estado inicial
function restaurar() {
	let contenedorOrigen = document.getElementById("origen");
	let contenedorDestino = document.getElementById("destino");
	let capasDestino = contenedorDestino.querySelectorAll(".capasDestino");

	// Mover todos los objetos al origen
	capasDestino.forEach(function (capa) {
		let objetos = capa.querySelectorAll("div");
		objetos.forEach(function (objeto) {
			contenedorOrigen.appendChild(objeto);
		});
	});

	// Deseleccionar todos los checkboxes
	seleccionOrigen.forEach(function (objeto) {
		objeto.checked = false;
	});

	// Seleccionar primera capa de destino y operación "append"
	capasDestino[0].querySelector('input[type="radio"]').checked = true;
	operaciones[0].checked = true;
	clonar[0].checked = true;
}
