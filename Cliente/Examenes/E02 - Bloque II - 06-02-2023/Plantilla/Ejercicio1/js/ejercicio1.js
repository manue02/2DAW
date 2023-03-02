// Obtener el checkbox y los elementos con la clase "capa"
let checkbox = document.querySelector("input[name=tips]");
let capas = document.querySelectorAll(".capa");

// Agregar evento "change" al checkbox para actualizar la variable mostrarTooltips
checkbox.addEventListener("change", function () {
	mostrarTooltips = this.checked;
});

// variable booleana para comprobar si el checkbox está marcado o no
let mostrarTooltips = checkbox.checked;

// Iterar por cada elemento
capas.forEach(function (capa) {
	// Obtener la imagen dentro de la capa
	let img = capa.querySelector("img");

	// Obtener el valor de data-tip
	let tip = img.dataset.tip;

	// Crear un elemento div para el tooltip
	let tooltip = document.createElement("div");
	tooltip.className = "tooltip";
	tooltip.textContent = tip;

	// Agregar el tooltip como hijo de la capa
	capa.appendChild(tooltip);

	// Agregar eventos mouseover y mouseout a la imagen
	img.addEventListener("mouseover", function () {
		// Mostrar el tooltip solo si el checkbox está marcado
		if (mostrarTooltips) {
			tooltip.style.display = "block";
		}
	});

	img.addEventListener("mouseout", function () {
		// Ocultar el tooltip
		tooltip.style.display = "none";
	});
});
