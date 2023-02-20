document.getElementById("recuperarDatos").addEventListener("click", recuperarDatos);

const url = "alumnos.json";
fetch(url)
	.then((res) => res.json())
	.then((objRespuesta) => Object.values(objRespuesta))
	.then(mostrarAlumnos);
console.log("hola");

function mostrarAlumnos(listaAlumnos) {
	const capaSalida = document.getElementById("salida");
	let salida = "";
	for (let alumno of listaAlumnos) {
		salida += JSON.stringify(alumno) + "<br>";
	}
	capaSalida.innerHTML = salida;
}
