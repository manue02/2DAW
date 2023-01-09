formulario.boton.addEventListener("click", mostrarDatos);

function mostrarDatos() {
	let texto = formulario.provincias.options[formulario.provincias.selectedIndex].text;
	let valor = formulario.provincias.options[formulario.provincias.selectedIndex].value;

	console.log("Texto: " + texto + " Valor: " + valor);
}
