const formulario = document.getElementById("formularioConsulta");
const formulario2 = document.getElementById("formularioModificar");
const formulario3 = document.getElementById("formularioEliminar");
const formulario4 = document.getElementById("formularioInsercion");

formulario4.addEventListener("submit", function (event) {
	event.preventDefault();
	let datos = new FormData(formulario4);

	fetch("insertar.php", {
		method: "POST",
		body: datos,
	})
		.then((res) => res.json())
		.then(console.log)
		.then(datos);
});

formulario3.addEventListener("submit", function (event) {
	event.preventDefault();
	let datos = new FormData(formulario3);

	fetch("borrar.php", {
		method: "DELETE",
		body: datos,
	})
		.then((res) => res.json())
		.then(console.log)
		.then(datos);
});

formulario2.addEventListener("submit", function (event) {
	event.preventDefault();
	let datos = new FormData(formulario2);

	fetch("actualizar.php", {
		method: "PATCH",
		body: datos,
	})
		.then((res) => res.json())
		.then(console.log)
		.then(datos);

	console.log(datos);
});
