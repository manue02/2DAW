let botonIniciar = document.getElementById("botVal");
let botonDetener = document.getElementById("botDet");
crono.addEventListener("submit", validarFormulario);

let Inter = 0;

function validarFormulario(event) {
	let errores = [];
	let hayErrores = false;
	let salida = "";

	const Hora = crono.thoras.value.trim();
	const Minutos = crono.tminutos.value.trim();
	const Segundos = crono.tsegundos.value.trim();

	if (Hora == 0) {
		errores.push("Hora");
		hayErrores = true;
	}

	if (Minutos == 0) {
		errores.push("Minutos");
		hayErrores = true;
	}

	if (Segundos == 0) {
		errores.push("Segundos");
		hayErrores = true;
	}

	if (hayErrores) {
		event.preventDefault(); //Para parar el evento submit por defecto
		if (errores.length > 0) {
			salida += "<h3>CAMPOS CON ERRORES:</h3><ul>";
			for (let elem of errores) {
				salida += "<li>" + elem + "</li>";
			}
			salida += "</ul>";
		}
		document.getElementById("salida").innerHTML = salida;
	}
}

function tiempo() {
	let miliAux = 0;
	let sAux = 0;
	let mAux = 0;
}

botonIniciar.addEventListener("click", IniciarCronometro);

botonDetener.addEventListener("click", DetenerCronometro);

function IniciarCronometro() {
	tiempo();
	Inter = setInterval(tiempo, 10);
}

function DetenerCronometro() {
	clearInterval(Inter);
}

function dosDigitos(e) {
	if (e < 10) {
		return "0" + e;
	} else {
		return e;
	}
}

function formatoSalidaCrono(h, m, s, d) {
	cronoSalida = "0";
	cronoSalida = dosDigitos(h);
	cronoSalida += ":" + dosDigitos(m);
	cronoSalida += ":" + dosDigitos(s);
	cronoSalida += ":" + d;
	return cronoSalida;
}
