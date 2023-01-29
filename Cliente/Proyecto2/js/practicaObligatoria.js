// Sugerencia de categorias y productos

let catalogo = new Catalogo();

categorias = ["Bebidas", "Tostadas", "Bollería"];

catalogo.addProducto(1, "Café con leche", 0.95, 0);
catalogo.addProducto(2, "Té", 1.05, 0);
catalogo.addProducto(3, "Cola-cao", 1.35, 0);
catalogo.addProducto(4, "Chocolate a la taza", 1.95, 0);
catalogo.addProducto(5, "Media con aceite", 1.25, 1);
catalogo.addProducto(6, "Entera con aceite", 1.95, 1);
catalogo.addProducto(7, "Media con aceite y jamón", 1.95, 1);
catalogo.addProducto(8, "Entera con aceite y jamón", 2.85, 1);
catalogo.addProducto(9, "Media con mantequilla", 1.15, 1);
catalogo.addProducto(10, "Entera con mantequilla", 1.75, 1);
catalogo.addProducto(11, "Media con manteca colorá", 1.45, 1);
catalogo.addProducto(12, "Entera con manteca colorá", 2.15, 1);
catalogo.addProducto(13, "Croissant", 0.95, 2);
catalogo.addProducto(14, "Napolitana de chocolate", 1.45, 2);
catalogo.addProducto(15, "Caracola de crema", 1.65, 2);
catalogo.addProducto(16, "Caña de chocolate", 1.35, 2);

frmControles.categorias.addEventListener("change", CategoriaSeleccionada);

//añadair las categorias en el combo
for (let i = 0; i < categorias.length; i++) {
	let oOption = document.createElement("option");
	oOption.text = categorias[i];
	frmControles.categorias.add(oOption);
}

//mostrar los productos en el combo de productos en funcion de la categoria seleccionada en el combo de categorias

function CategoriaSeleccionada() {
	let productos = [];
	let categoria = frmControles.categorias.value;
	let indiceCategoria = categorias.indexOf(categoria);
	productos = catalogo.getproductos();

	for (let i = 0; i < productos.length; i++) {
		if (indiceCategoria == productos[i].idCategoria) {
			let oOption = document.createElement("option");
			oOption.text = productos[i].nombreProducto;
			frmControles.productos.add(oOption);
		}
	}

	console.log(productos[0]["nombreProducto"]);

	console.log(productos);
}
