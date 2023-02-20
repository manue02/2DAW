const url = "coches.json";
fetch(url)
	.then((res) => res.json())
	.then((objRespuesta) => Object.values(objRespuesta))
	.then(mostrarAlumnos);

function mostrarAlumnos(listaCoches) {
	const capaSalida = document.getElementById("salida");
	let tabla = document.createElement("table");
	let cabecera = document.createElement("thead");
	let fila, celda;
	cabecera.innerHTML = "<th>Marca</th><th>Modelo</th><th>Matricula</th><th>Kms</th>";
	tabla.append(cabecera);
	let salida = "";
	for (let coches of listaCoches) {
		salida += JSON.stringify(coches) + "<br>";

		console.table(coches);
	}
	capaSalida.innerHTML = salida;
}
