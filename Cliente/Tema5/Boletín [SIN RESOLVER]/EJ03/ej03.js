formulario.boton.addEventListener("click", mostrarDatos);

function mostrarDatos() {
	for (let i = 0; i < formulario.provincias.options.length; i++) {
		if (formulario.provincias.options[i].selected) {
			texto = formulario.provincias.options[i].text;
			valor = formulario.provincias.options[i].value;

			console.log("Texto: " + texto + " Valor: " + valor);
		}
	}
}
