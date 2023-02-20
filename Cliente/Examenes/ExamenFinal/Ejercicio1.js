const apiRest = "https://paraexamen-5ef7d-default-rtdb.firebaseio.com/";

const formulario1 = document.getElementsByName("formNuevoPartido");
const formulario2 = document.getElementsByName("formActualizarPartido");
const formulario3 = document.getElementsByName("formEliminarPartido");

formulario1.addEventListener("submit", insertarAlumno);
formulario2.addEventListener("submit", actualizarPartido);
formulario3.addEventListener("submit", eliminarPartido);

document.getElementById("recuperarDatos").addEventListener("click", recuperarDatos);

function recuperarDatos() {
	const fichero = "partidos.json";
	fetch(apiRest + fichero)
		.then((res) => res.json())
		.then((data) => Object.values(data)) //Devuelve un objeto cuyos índice es el id generado por Firebase. Lo quitamos quedándonos con values
		.then(mostrarAlumnos)
		.catch(console.log);
}

function mostrarAlumnos(listaPartidos) {
	const capaSalida = document.getElementById("salida");
	let tabla = document.createElement("table");
	let cabecera = document.createElement("thead");
	let fila, celda;
	cabecera.innerHTML = "<th>Local</th><th>Visitante</th><th>Goles Local</th><th>Goles Visitante</th>";
	tabla.append(cabecera);
	for (let partido of listaPartidos) {
		fila = tabla.insertRow();
		celda = fila.insertCell();
		celda.textContent = partido.equipoLocal;
		celda = fila.insertCell();
		celda.textContent = partido.equipoVisitante;
		celda = fila.insertCell();
		celda.textContent = partido.golesLocal;
		celda = fila.insertCell();
		celda.textContent = partido.golesVisitante;

		console.log(partido);
	}
	borrarSalida();
	capaSalida.append(tabla);
}

function borrarSalida() {
	document.getElementById("salida").innerHTML = "";
}

function insertarAlumno(event) {
	const fichero = "partidos.json";

	let formNuevo = document.getElementsByName("formNuevoPartido");

	const local = formNuevo.local.value.trim();
	const visitante = formNuevo.visitante.value.trim();
	const golesLocal = formNuevo.golesLocal.value;
	const golesVisitante = formNuevo.golesVisitante.value;

	const nuevoPartido = {
		local: local,
		visitante: visitante,
		golesLocal: golesLocal,
		golesVisitante: golesVisitante,
	};
	event.preventDefault();

	console.log(apiRest + fichero);
	fetch(apiRest + fichero, {
		method: "POST",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(nuevoPartido),
	})
		.then((res) => res.json())
		.then((data) => {
			console.log(data);
			recuperarDatos();
		})
		.catch(console.log);
}

function actualizarPartido(event) {
	event.preventDefault();
	let formActualizar = document.getElementsByName("formActualizarPartido");

	let datos = { local: "" };
	const fichero = "partidos/";
	const idFirebase = formActualizar.idFirebase.value.trim() + ".json";
	let local = formActualizar.local.value.trim();

	datos.local = local;

	fetch(apiRest + fichero + idFirebase, {
		method: "PATCH",
		headers: {
			"Content-Type": "application/json;charset=utf-8",
		},
		body: JSON.stringify(datos),
	}).then((res) => res.json());

	setTimeout(recuperarDatos, 800);
}

function eliminarPartido(event) {
	event.preventDefault();
	const fichero = "partidos/";
	let formEliminar = document.getElementsByName("formEliminarPartido");
	const idFirebase = formEliminar.id_Firebase.value.trim() + ".json";

	console.log(idFirebase);

	fetch(apiRest + fichero + idFirebase, {
		method: "DELETE",
	})
		.then((res) => res.json())
		.then((data) => {
			console.log(data);
			recuperarDatos();
		})
		.catch(console.log);
}
