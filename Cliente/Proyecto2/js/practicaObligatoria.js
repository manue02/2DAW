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

//evento para poner las mesas libres en verde

document.addEventListener("DOMContentLoaded", colorearMesasLibres);

//añadir un evento alhacer clickk en una mesa
let mesas = document.getElementsByClassName("mesa");
for (let i = 0; i < mesas.length; i++) {
	mesas[i].addEventListener("click", seleccionarMesa);
}

//añadir un evento al hacer click en en tecla de un producto
let unidades = document.getElementsByClassName("tecla");
for (let i = 0; i < unidades.length; i++) {
	unidades[i].addEventListener("click", unidadesProducto);
}

//añadair las categorias en el combo
for (let i = 0; i < categorias.length; i++) {
	let oOption = document.createElement("option");
	oOption.text = categorias[i];
	frmControles.categorias.add(oOption);
}

//mostrar los productos en el combo de productos en funcion de la categoria seleccionada en el combo de categorias

function CategoriaSeleccionada() {
	BorrarCombo();
	let productos = [];
	let categoria = frmControles.categorias.value;
	switch (categoria) {
		case "Tostadas":
			categoria = 1;
			break;
		case "Bebidas":
			categoria = 0;
			break;
		case "Bollería":
			categoria = 2;
			break;
	}
	//let indiceCategoria = categoria.indexOf(categoria);
	productos = catalogo.productos;

	for (let i = 0; i < productos.length; i++) {
		if (categoria == productos[i].IdCategoria) {
			let oOption = document.createElement("option");
			oOption.text = productos[i].NombreProducto;
			frmControles.productos.add(oOption);
		}
	}
}

//colorear todas las mesas que esten libres
function colorearMesasLibres() {
	let mesas = document.getElementsByClassName("mesa");
	for (let i = 0; i < mesas.length; i++) {
		mesas[i].style.backgroundColor = "green";
	}

	CategoriaSeleccionada();
}

//colorear todas las mesas que esten ocupadas
function colorearMesasOcupadas() {
	let mesas = document.getElementsByClassName("mesa");
	for (let i = 0; i < mesas.length; i++) {
		mesas[i].style.backgroundColor = "red";
	}
}

//hacer que al hacer click en una mesa se muestre la mesa seleccionada en el div cuenta

function seleccionarMesa() {
	let mesa = this;
	let cuenta = document.getElementById("cuenta");
	//poner un texto en el div cuenta

	cuenta.innerHTML = "<h2>Cuenta</h2> <p>Mesa " + mesa.innerHTML + "</p>";
}

//borrar el combo de productos
function BorrarCombo() {
	let productos = frmControles.productos;
	for (let i = productos.length; i >= 0; i--) {
		productos.remove(i);
	}
}

//mostar las unidades de un producto sumando la tecla pulsada, mostar el id del producto y el nombre del producto con su precio unitario y el total de ese producto en la cuenta

function unidadesProducto() {
	let arrayUnidades = [];
	for (let i = 0; i < unidades.length; i++) {
		if (unidades[i].value == this.value) {
			arrayUnidades.push(unidades[i].value);

			console.log(arrayUnidades);
		}
	}
	let producto = frmControles.productos.value;
	let precio = 0;
	let total = 0;
	let cuenta = document.getElementById("cuenta");
	let productos = catalogo.productos;
	for (let i = 0; i < productos.length; i++) {
		if (producto == productos[i].NombreProducto) {
			precio = productos[i].PrecioUnidad;
			total = precio * unidades;
			cuenta.innerHTML += "<p>" + productos[i].IdProducto + " " + productos[i].NombreProducto + " (ud: " + precio + "€) " + unidades + " = " + total + "€</p>";
		}
	}
}
