document.addEventListener("DOMContentLoaded", PintarTabla);
let tabla = document.getElementsByTagName("table")[0];
tabla.addEventListener("mouseenter", cursorDentro);
tabla.addEventListener("mouseleave", cursorFuera);

let contadorPar = 0;
let contadorImpar = 0;
let contadorGeneral = 0;
function PintarTabla() {
	let tabla = document.getElementsByTagName("table")[0];

	for (let i = 1; i < tabla.rows.length; i++) {
		contadorGeneral++;
		//	console.log(contadorGeneral);

		if (contadorGeneral % 2 == 0) {
			contadorPar++;
			console.log(contadorPar);
			tabla.rows[i].classList.add("tr");
		} else {
			contadorImpar++;
			tabla.rows[i].classList.add("destacada");
		}

		console.log(tabla.rows[i]);
	}
}

function cursorDentro() {
	let tabla = document.getElementsByTagName("table")[0];

	for (let i = 1; i < tabla.rows.length; i++) {
		contadorGeneral++;
		//	console.log(contadorGeneral);

		if (contadorGeneral % 2 == 0) {
			contadorPar++;
			console.log(contadorPar);
			tabla.rows[i].style.backgroundColor = "gold";
		} else {
			contadorImpar++;
			tabla.rows[i].style.backgroundColor = "white";
		}

		console.log(tabla.rows[i]);
	}
}

function cursorFuera() {}
