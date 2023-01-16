//no permite que se escriba en el input numeros
function noNumeros(e) {
	if (digito == 0 || digito == 1 || digito == 2 || digito == 3 || digito == 4 || digito == 5 || digito == 6 || digito == 7 || digito == 8 || digito == 9) {
		console.log("Ignorado: " + e.key);
		e.preventDefault();
	}

	formulario.txtEntrada.addeventlistener("keypress", noNumeros);
}
