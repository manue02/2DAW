// Sugerencia de categorias y productos

let catalogo = new Catalogo();
let arrayUnidades = [];
let Gestores = new Array(9);

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
		case "Bebidas":
			categoria = 0;
			break;
		case "Tostadas":
			categoria = 1;
			break;
		case "Bollería":
			categoria = 2;
			break;
	}
	// String(categoria);
	// let indiceCategoria = categoria.indexOf(categoria);
	productos = catalogo.productos;

	for (let i = 0; i < productos.length; i++) {
		if (categoria == productos[i].IdCategoria) {
			let oOption = document.createElement("option");
			oOption.text = productos[i].NombreProducto;
			frmControles.productos.add(oOption);
		}
	}
}

//colorear todas las mesas libres
function colorearMesasLibres() {
	let mesas = document.getElementsByClassName("mesa");
	for (let i = 0; i < mesas.length; i++) {
		mesas[i].classList.add("libre");
	}

	let cuenta = document.getElementById("cuenta");
	//poner un texto en el div cuenta

	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + 1 + "</h2>";
	//meter el numero de la mesa seleccionada en una cuenta nueva

	CategoriaSeleccionada();
}

//al hacer click en el boton de liberar mesa  se vuelve a colorear la mesa de verde
function liberarMesa() {
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);
	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + NumeroMesa + "</h2>";
	let rojo = document.getElementsByClassName("mesa");
	rojo[NumeroMesa - 1].classList.remove("ocupada");

	let gestor = Gestores[NumeroMesa - 1];

	let Tdcuenta = gestor;

	//poner la cuenta pagada en el array de cuentas y poner a true el atributo pagada
	for (let i = 0; i < Tdcuenta.length; i++) {
		if (Tdcuenta[i].mesaActual == NumeroMesa) {
			for (let i = 0; i < Tdcuenta.cuentas.length; i++) {
				Tdcuenta[i].cuentas.pagada = true;

				if (Tdcuenta[i].cuentas.pagada == true) {
					//borrar la array de productos de la cuenta que se ha pagado
					Tdcuenta[i].cuentas = [];
					//borrar la cuenta del array de cuentas
					Tdcuenta.splice(i, 1);
				}
			}
		}
	}
	//console.log(Tdcuenta.cuentas.mesa);
}

//hacer que al hacer click en una mesa se muestre la mesa seleccionada en el div cuenta

function seleccionarMesa() {
	let mesa = this;
	let cuenta = document.getElementById("cuenta");
	//poner un texto en el div cuenta
	if (mesa.classList.contains("ocupada")) {
		cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + mesa.innerHTML + "<h2>Total: 0€</h2>" + "<button class = 'boton' onClick = 'liberarMesa()'>Pagar y liberar la mesa</button>";
		//meter el numero de la mesa seleccionada en una cuenta nueva

		let tabla = document.createElement("table");
		tabla.setAttribute("id", "tabla");
		cuenta.append(tabla);
		tabla.innerHTML = "<tr><th>Modificar</th><th>Uds</th><th>Id</th><th>Producto</th><th>Precio</th></tr>";
	} else {
		cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + mesa.innerHTML + "</h2>";
	}
}
//borrar el combo de productos
function BorrarCombo() {
	let productos = frmControles.productos;
	for (let i = productos.length; i >= 0; i--) {
		productos.remove(i);
	}
}

function BuscarUnIdProducto(value) {
	let productos = catalogo.productos;
	for (let i = 0; i < productos.length; i++) {
		if (value == productos[i].NombreProducto) {
			return productos[i];
		}
	}
}

function unidadesProducto() {
	let Teclado = this.value;
	let cuenta = document.getElementById("cuenta");
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);

	let nombreProducto = frmControles.productos.value;
	let ArrayDeidProducto = [];
	ArrayDeidProducto = BuscarUnIdProducto(nombreProducto);

	let resultadoID = ArrayDeidProducto.IdProducto;
	let resultadoPrecio = ArrayDeidProducto.PrecioUnidad;

	precioTotalUnidad = resultadoPrecio * Teclado;

	precioTotalUnidad = precioTotalUnidad.toFixed(2);

	let salto = document.createElement("br");
	cuenta.append(salto);

	let rojo = document.getElementsByClassName("mesa");
	rojo[NumeroMesa - 1].classList.add("ocupada");

	let lineaCuenta = new LineaCuenta(Teclado, resultadoID);

	let arrayLineasCuenta = [];
	arrayLineasCuenta.push(lineaCuenta);

	//crear una cuenta nueva por cada mesa
	let cuentaNueva = new Cuenta(NumeroMesa, [arrayLineasCuenta], false);

	let gestor = Gestores[NumeroMesa - 1];
	if (gestor === undefined) {
		gestor = new Gestor(NumeroMesa);
		Gestores[NumeroMesa - 1] = gestor;
	}

	gestor.cuentas.push(cuentaNueva);

	//console.log(gestor.cuentas);

	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>" + mesa + "</h2>" + "<h2>Total: " + precioTotalUnidad + "€</h2>" + "<button class = 'boton' onClick = 'liberarMesa()'>Pagar y liberar la mesa</button>";
	//meter el numero de la mesa seleccionada en una cuenta nueva

	let tabla = document.createElement("table");
	tabla.setAttribute("id", "tabla");
	cuenta.append(tabla);
	tabla.innerHTML = "<tr><th>Modificar</th><th>Uds</th><th>Id</th><th>Producto</th><th>Precio</th></tr>";

	let tr = document.createElement("tr");
	tabla.append(tr);
	tr.innerHTML =
		"<td><button class = 'boton' onClick = 'AñadirUnidad()'>+</button> <button class = 'boton' onClick = 'QuitarUnidad()'>-</button></td><td>" +
		Teclado +
		"</td><td>" +
		resultadoID +
		"</td><td>" +
		nombreProducto +
		"</td><td>" +
		precioTotalUnidad +
		"€</td>";

	//si se añade un producto a una mesa que ya tiene ese producto da un error y no se añade el producto a la cuenta
}

function AñadirUnidad() {
	// añadir una unidad al producto seleccionado y se actualice el precio total de la cuenta

	let Unidades = document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML;
	let sumaUnidades = parseInt(Unidades) + 1;
	document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML = sumaUnidades;

	let PrecioUniddad = document.getElementById("tabla").getElementsByTagName("td")[4].innerHTML;
	let precioTotal = PrecioUniddad.substring(0, 4);
	let precioTotalUnidad = precioTotal * sumaUnidades;
	precioTotalUnidad = precioTotalUnidad.toFixed(2);
	document.getElementById("cuenta").getElementsByTagName("h2")[1].innerHTML = "Total: " + precioTotalUnidad + "€";
}

function QuitarUnidad() {
	// quitar una unidad al producto seleccionado y se actualice el precio total de la cuenta y  Se deberá preguntar al usuario si realmente quiere eliminar la última unidad

	let Unidades = document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML;
	let restaUnidades = parseInt(Unidades) - 1;
	document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML = restaUnidades;

	let PrecioUniddad = document.getElementById("tabla").getElementsByTagName("td")[4].innerHTML;
	let precioTotal = PrecioUniddad.substring(0, 4);
	let precioTotalUnidad = precioTotal * restaUnidades;
	precioTotalUnidad = precioTotalUnidad.toFixed(2);
	document.getElementById("cuenta").getElementsByTagName("h2")[1].innerHTML = "Total: " + precioTotalUnidad + "€";

	if (restaUnidades == 0) {
		let confirmar = confirm("¿Seguro que quieres eliminar la última unidad?");
		if (confirmar == true) {
			document.getElementById("tabla").remove();
		}

		let cuenta = document.getElementById("cuenta");
		let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
		let NumeroMesa = mesa.substring(5, 6);

		let rojo = document.getElementsByClassName("mesa");
		rojo[NumeroMesa - 1].classList.remove("ocupada");

		cuenta.innerHTML = "<h1>Cuenta</h1> <h2>" + mesa + "</h2>";
	}
}
