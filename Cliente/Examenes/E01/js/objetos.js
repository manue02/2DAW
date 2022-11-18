class Arbol {
	#codigo;
	#tallaje;
	#especie;

	constructor(codigo, tallaje, especie) {
		this.#codigo = codigo;
		this.#tallaje = tallaje;
		this.#especie = especie;
	}

	get especie() {
		return this.#especie;
	}
	set especie(value) {
		this.#especie = value;
	}
	get codigo() {
		return this.#codigo;
	}
	set codigo(value) {
		this.#codigo = value;
	}
	get tallaje() {
		return this.#tallaje;
	}
	set tallaje(value) {
		this.#tallaje = value;
	}

	toHTMLRow() {
		salida = "<tr><td>" + this.codigo + "<tr><td>" + "<tr><td>" + this.tallaje + "<tr><td>" + "<tr><td>" + this.especie + "<tr><td>";
		return salida;
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
	set frutal(value) {
		this.#frutal = value;
	}

	toHTMLRow() {
		salidaPadre = super.toHTMLRow;
		salida = salidaPadre.replace("</tr>", "") + "<td>" + this.frutal ? "SI" : "NO" + "<tr><td>";
		return salida;
	}
}
