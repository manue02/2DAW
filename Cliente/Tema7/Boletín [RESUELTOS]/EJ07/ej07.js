document.getElementById("recuperarDatos").addEventListener("click", recuperarDatos);
const apiRest = "https://primerproyecto-34e1f-default-rtdb.asia-southeast1.firebasedatabase.app/";

function recuperarDatos() {
	const fichero = "categorias.json";
	fetch(apiRest + fichero)
		.then((res) => res.json())
		.then((data) => Object.values(data)) //Devuelve un objeto cuyos índice es el id generado por Firebase. Lo quitamos quedándonos con values
		.then(mostrarAlumnos);
}

function mostrarAlumnos(listaAlumnos) {
	const capaSalida = document.getElementById("salida");
	let salida = "";
	for (let alumno of listaAlumnos) {
		salida += JSON.stringify(alumno) + "<br>";
	}
	capaSalida.innerHTML = salida;
}
