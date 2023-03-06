let botonIniciar = document.getElementById("botVal");
let botonDetener = document.getElementById("botDet");

botonIniciar.addEventListener("click", IniciarCronometro);

botonDetener.addEventListener("click", DetenerCronometro);

let Hora = crono.thoras.value.trim();
let Minutos = crono.tminutos.value.trim();
let Segundos = crono.tsegundos.value.trim();
let mili = 99;

let Inter = 0;

function actualizaCrono() {
	mili--;
	if (mili <= 0) {
		Segundos--;
		mili = 99;
	}

	if (Segundos <= 0) {
		Minutos--;
		Segundos = 59;
	}

	if (Minutos <= 0) {
		Hora--;
		Minutos = 59;
	}

	if (Hora <= 0) {
		Hora = 0;
	}

	console.log(Segundos);

	formatoSalidaCrono(Hora, Minutos, Segundos, mili);

	// document.getElementById("Resultado").innerHTML = Hora + ":" + Minutos + ":" + Segundos + ":" + mili;
}

function IniciarCronometro() {
	actualizaCrono();
	Inter = setInterval(actualizaCrono, 10);

	actualizaHoras();
	actualizaMinutos();
	actualizaSegundos();
}

function actualizaHoras() {
	let Hora = crono.thoras.value.trim();

	if (Hora.length == 0) {
		Hora = 0;
	}
}

function actualizaMinutos() {
	let Minutos = crono.tminutos.value.trim();
	let Hora = crono.thoras.value.trim();

	if (Minutos.length == 0) {
		Minutos = 0;
	} else if (Minutos > 59) {
		Hora++;
	}
}

function actualizaSegundos() {
	let Segundos = crono.tsegundos.value.trim();
	let Minutos = crono.tminutos.value.trim();

	if (Segundos.length == 0) {
		Segundos = 0;
	} else if (Segundos > 59) {
		Minutos++;
	}
}

function actualizaHoras() {}

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
