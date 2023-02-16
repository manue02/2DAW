document.getElementById("addJSON").addEventListener("click", atacarAPIRest);

function atacarAPIRest() {
	fetch("https://picsum.photos/list")
		.then((response) => response.json())
		.then(generarLista)
		.catch(console.log);
}

function generarLista(imagenes) {
	const frmControles = document.getElementById("frmControles");

	for (let imagen of imagenes) {
		let lista = document.createElement("option");
		lista.innerHTML = imagen.author;
		frmControles.categorias.add(lista);
	}

	frmControles.categorias.add(lista);
}
