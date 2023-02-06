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
