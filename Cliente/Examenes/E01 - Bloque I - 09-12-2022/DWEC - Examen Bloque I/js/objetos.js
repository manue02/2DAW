class Electrodomesticos {
	#Nombre;
	#Precio;

	constructor(Nombre, Precio) {
		this.#Nombre = Nombre;
		this.#Precio = Precio;
	}

	get Nombre() {
		return this.#Nombre;
	}
	set Nombre(value) {
		this.#Nombre = value;
	}

	get Precio() {
		return this.#Precio;
	}

	set Precio(value) {
		this.#Precio = value;
	}
}

class Televisor extends Electrodomesticos {
	#Pulgadas;
	#FullHD;

	constructor(Nombre, Precio, Pulgadas, FullHD) {
		super(Nombre, Precio);
		this.#Pulgadas = Pulgadas;
		this.#FullHD = FullHD;
	}
	get Pulgadas() {
		return this.#Pulgadas;
	}
	set Pulgadas(value) {
		this.#Pulgadas = value;
	}

	get FullHD() {
		return this.#FullHD;
	}
	set FullHD(value) {
		this.#FullHD = value;
	}
	toHTMLRow() {
		let fila = "<table border='1'><thead><tr><th>Pulgadas</th><th>FullHD</th></thead><tbody>";

		fila += "<td>" + this.Pulgadas + "</td>";
		fila += "<td>" + this.FullHD + "</td></tr>";
		return fila;
	}
}

class Lavadora extends Electrodomesticos {
	#Carga;

	constructor(Nombre, Precio, Carga) {
		super(Nombre, Precio);
		this.#Carga = Carga;
	}
	get Carga() {
		return this.#Carga;
	}
	set Carga(value) {
		this.#Carga = value;
	}

	toHTMLRow() {
		let fila = "<table border='1'><thead><tr><th>Carga</th></thead><tbody>";

		fila += "<td>" + this.Carga + "</td></tr>";
		return fila;
	}
}

class StokProducto {
	#Electrodomestico;
	#Stock;
	constructor(Electrodomestico, Stock) {
		this.#Electrodomestico = Electrodomestico;
		this.#Stock = Stock;
	}
	get Stock() {
		return this.#Stock;
	}
	set Stock(value) {
		this.#Stock = value;
	}
	get Electrodomestico() {
		return this.#Electrodomestico;
	}
	set Electrodomestico(value) {
		this.#Electrodomestico = value;
	}

	toHTMLRow() {
		let fila = "<table border='1'><thead><tr><th>Electrodomestico</th><th>Stock</th></thead><tbody>";

		fila += "<td>" + this.Electrodomestico + "</td>";
		fila += "<td>" + this.Stock + "</td></tr>";
		return fila;
	}
}

class Almacen {
	#catalogo;
	#Stock;

	constructor() {
		this.#catalogo = [];
		this.#Stock = [];
	}

	get catalogo() {
		return this.#catalogo;
	}
	set catalogo(value) {
		this.#catalogo = value;
	}

	get Stock() {
		return this.#Stock;
	}
	set Stock(value) {
		this.#Stock = value;
	}

	AltaCatalago(oElectro) {
		let mensajeSalida = "";
		if (this.catalogo.filter((elem) => elem.Nombre == oElectro.Nombre).length != 0) {
			mensajeSalida = "Catalogo registrado previamente";
		} else {
			this.catalogo.push(oElectro);
			mensajeSalida = "Alta Catalago OK";
		}
		return mensajeSalida;
	}

	ListadoCatalogo() {
		let salida = "<table border='1'><thead><tr><th>Nombre</th><th>Precio</th><th>Electrodomesticos</th><th>Pulgadas</th><th>Full HD</th><th>Carga</th></thead><tbody>";

		for (let alo of this.catalogo) {
			salida += this.addFilaListaCatalogo(alo);
		}

		return salida + "</tbody></table>";
	}

	addFilaListaCatalogo(alo) {
		let fila = "<tr>";
		fila += "<td>" + alo.Nombre + "</td>";
		fila += "<td>" + alo.Precio + "</td>";
		fila += "<td>" + (alo instanceof Televisor ? alo.Pulgadas + "" : "") + "</td>";
		fila += "<td>" + (alo instanceof Televisor ? alo.FullHD + "" : "") + "</td>";
		fila += "<td>" + (alo instanceof Lavadora ? alo.Carga + "" : "") + "</td>";
		return fila;
	}

	buscarNombre(Nombre) {
		let i = 0,
			encontrado = false;
		while (i < this.Stock.length && !encontrado) {
			if (this.Stock[i].Nombre == Nombre) {
				encontrado = true;
			} else {
				i++;
			}
		}
		if (encontrado) {
			return i;
		} else {
			return -1;
		}
	}

	EntradaDeStock(Nombre, Unidades) {
		let mensajeSalida = "";
		let posicion = this.buscarNombre(Nombre);
		if (posicion < 0) {
			mensajeSalida += "Electrodomestico no registrado";
		} else if (this.Stock[posicion].Unidades > 0) {
			mensajeSalida += "Las unidades tiene que ser mayor a 0";
		} else {
			this.Stock[posicion].Unidades = Unidades;
			mensajeSalida += "Correcto, Electrodomestico actualizado ";
		}
		return mensajeSalida;
	}

	SalidaDeStock(Nombre, Unidades) {
		let mensajeSalida = "";
		let iUnidades = parseInt(frmEntradaStock.txtUnidades.value.trim());

		let posicion = this.buscarNombre(Nombre);
		if (posicion < 0) {
			mensajeSalida += "Electrodomestico no registrado";
		} else if (this.Stock[posicion].Unidades > 0) {
			mensajeSalida += "Las unidades tiene que ser mayor a 0";
		} else {
			this.Stock[posicion].Unidades = Unidades - iUnidades;
			mensajeSalida += "Correcto, Electrodomestico eliminado y actualizado ";
		}
		return mensajeSalida;
	}

	ListarListadoStock() {}
}
