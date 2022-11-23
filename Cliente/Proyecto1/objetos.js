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
}

class Habitacion extends Alojamineto {
	#desayuno;

	constructor(desayuno) {
		this.#desayuno = desayuno;
	}

	get desayuno() {
		return this.#desayuno;
	}
	set desayuno(value) {
		this.#desayuno = value;
	}
}

class Apartamento extends Alojamineto {
	#parking;
	#dormitorios;

	constructor(parking, dormitorios) {
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
	#idCliente;
	#Apellidos;
	#usuario;

	constructor(nombre, idCliente, Apellidos, usuario) {
		this.#nombre = nombre;
		this.#idCliente = idCliente;
		this.#Apellidos = Apellidos;
		this.#usuario = usuario;
	}

	get idCliente() {
		return this.#idCliente;
	}
	set idCliente(value) {
		this.#idCliente = value;
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
		this.#clientes = clientes;
		this.#reservas = reservas;
		this.#alojamientos = alojamientos;
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
}
