class Producto {
	#idProducto;
	#nombreProducto;
	#precioUnidad;
	#idCategoria;

	constructor(idProducto, nombreProducto, precioUnidad, idCategoria) {
		this.#idProducto = idProducto;
		this.#nombreProducto = nombreProducto;
		this.#precioUnidad = precioUnidad;
		this.#idCategoria = idCategoria;
	}

	getIdProducto() {
		return this.#idProducto;
	}

	setIdProducto(idProducto) {
		this.#idProducto = idProducto;
	}

	getNombreProducto() {
		return this.#nombreProducto;
	}

	setNombreProducto(nombreProducto) {
		this.#nombreProducto = nombreProducto;
	}

	getPrecioUnidad() {
		return this.#precioUnidad;
	}

	setPrecioUnidad(precioUnidad) {
		this.#precioUnidad = precioUnidad;
	}

	getIdCategoria() {
		return this.#idCategoria;
	}

	setIdCategoria(idCategoria) {
		this.#idCategoria = idCategoria;
	}
}

class Catalogo {
	#productos;

	constructor() {
		this.#productos = [];
	}

	getproductos() {
		return this.#productos;
	}

	setproductos(productos) {
		this.#productos = productos;
	}

	addProducto(idProducto, nombreProducto, precioUnidad, idCategoria) {
		this.#productos.push(new Producto(idProducto, nombreProducto, precioUnidad, idCategoria));
	}
}

class LineaCuenta {
	#unidades;
	#idProducto;

	constructor(unidades, idProducto) {
		this.#unidades = unidades;
		this.#idProducto = idProducto;
	}

	getUnidades() {
		return this.#unidades;
	}

	setUnidades(unidades) {
		this.#unidades = unidades;
	}

	getIdProducto() {
		return this.#idProducto;
	}

	setIdProducto(idProducto) {
		this.#idProducto = idProducto;
	}
}

class Cuenta {
	#mesa;
	#lineasDeCuenta;
	#pagada;

	constructor(mesa) {
		this.#mesa = mesa;
		this.#lineasDeCuenta = [];
		this.#pagada = false;
	}

	getMesa() {
		return this.#mesa;
	}

	setMesa(mesa) {
		this.#mesa = mesa;
	}

	getLineasDeCuenta() {
		return this.#lineasDeCuenta;
	}

	setLineasDeCuenta(lineasDeCuenta) {
		this.#lineasDeCuenta = lineasDeCuenta;
	}

	getPagada() {
		return this.#pagada;
	}

	setPagada(pagada) {
		this.#pagada = pagada;
	}
}

class Gestor {
	#cuentas;
	#mesaActual;

	constructor() {
		this.#cuentas = [];
		this.#mesaActual = 0;
	}

	getcuentas() {
		return this.#cuentas;
	}

	setcuentas(cuentas) {
		this.#cuentas = cuentas;
	}

	getmesaActual() {
		return this.#mesaActual;
	}

	setmesaActual(mesaActual) {
		this.#mesaActual = mesaActual;
	}
}
