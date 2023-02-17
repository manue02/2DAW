// Variables globales
let mesaActual = 0;
let cuentasCerradas = [];

// Función que carga los productos desde la base de datos
async function cargarProductos() {
	try {
		const response = await fetch("url_de_la_api/productos");
		const data = await response.json();
		return data;
	} catch (error) {
		console.log("Error al cargar los productos: ", error);
	}
}

// Función que actualiza el listado de productos en el formulario
function actualizarListadoProductos(listaProductos) {
	const frmControles = document.getElementById("frmControles");
	const categoria = frmControles.categorias.value;
	const productos = listaProductos.filter((producto) => producto.categoria === categoria);

	// Limpiamos el listado actual
	borrarCombo(frmControles.productos);

	// Actualizamos el listado de productos
	productos.forEach((producto) => {
		const option = document.createElement("option");
		option.value = producto.id;
		option.text = producto.nombre;
		frmControles.productos.add(option);
	});
}

// Función que actualiza el precio del producto en la interfaz
function actualizarPrecio() {
	const frmControles = document.getElementById("frmControles");
	const listaProductos = JSON.parse(localStorage.getItem("productos"));
	const productoSeleccionado = listaProductos.find((producto) => producto.id === parseInt(frmControles.productos.value));
	frmControles.precio.value = productoSeleccionado.precio;
}

// Función que añade un nuevo producto a la base de datos

// Función que actualiza el precio de un producto existente en la base de datos
async function actualizarPrecioProducto(id, precio) {
	try {
		const response = await fetch(`url_de_la_api/productos/${id}`, {
			method: "PUT",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ precio }),
		});

		if (response.ok) {
			const data = await response.json();
			return data;
		} else {
			throw new Error("Error al actualizar el precio del producto");
		}
	} catch (error) {
		console.log(error);
	}
}

// Función que añade una nueva línea a la cuenta actual
async function anadirLinea(idProducto, cantidad) {
	try {
		const response = await fetch(`url_de_la_api/mesas/${mesaActual}`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ idProducto, cantidad }),
		});
	} catch (error) {
		console.log(error);
	}
}

// Función que actualiza la cantidad de un producto en la cuenta actual
async function actualizarCantidadLinea(idProducto, cantidad) {
	try {
		const response = await fetch(`url_de_la_api/mesas/${mesaActual}`, {
			method: "PUT",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ idProducto, cantidad }),
		});
	} catch (error) {
		console.log(error);
	}
}

// Función que elimina una línea de la cuenta actual
async function eliminarLinea(idProducto) {
	try {
		const response = await fetch(`url_de_la_api/mesas/${mesaActual}`, {
			method: "DELETE",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ idProducto }),
		});
	} catch (error) {
		console.log(error);
	}
}

// Función que cierra la cuenta actual
async function cerrarCuenta() {
	try {
		const response = await fetch(`url_de_la_api/mesas/${mesaActual}`, {
			method: "DELETE",
		});
	} catch (error) {
		console.log(error);
	}
}

// Función que carga los datos de una mesa
async function cargarMesa(mesa) {
	try {
		const response = await fetch(`url_de_la_api/mesas/${mesa}`);
		const data = await response.json();
		return data;
	} catch (error) {
		console.log(error);
	}
}

// borra el contenido de un combo
function borrarCombo(combo) {
	while (combo.length > 0) {
		combo.remove(0);
	}
}

Object.entries(listaProductos).forEach(([key, value]) => {
	const option = document.createElement("option");
	option.value = value.id;
	option.text = value.nombre;
	if (value.categoria === categoria) {
		frmControles.productos.add(option);
	}

	console.log(value.categoria);
});
