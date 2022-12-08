class Arbol {
	#codigo;
	#tallaje;
	#especie;
	constructor(codigo, tallaje, especie) {
		this.#codigo = codigo;
		this.#tallaje = tallaje;
		this.#especie = especie;
	}
	get codigo() {
		return this.#codigo;
	}

	set codigo(codigo) {
		this.#codigo = codigo;
	}
	get tallaje() {
		return this.#tallaje;
	}

	set tallaje(tallaje) {
		this.#tallaje = tallaje;
	}
	get especie() {
		return this.#especie;
	}

	set especie(especie) {
		this.#especie = especie;
	}

	toHTMLRow() {
		let fila = "<tr>";
		fila += "<td>" + this.codigo + "</td>";
		fila += "<td>" + this.tallaje + "</td>";
		fila += "<td>" + this.especie + "</td></tr>";
		return fila;
	}
}

class Perenne extends Arbol {
	#frutal;
	constructor(codigo, tallaje, especie, frutal) {
		super(codigo, tallaje, especie);
		this.#frutal = frutal;
	}

	get frutal() {
		return this.#frutal;
	}

	set frutal(frutal) {
		this.#frutal = frutal;
	}

	toHTMLRow() {
		let fila = super.toHTMLRow();
		fila = fila.replace("</tr>", ""); //Quita el cierre de la etiqueta del padre
		fila += "<td>" + (this.frutal ? "SI" : "NO") + "</td></tr>";
		return fila;
	}
}

class Caduco extends Arbol {
	#mesFloracion;
	constructor(codigo, tallaje, especie, mesFloracion) {
		super(codigo, tallaje, especie);
		this.#mesFloracion = mesFloracion;
	}

	get mesFloracion() {
		return this.#mesFloracion;
	}

	set mesFloracion(mesFloracion) {
		this.#mesFloracion = mesFloracion;
	}

	toHTMLRow() {
		let fila = super.toHTMLRow();
		fila = fila.replace("</tr>", ""); //Quita el cierre de la etiqueta del padre
		fila += "<td>" + this.mesFloracion + "</td></tr>";
		return fila;
	}
}

class Vivero {
	#arboles;
	constructor() {
		this.#arboles = [];
	}

	get arboles() {
		return this.#arboles;
	}

	set arboles(arboles) {
		this.#arboles = arboles;
	}

	altaArbol(arbol) {
		/*let i = 0,
      encontrado = false;
    while (i < this.arboles.length && !encontrado) {
      if (this.arboles[i].codigo == arbol.codigo) {
        encontrado = true;
      } else {
        i++;
      }
    }*/

		let encontrado = this.arboles.filter((elem) => elem.codigo == arbol.codigo).length == 1;

		if (!encontrado) {
			this.arboles.push(arbol);
			return true;
		} else {
			return false;
		}
	}

	siguienteCodigoArbol() {
		if (this.arboles.length == 0) {
			return 1;
		} else {
			return this.arboles[this.arboles.length - 1].codigo + 1;
		}
	}
}
