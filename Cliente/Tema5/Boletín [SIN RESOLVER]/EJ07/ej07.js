document.getElementById("teclado");

teclado.addEventListener("click", calculadora);

function calculadora(e) {
	let target = e.target;

	if (e.target != "input") return;

	let digito = e.target.value;

	salida.value += digito;
}
