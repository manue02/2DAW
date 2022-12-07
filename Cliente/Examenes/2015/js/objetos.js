class Colaborador {
	#dni;
	#nombre;
	#apellidos;
	constructor(dni, nombre, apellidos) {
		this.#dni = dni;
		this.#nombre = nombre;
		this.#apellidos = apellidos;
	}
	get apellidos() {
		return this.#apellidos;
	}
	set apellidos(value) {
		this.#apellidos = value;
	}
	get nombre() {
		return this.#nombre;
	}
	set nombre(value) {
		this.#nombre = value;
	}
	get dni() {
		return this.#dni;
	}
	set dni(value) {
		this.#dni = value;
	}
	toHTMLRow() {
		let fila = "<tr>";
		fila += "<td>" + this.dni + "</td>";
		fila += "<td>" + this.apellidos + "</td>";
		fila += "<td>" + this.nombre + "</td></tr>";
		return fila;
	}
}

class Albergue {
	#mascotas;
	#colaboradores;
	#movimientos;
	constructor() {
		this.#mascotas = [];
		this.#colaboradores = [];
		this.#movimientos = [];
	}
	get movimientos() {
		return this.#movimientos;
	}
	set movimientos(value) {
		this.#movimientos = value;
	}
	get colaboradores() {
		return this.#colaboradores;
	}
	set colaboradores(value) {
		this.#colaboradores = value;
	}
	get mascotas() {
		return this.#mascotas;
	}
	set mascotas(value) {
		this.#mascotas = value;
	}

	altaColaborador(colaborador) {
		let mensajeSalida = "";
		if (this.colaboradores.filter((elem) => elem.dni == colaborador.dni).length != 0) {
			mensajeSalida = "Colaborador registrado previamente";
		} else {
			this.colaboradores.push(colaborador);
			mensajeSalida = "Alta colaborador OK";
		}
		return mensajeSalida;
	}

	listadoColaboradores() {
		let salida = "<table border='1'><thead><tr><th>DNI</th><th>Apellidos</th><th>Nombre</th></thead><tbody>";
		// Ordenamos alfabéticamente por apellidos y nombre
		this.colaboradores.sort((c1, c2) => (c1.apellidos.localeCompare(c2.apellidos) == 0 ? c1.nombre.localeCompare(c2.nombre) : c1.apellidos.localeCompare(c2.apellidos)));
		console.log(this.colaboradores);
		for (let Colaborador of this.colaboradores) {
			salida += Colaborador.toHTMLRow();
		}
		return salida + "</tbody></table>";
	}
}
