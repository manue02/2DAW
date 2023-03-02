// Partiendo de la plantilla facilitada con el ejercicio, implementar el código javascript que permita
// que al pulsar el botón ejecutar se moverán todos los objetos marcados desde el recuadro de
// origen al de destino. Éstos se ubicarán tomando como referencia la capa de destino marcada
// en función de la operación que se haya seleccionado. Si la opción de clonar está activa, la
// funcionalidad es la misma que la descrita anteriormente, con la salvedad de que los objetos
// marcados conservarán una copia en la capa de origen

// Path: Cliente\Examenes\E02 - Bloque II - 06-02-2023\Plantilla\Ejercicio3\js\ejercicio3.js
// Compare this snippet from Cliente\Examenes\E02 - Bloque II - 06-02-2023\Plantilla\Ejercicio1\js\ejercicio1.js:
let PasarEncima = document.getElementsByName("tips")[0];
PasarEncima.setAttribute("id", "tips");

let CheckBox = document.getElementById("tips").checked;

if (CheckBox == true) {
	let capas = document.querySelectorAll(".capa");

	for (const capa of capas) {
		capa.addEventListener("mouseleave", Fucnion);
	}

	function Fucnion() {
		let Ediv = document.createElement("div");
		Ediv.classList.add("tooltip");
		let texto = capas.target.getAttribute("data-tip");
		let textazo = document.createTextNode(texto);
		Ediv.appendChild(textazo);
		for (const capa2 of capas) {
			capa2.appendChild(Ediv);
		}
	}
} else {
	capa.removeEventListener("mouseleave"), Fucnion;
}
