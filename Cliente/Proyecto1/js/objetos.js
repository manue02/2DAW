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
		let fila = "<tr>";
		fila += "<td>" + this.idAlojamiento + "</td>";
		fila += "<td>" + this.numPersonas + "</td></tr>";
		return fila;
	}
}
class Habitacion extends Alojamineto {
	#desayuno;

	constructor(desayuno) {
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
		fila = fila.slice(0, fila.length - 5); // Para quitar el </tr>
		fila += "<td>" + this.desayuno + "</td></tr>";
		return fila;
	}
}

class Apartamento extends Alojamineto {
	#parking;
	#dormitorios;

	constructor(parking, dormitorios) {
		super(idAlojamiento, numPersonas);
		this.#dormitorios = dormitorios;
		this.#parking = parking;
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
}

class Cliente {
	#nombre;
	#DniCliente;
	#Apellidos;
	#usuario;

	constructor(nombre, DniCliente, Apellidos, usuario) {
		this.#nombre = nombre;
		this.#DniCliente = DniCliente;
		this.#Apellidos = Apellidos;
		this.#usuario = usuario;
	}

	get DniCliente() {
		return this.#DniCliente;
	}
	set DniCliente(value) {
		this.#DniCliente = value;
	}

	get nombre() {
		return this.#nombre;
	}
	set nombre(value) {
		this.#nombre = value;
	}

	get Apellidos() {
		return this.#Apellidos;
	}
	set Apellidos(value) {
		this.#Apellidos = value;
	}

	get usuario() {
		return this.#usuario;
	}
	set usuario(value) {
		this.#usuario = value;
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

	constructor(clientes, reservas, alojamientos) {
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
		if (this.clientes.filter((elem) => elem.idCliente == Cliente.idCliente).length != 0) {
			mensajeSalida = "Cliente registrada previamente";
		} else {
			this.clientes.push(Cliente);
			mensajeSalida = "Alta Cliente OK";
		}
		return mensajeSalida;
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

	listadoClientes() {
		let salida = "<table border='1'><thead><tr><th>Nombre</th><th>ID Cliente</th><th>Apellido</th><th>Usuario</th></thead><tbody>";

		for (let Cliente of this.clientes) {
			salida += Cliente.toHTMLRow();
		}
		return salida + "</tbody></table>";
	}

	listadoAlojamiento() {}

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

	listadoHabitacionesConDesayuno() {}
}
