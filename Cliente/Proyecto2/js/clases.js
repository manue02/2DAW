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

	get IdProducto() {
		return this.#idProducto;
	}

	set IdProducto(idProducto) {
		this.#idProducto = idProducto;
	}

	get NombreProducto() {
		return this.#nombreProducto;
	}

	set NombreProducto(nombreProducto) {
		this.#nombreProducto = nombreProducto;
	}

	get PrecioUnidad() {
		return this.#precioUnidad;
	}

	set PrecioUnidad(precioUnidad) {
		this.#precioUnidad = precioUnidad;
	}

	get IdCategoria() {
		return this.#idCategoria;
	}

	set IdCategoria(idCategoria) {
		this.#idCategoria = idCategoria;
	}
}

class Catalogo {
	#productos;

	constructor() {
		this.#productos = [];
	}

	get productos() {
		return this.#productos;
	}

	set productos(productos) {
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

	get Unidades() {
		return this.#unidades;
	}

	set Unidades(unidades) {
		this.#unidades = unidades;
	}

	get IdProducto() {
		return this.#idProducto;
	}

	set IdProducto(idProducto) {
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

	get Mesa() {
		return this.#mesa;
	}

	set Mesa(mesa) {
		this.#mesa = mesa;
	}

	get LineasDeCuenta() {
		return this.#lineasDeCuenta;
	}

	set LineasDeCuenta(lineasDeCuenta) {
		this.#lineasDeCuenta = lineasDeCuenta;
	}

	get Pagada() {
		return this.#pagada;
	}

	set Pagada(pagada) {
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

	get cuentas() {
		return this.#cuentas;
	}

	set cuentas(cuentas) {
		this.#cuentas = cuentas;
	}

	get mesaActual() {
		return this.#mesaActual;
	}

	set mesaActual(mesaActual) {
		this.#mesaActual = mesaActual;
	}
}
