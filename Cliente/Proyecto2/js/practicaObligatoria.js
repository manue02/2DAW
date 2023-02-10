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
			oOption.setAttribute("id", "ComboProductos");
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
	Tdcuenta.cuentas = [];
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

	console.log(arrayLineasCuenta);

	//crear una cuenta nueva por cada mesa
	let cuentaNueva = new Cuenta(NumeroMesa, [arrayLineasCuenta], false);

	let gestor = Gestores[NumeroMesa - 1];
	if (gestor === undefined) {
		gestor = new Gestor(NumeroMesa);
		Gestores[NumeroMesa - 1] = gestor;
	}

	gestor.cuentas.push(cuentaNueva);

	console.log(gestor.cuentas);

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
		resultadoPrecio +
		"€</td>";
}

//funcion para añadir unidades a un producto de la cuenta de una mesa seleccionada y modificar el precio total
function AñadirUnidad() {
	let unidades = document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML;
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);
	let IdTabla = document.getElementById("tabla").getElementsByTagName("td")[2].innerHTML;
	let sumaUnidades = parseInt(unidades) + 1;

	let precio = document.getElementById("tabla").getElementsByTagName("td")[4].innerHTML;
	let sumaPrecio = parseFloat(precio) * parseFloat(sumaUnidades);
	sumaPrecio = sumaPrecio.toFixed(2);

	document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML = sumaUnidades;
	document.getElementById("cuenta").getElementsByTagName("h2")[1].innerHTML = "Total: " + sumaPrecio + "€";

	let lineaCuenta = new LineaCuenta(sumaUnidades, IdTabla);

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
}

//funcion para quitar unidades a un producto de la cuenta de una mesa seleccionada y modificar el precio total
function QuitarUnidad() {
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let IdTabla = document.getElementById("tabla").getElementsByTagName("td")[2].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);

	let unidades = document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML;
	let sumaUnidades = parseInt(unidades) - 1;

	let precio = document.getElementById("tabla").getElementsByTagName("td")[4].innerHTML;
	let sumaPrecio = parseFloat(precio) * parseFloat(sumaUnidades);
	sumaPrecio = sumaPrecio.toFixed(2);

	document.getElementById("tabla").getElementsByTagName("td")[1].innerHTML = sumaUnidades;
	document.getElementById("cuenta").getElementsByTagName("h2")[1].innerHTML = "Total: " + sumaPrecio + "€";

	//si las unidades son 0, borrar la cuenta y pregunta por si esta seguro de querer borrarla
	if (sumaUnidades == 0) {
		let confirmar = confirm("¿Estas seguro de querer borrar la cuenta?");
		if (confirmar) {
			let cuenta = document.getElementById("cuenta");
			cuenta.innerHTML = "<h1>Cuenta</h1> <h2>" + mesa + "</h2>";
			let rojo = document.getElementsByClassName("mesa");
			rojo[NumeroMesa - 1].classList.remove("ocupada");
		}
	}
}

//funcion para mostar toda la cuenta de una mesa seleccionada
function MostrarCuenta() {
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);

	let gestor = Gestores[NumeroMesa - 1];
	if (gestor === undefined) {
		gestor = new Gestor(NumeroMesa);
		Gestores[NumeroMesa - 1] = gestor;
	}

	let cuenta = document.getElementById("cuenta");
	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>" + mesa + "</h2>";

	let tabla = document.createElement("table");
	tabla.setAttribute("id", "tabla");
	cuenta.append(tabla);
	tabla.innerHTML = "<tr><th>Modificar</th><th>Uds</th><th>Id</th><th>Producto</th><th>Precio</th></tr>";

	// if (Gestores[NumeroMesa - 1]) != undefined) {
	// 	for (let i = 0; i < Gestores[NumeroMesa - 1].cuentas.length; i++) {
	// 		let unidades = Gestores[NumeroMesa - 1].cuentas[i].lineasCuenta[i].unidades;
	// 		let IdTabla = Gestores[NumeroMesa - 1].cuentas[i].lineasCuenta[i].IdTabla;

	// 		let nombreProducto = document.getElementById(IdTabla).getElementsByTagName("td")[1].innerHTML;
	// 		let precio = document.getElementById(IdTabla).getElementsByTagName("td")[2].innerHTML;

	// 		let tr = document.createElement("tr");
	// 		tabla.append(tr);

	// 		tr.innerHTML =
	// 			"<td><button class = 'boton' onClick = 'AñadirUnidad()'>+</button> <button class = 'boton' onClick = 'QuitarUnidad()'>-</button></td><td>" +
	// 			unidades +
	// 			"</td><td>" +
	// 			IdTabla +
	// 			"</td><td>" +
	// 			nombreProducto +
	// 			"</td><td>" +
	// 			precio +
	// 			"€</td>";
	// 	}
	// }

	let tr = document.createElement("tr");
	tabla.append(tr);

	tr.innerHTML =
		"<td><button class = 'boton' onClick = 'AñadirUnidad()'>+</button> <button class = 'boton' onClick = 'QuitarUnidad()'>-</button></td><td>" +
		unidades +
		"</td><td>" +
		IdTabla +
		"</td><td>" +
		nombreProducto +
		"</td><td>" +
		precio +
		"€</td>";
}

//nose puede repetir el mismo producto en la misma cuenta
function ComprobarProducto(value) {
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);

	let gestor = Gestores[NumeroMesa - 1];
	if (gestor === undefined) {
		gestor = new Gestor(NumeroMesa);
		Gestores[NumeroMesa - 1] = gestor;
	}

	for (let i = 0; i < Gestores[NumeroMesa - 1].cuentas.length; i++) {
		for (let j = 0; j < Gestores[NumeroMesa - 1].cuentas[i].lineasCuenta.length; j++) {
			if (Gestores[NumeroMesa - 1].cuentas[i].lineasCuenta[j].IdTabla == value) {
				return true;
			}
		}
	}
	return false;
}
