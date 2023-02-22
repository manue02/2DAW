// Sugerencia de categorias y productos

let catalogo = new Catalogo();
let arrayProductos = [];
let Gestores = new Array(9);
let contador = 0;
const apiRest = "https://primerproyecto-34e1f-default-rtdb.asia-southeast1.firebasedatabase.app/";
arrayProductos = catalogo.productos;

frmControles.categorias.addEventListener("change", CategoriaSeleccionada);
frmNuevoProducto.addEventListener("submit", insertarProducto);
frmModificarProducto.addEventListener("submit", actualizarPrecioProducto);

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

function CargarProductos(listaProductos) {
	for (let p of listaProductos) {
		catalogo.addProducto(p.id, p.nombre, p.precio, p.categoria);
	}

	Object.entries(listaProductos).forEach(([key, TodosProducots]) => {
		let lista = document.createElement("option");
		lista.innerHTML = TodosProducots.nombre;
		lista.value = TodosProducots.id;
		frmModificarProducto.Nombre_categoria.add(lista);
	});
}

//mostrar los productos en el combo de productos en funcion de la categoria seleccionada en el combo de categorias

function MostrarCategorias(listaCategorias) {
	BorrarCombo();

	const frmControles = document.getElementById("frmControles");

	const frmNuevoProducto = document.getElementById("frmNuevoProducto");

	for (let categoria of listaCategorias) {
		let lista = document.createElement("option");
		lista.innerHTML = categoria;
		frmControles.categorias.add(lista);
		frmNuevoProducto.categoria.add(lista.cloneNode(true));
	}
}

function getCategoriaIndex(categoria) {
	switch (categoria) {
		case "Bebidas":
			return 0;
		case "Tostadas":
			return 1;
		case "Bollería":
			return 2;
	}
}

function CategoriaSeleccionada() {
	BorrarCombo();
	let categoria = frmControles.categorias.value;

	for (let i = 0; i < arrayProductos.length; i++) {
		if (getCategoriaIndex(categoria) == arrayProductos[i].IdCategoria) {
			let oOption = document.createElement("option");
			oOption.setAttribute("id", "ComboProductos");
			oOption.text = arrayProductos[i].NombreProducto;
			frmControles.productos.add(oOption);
		}
	}
}

function recuperarDatosProducto() {
	const ficheroProductos = "productos.json";
	fetch(apiRest + ficheroProductos)
		.then((res) => res.json())
		.then((data) => Object.values(data))
		.then(CargarProductos);
}

function recuperarDatoscCategoria() {
	const ficheroCategoria = "categorias.json";
	fetch(apiRest + ficheroCategoria)
		.then((res) => res.json())
		.then((data) => Object.values(data))
		.then(MostrarCategorias);
}

//colorear todas las mesas libres
function colorearMesasLibres() {
	let mesas = document.getElementsByClassName("mesa");
	for (let i = 0; i < mesas.length; i++) {
		mesas[i].classList.add("libre");
	}

	recuperarDatoscCategoria();

	recuperarDatosProducto();

	let cuenta = document.getElementById("cuenta");
	//poner un texto en el div cuenta

	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + 1 + "</h2>";

	setTimeout(CategoriaSeleccionada, 1000);
}

//al hacer click en el boton de liberar mesa  se vuelve a colorear la mesa de verde
function liberarMesa() {
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let cuenta = document.getElementById("cuenta");
	let NumeroMesa = mesa.substring(5, 6);
	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + NumeroMesa + "</h2>";
	let rojo = document.getElementsByClassName("mesa");
	rojo[NumeroMesa - 1].classList.remove("ocupada");

	let ficheroMesas = "cuentas/Mesa" + NumeroMesa + ".json";
	fetch(apiRest + ficheroMesas, {
		method: "DELETE",
	})
		.then((res) => res.json())
		.then((data) => console.log(data));

	console.log(apiRest + ficheroMesas);
}
async function insertarProducto(event) {
	const ficheroProductos = "productos/";
	const frmNuevoProducto = document.getElementById("frmNuevoProducto");
	const nombre = frmNuevoProducto.nombre.value.trim();
	const precio = frmNuevoProducto.precio.value;
	let categorias = frmNuevoProducto.categoria.value;
	let categoria = getCategoriaIndex(categorias);
	event.preventDefault();

	try {
		const response = await fetch(apiRest + ficheroProductos + ".json");
		//los datos JSON devueltos por el servidor.
		const data = await response.json();
		console.log(data);
		const lastProduct = data[data.length - 1];
		console.log(lastProduct);
		const lastId = lastProduct.id;
		console.log(lastId);

		// incrementar el ID en 1
		const nextId = lastId + 1;

		console.log(nextId);

		// crear el nuevo producto
		const nuevoProducto = {
			id: nextId,
			categoria: categoria,
			nombre: nombre,
			precio: precio,
		};

		console.log(nuevoProducto);

		// enviar el nuevo producto al servidor
		const postResponse = await fetch(apiRest + ficheroProductos + lastId + ".json", {
			method: "PUT",
			headers: {
				"Content-Type": "application/json;charset=utf-8",
			},
			body: JSON.stringify(nuevoProducto),
		});

		await postResponse.json();

		// actualizar el combo de productos
		recuperarDatosProducto();
	} catch (error) {
		console.error(error);
	}

	// limpiar el formulario
	frmNuevoProducto.reset();

	setTimeout(CategoriaSeleccionada, 1000);
}

async function actualizarPrecioProducto(event) {
	event.preventDefault();
	let datos = { precio: 0 };
	const frmModificarProducto = document.getElementById("frmModificarProducto");
	const nombre = frmModificarProducto.Nombre_categoria.value;
	const precio = frmModificarProducto.precio.value;

	let id = nombre - 1;

	let url = apiRest + "productos" + "/" + id + ".json";

	datos.precio = precio;
	try {
		const response = await fetch(url, {
			method: "PATCH",
			headers: {
				"Content-Type": "application/json;charset=utf-8",
			},
			body: JSON.stringify(datos),
		});

		await response.json();
	} catch (error) {
		console.error(error);
	}

	//limpiar el formulario
	frmModificarProducto.reset();

	//actualizar el combo de productos
	recuperarDatosProducto();

	setTimeout(CategoriaSeleccionada, 1000);
}

//hacer que al hacer click en una mesa se muestre la mesa seleccionada en el div cuenta

function seleccionarMesa() {
	let mesa = this;
	let cuenta = document.getElementById("cuenta");
	//poner un texto en el div cuenta
	if (mesa.classList.contains("ocupada")) {
		setTimeout(pintarMesaSeleccionada(mesa.innerHTML), 1000);
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
	for (lista of arrayProductos) {
		if (lista.NombreProducto == value) {
			return lista;
		}
	}
}

function unidadesProducto() {
	let Teclado = this.value;
	let cuenta = document.getElementById("cuenta");
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);

	let nombreProducto = frmControles.productos.value;
	console.log(nombreProducto);

	let ArrayDeidProducto = [];
	ArrayDeidProducto = BuscarUnIdProducto(nombreProducto);

	console.log(ArrayDeidProducto);

	let resultadoID = ArrayDeidProducto.IdProducto;
	let resultadoPrecio = ArrayDeidProducto.PrecioUnidad;

	precioTotalUnidad = resultadoPrecio * Teclado;

	precioTotalUnidad = precioTotalUnidad.toFixed(2);

	let salto = document.createElement("br");
	cuenta.append(salto);

	let rojo = document.getElementsByClassName("mesa");
	rojo[NumeroMesa - 1].classList.add("ocupada");

	let insertarUnidades = { unidades: Teclado, IdProducto: resultadoID, nombre: nombreProducto, precioTotal: precioTotalUnidad };

	fetch(apiRest + "cuentas/" + "Mesa" + NumeroMesa + "/" + resultadoID + ".json", {
		method: "PUT",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify(insertarUnidades),
	})
		.then((response) => response.json())
		.then((data) => console.log(data));

	if (Gestores[NumeroMesa - 1] != undefined) {
		for (let i = 0; i < Gestores[NumeroMesa - 1].cuentas.length; i++) {
			for (let j = 0; j < Gestores[NumeroMesa - 1].cuentas[i].lineasDeCuenta.length; j++) {
				if (Gestores[NumeroMesa - 1].cuentas[i].lineasDeCuenta[j].IdProducto == resultadoID) {
					return true;
				}
			}
		}
		return false;
	}

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
}

//funcion para añadir unidades a un producto de la cuenta de una mesa seleccionada y modificar el precio total
function AñadirUnidad(value) {
	let nombreProducto = document.getElementById(value).getElementsByTagName("td")[0].innerHTML;
	let unidades = document.getElementById(value).getElementsByTagName("td")[1].innerHTML;
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);
	let IdTabla = document.getElementById(value).getElementsByTagName("td")[2].innerHTML;
	let sumaUnidades = parseInt(unidades) + 1;

	let precioUnidad = document.getElementById(value).getElementsByTagName("td")[3].innerHTML;

	let precio = document.getElementById(value).getElementsByTagName("td")[4].innerHTML;
	let sumaPrecio = parseFloat(precio) * parseFloat(sumaUnidades);
	sumaPrecio = sumaPrecio.toFixed(2);

	document.getElementById(value).getElementsByTagName("td")[1].innerHTML = sumaUnidades;
	document.getElementById("cuenta").getElementsByTagName("h2")[1].innerHTML = "Total: " + sumaPrecio + "€";

	let insertarUnidadesActualizado = { unidades: sumaUnidades, IdProducto: IdTabla, nombre: nombreProducto, precioTotal: precioUnidad };

	fetch(apiRest + "cuentas/" + "Mesa" + NumeroMesa + "/" + IdTabla + ".json", {
		method: "PUT",
		headers: {
			"Content-Type": "application/json",
		},
		body: JSON.stringify({ insertarUnidadesActualizado }),
	})
		.then((response) => response.json())
		.then((data) => console.log(data));
}

//funcion para quitar unidades a un producto de la cuenta de una mesa seleccionada y modificar el precio total
function QuitarUnidad(value) {
	let mesa = document.getElementById(value).getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);

	let unidades = document.getElementById(value).getElementsByTagName("td")[1].innerHTML;
	let sumaUnidades = parseInt(unidades) - 1;

	let precio = document.getElementById(value).getElementsByTagName("td")[4].innerHTML;
	let sumaPrecio = parseFloat(precio) * parseFloat(sumaUnidades);
	sumaPrecio = sumaPrecio.toFixed(2);

	document.getElementById(value).getElementsByTagName("td")[1].innerHTML = sumaUnidades;
	document.getElementById(value).getElementsByTagName("h2")[1].innerHTML = "Total: " + sumaPrecio + "€";

	//si las unidades son 0, borrar la cuenta y pregunta por si esta seguro de querer borrarla
	if (sumaUnidades == 0) {
		let confirmar = confirm("¿Estas seguro de querer borrar la cuenta?");
		if (confirmar) {
			let cuenta = document.getElementById("cuenta");
			cuenta.innerHTML = "<h1>Cuenta</h1> <h2>" + mesa + "</h2>";
			let rojo = document.getElementsByClassName("mesa");
			rojo[NumeroMesa - 1].classList.remove("ocupada");

			fetch(apiRest + "cuentas/" + "Mesa" + NumeroMesa + ".json", {
				method: "DELETE",
				headers: {
					"Content-Type": "application/json",
				},
			})
				.then((response) => response.json())
				.then((data) => console.log(data));
		}
	}
}

function pintarMesaSeleccionada(mesa) {
	cuenta.innerHTML = "<h1>Cuenta</h1> <h2>Mesa " + mesa + "<h2>Total: 0€</h2>" + "<button class = 'boton' onClick = 'liberarMesa()'>Pagar y liberar la mesa</button>";
	fetch(apiRest + "cuentas/" + "Mesa" + mesa + ".json")
		.then((response) => response.json())
		.then((data) => {
			console.log(data);
			let cuenta = document.getElementById("cuenta");
			let total = 0;

			let tabla1 = document.createElement("table");
			tabla1.innerHTML = `
			<tr>
				<th>Producto</th>
				<th>Unidades</th>
				<th>IdProducto</th>
				<th>Precio</th>
				<th>Añadir</th>
				</tr>
			`;
			cuenta.append(tabla1);

			for (lista in data) {
				let producto = data[lista];
				console.log(lista);
				let precioTotal = producto.unidades * producto.precioTotal;
				precioTotal = precioTotal.toFixed(2);
				total += parseFloat(precioTotal);

				let tabla = document.createElement("table");
				tabla.innerHTML = `
				<tr id = ${lista}>
					<td>${producto.nombre}</td>
					<td>${producto.unidades}</td>
					<td>${producto.IdProducto}</td>
					<td>${precioTotal}</td>
					<td><button class = "boton" onClick = "AñadirUnidad(${lista})">+</button> <button class = "boton" onClick = "QuitarUnidad(${lista})">-</button></td>

				</tr>
				`;
				cuenta.append(tabla);
			}
		});
}
