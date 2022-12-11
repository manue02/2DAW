class Alojamineto {
	#idAlojamiento;
	#numPersonas;

	constructor(idAlojamiento, numPersonas) {
		this.#idAlojamiento = idAlojamiento;
		this.#numPersonas = numPersonas;
	}

	get idAlojamiento() {
		return this.#idAlojamiento;
	}
	set idAlojamiento(value) {
		this.#idAlojamiento = value;
	}

	get numPersonas() {
		return this.#numPersonas;
	}

	set numPersonas(value) {
		this.#numPersonas = value;
	}

	toHTMLRow() {
		let fila = "<table border='1'><thead><tr><th>id Alojamiento</th><th>Numero de personas</th></thead><tbody>";

		fila += "<td>" + this.idAlojamiento + "</td>";
		fila += "<td>" + this.numPersonas + "</td></tr>";
		return fila;
	}
}

class Habitacion extends Alojamineto {
	#desayuno;

	constructor(idAlojamiento, numPersonas, desayuno) {
		super(idAlojamiento, numPersonas);
		this.#desayuno = desayuno;
	}
	get desayuno() {
		return this.#desayuno;
	}
	set desayuno(value) {
		this.#desayuno = value;
	}

	toHTMLRow() {
		let fila = super.toHTMLRow();
		fila = fila.slice(0, fila.length - 5);
		fila += "<td>" + " Desayuno " + this.desayuno + "</td></tr>";
		return fila;
	}
}

class Apartamento extends Alojamineto {
	#parking;
	#dormitorios;

	constructor(idAlojamiento, numPersonas, dormitorios, parking) {
		super(idAlojamiento, numPersonas);
		this.#parking = parking;
		this.#dormitorios = dormitorios;
	}

	get parking() {
		return this.#parking;
	}
	set parking(value) {
		this.#parking = value;
	}

	get dormitorios() {
		return this.#dormitorios;
	}
	set dormitorios(value) {
		this.#dormitorios = value;
	}

	toHTMLRow() {
		let fila = super.toHTMLRow();
		fila = fila.slice(0, fila.length - 5);
		fila += "<td>" + this.dormitorios + "</td>";
		fila += "<td>" + this.parking + "</td></tr>";
		return fila;
	}
}

class Cliente {
	#dni;
	#nombre;
	#apellidos;
	#usuario;
	constructor(dni, nombre, apellidos, usuario) {
		this.#dni = dni;
		this.#nombre = nombre;
		this.#apellidos = apellidos;
		this.#usuario = usuario;
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
	get usuario() {
		return this.#usuario;
	}
	set usuario(value) {
		this.#usuario = value;
	}
	toHTMLRow() {
		let fila = "<tr>";
		fila += "<td>" + this.dni + "</td>";
		fila += "<td>" + this.apellidos + "</td>";
		fila += "<td>" + this.nombre + "</td>";
		fila += "<td>" + this.usuario + "</td></tr>";
		return fila;
	}
}

class Reserva {
	#idReserva;
	#cliente;
	#alojamientos;
	#fechaInicio;
	#fechaFin;

	constructor(idReserva, cliente, alojamientos, fechaInicio, fechaFin) {
		this.#idReserva = idReserva;
		this.#cliente = cliente;
		this.#alojamientos = [];
		this.#fechaInicio = fechaInicio;
		this.#fechaFin = fechaFin;
	}

	get idReserva() {
		return this.#idReserva;
	}
	set idReserva(value) {
		this.#idReserva = value;
	}

	get cliente() {
		return this.#cliente;
	}
	set cliente(value) {
		this.#cliente = value;
	}

	get alojamientos() {
		return this.#alojamientos;
	}
	set alojamientos(value) {
		this.#alojamientos = value;
	}

	get fechaInicio() {
		return this.#fechaInicio;
	}
	set fechaInicio(value) {
		this.#fechaInicio = value;
	}

	get fechaFin() {
		return this.#fechaFin;
	}
	set fechaFin(value) {
		this.#fechaFin = value;
	}
}

class Agencia {
	#clientes;
	#reservas;
	#alojamientos;

	constructor() {
		this.#clientes = [];
		this.#reservas = [];
		this.#alojamientos = [];
	}

	get clientes() {
		return this.#clientes;
	}
	set clientes(value) {
		this.#clientes = value;
	}

	get reservas() {
		return this.#reservas;
	}
	set reservas(value) {
		this.#reservas = value;
	}

	get alojamientos() {
		return this.#alojamientos;
	}
	set alojamientos(value) {
		this.#alojamientos = value;
	}

	AltaCliente(Cliente) {
		let mensajeSalida = "";
		if (this.clientes.filter((elem) => elem.dni == Cliente.dni).length != 0) {
			mensajeSalida = "Cliente registrada previamente";
		} else {
			this.clientes.push(Cliente);
			mensajeSalida = "Alta Cliente OK";
		}
		return mensajeSalida;
	}

	listadoClientes() {
		let salida = "<table border='1'><thead><tr><th>DNI</th><th>Apellidos</th><th>Nombre</th><th>Usuario</th></thead><tbody>";
		for (let Cliente of this.clientes) {
			salida += Cliente.toHTMLRow();
		}

		return salida + "</tbody></table>";
	}

	AltaAlojamiento(Alojamineto) {
		let mensajeSalida = "";
		if (this.alojamientos.filter((elem) => elem.idAlojamiento == Alojamineto.idAlojamiento).length != 0) {
			mensajeSalida = "Alojamiento registrado previamente";
		} else {
			this.alojamientos.push(Alojamineto);
			mensajeSalida = "Alta Alojamiento OK";
		}
		return mensajeSalida;
	}

	siguienteCodigoAlojamiento() {
		if (this.alojamientos.length == 0) {
			return 1;
		} else {
			return this.alojamientos[this.alojamientos.length - 1].idAlojamiento + 1;
		}
	}

	ListadoAlojamiento() {
		let salida = "<table border='1'><thead><tr><th>Tipo de alojamiento</th><th>id Alojamiento</th><th>Numero de personas</th><th>Desayuno</th><th>Parking</th><th>Dormitorios</th></thead><tbody>";

		for (let alo of this.alojamientos) {
			salida += this.addFilaListaAlojamiento(alo);
		}

		return salida + "</tbody></table>";
	}

	addFilaListaAlojamiento(alo) {
		let fila = "<tr>";
		fila += "<td>" + alo.constructor.name + "</td>";
		fila += "<td>" + alo.idAlojamiento + "</td>";
		fila += "<td>" + alo.numPersonas + "</td>";
		fila += "<td>" + (alo instanceof Habitacion ? alo.desayuno + "" : "") + "</td>";
		fila += "<td>" + (alo instanceof Apartamento ? alo.parking + "" : "") + "</td>";
		fila += "<td>" + (alo instanceof Apartamento ? alo.dormitorios + "" : "") + "</td>";
		return fila;
	}
	AltaReserva(Reserva) {
		let mensajeSalida = "";
		if (this.reservas.filter((elem) => elem.idReserva == Reserva.idReserva).length != 0) {
			mensajeSalida = "Alojamiento registrado previamente";
		} else {
			this.reservas.push(Reserva);
			mensajeSalida = "Alta Alojamiento OK";
		}
		return mensajeSalida;
	}

	BajaReserva(idReserva) {
		let mensajeSalida = "";
		if (this.reservas.filter((elem) => elem.idReserva == Reserva.idReserva).length != 0) {
			this.reservas.remove(idReserva);
			mensajeSalida = "Reserva encontrada y eliminada";
		} else {
			mensajeSalida = "No se a encontrado la reserva";
		}
		return mensajeSalida;
	}

	siguienteCodigoReservas() {
		if (this.reservas.length == 0) {
			return 1;
		} else {
			return this.reservas[this.reservas.length - 1].idReserva + 1;
		}
	}

	ListadoReservas(fechaInicio, fechaFin) {
		let salida = "<table border='1'><thead><tr><th>idReserva</th><th>Cliente</th><th>Alojamientos</th><th>fechaInicio</th><th>fechaFin</th></thead><tbody>";
		fechaInicioGlobal = date.parse(fechaInicio);
		fechaFinGlobal = date.parse(fechaFin);

		for (let Reserva of this.reservas) {
			fechafinConcreta = date.parse(this.reservas.fechaFin);
			fechaInicioConcreta = date.parse(this.reservas.fechaInicio);
			if (fechaInicioGlobal > fechaInicioConcreta && fechaFinGlobal < fechafinConcreta) {
				salida += Reserva.toHTMLRow();
			}
		}
		return salida + "</tbody></table>";
	}

	ListadoReservasClientes(idCliente) {
		for (let Reserva of this.reservas) {
			for (let Cliente of this.clientes) {
				if (idCliente == Cliente.DniCliente) {
					salida += Reserva.toHTMLRow();
				}
			}
		}
	}

	ListadoHabitacionesDesayuno() {
		let salida = "";

		for (let Alojamiento of this.alojamientos) {
			let sDesayuno = frmAltaAlojamiento.rbtTipoDesayuno.value;
			if (sDesayuno == "Si") {
				salida += Alojamiento.toHTMLRow() + "<br>";
			}
		}
		return salida;
	}

	buscarCliente(DniCliente) {
		let i = 0,
			encontrado = false;
		while (i < this.clientes.length && !encontrado) {
			if (this.clientes[i].dni == DniCliente) {
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

	listadoFiltroClientes(dniCliente) {
		let salida = "<table border='1'><thead><tr><th>DNI</th><th>Apellidos</th><th>Nombre</th><th>Usuario</th></thead><tbody>";
		for (let Cliente of this.clientes) {
			if (this.clientes.dni == this.buscarCliente(dniCliente)) {
				salida += Cliente.toHTMLRow();
			}
		}

		return salida + "</tbody></table>";
	}
}
