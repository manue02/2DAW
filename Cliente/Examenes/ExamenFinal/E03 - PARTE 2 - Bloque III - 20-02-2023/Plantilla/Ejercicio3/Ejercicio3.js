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
	for (let coches of listaCoches) {
		for (let c of coches) {
			fila = tabla.insertRow();
			celda = fila.insertCell();
			celda.textContent = c.marca;
			celda = fila.insertCell();
			celda.textContent = JSON.stringify(c.modelo);
			celda = fila.insertCell();
			celda.textContent = JSON.stringify(c.matricula);
			celda = fila.insertCell();
			celda.textContent = JSON.stringify(c.kilometros);
		}

		console.table(coches);
	}
	capaSalida.append(tabla);
}
