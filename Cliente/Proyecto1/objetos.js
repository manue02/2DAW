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
}

function AltaUsuario(ClienteP) {
	if (this.clientes.some((ClienteP) => Cliente.idCliente == Cliente.ClienteP)) {
		alert("El usuario ya existe");
	} else {
		this.Cliente.push(this.ClienteP);
		alert("El usuario se a añadido");
	}
}

function AltaAlojamiento(alojamientosP) {
	if (this.Alojamineto.some((AlojaminetoP) => Alojamineto.idAlojamiento == Alojamineto.alojamientosP)) {
		alert("El alojamiento ya existe");
	} else {
		this.Alojamineto.push(this.alojamientosP);
		alert("El alojamiento se a añadido");
	}
}

function AltaReserva(reservasP) {
	if (this.Reserva.some((ReservaP) => Reserva.idReserva == Reserva.reservasP)) {
		alert("La reserva ya exite");
	} else {
		this.Reserva.push(this.reservasP);
		alert("La reserva se a añadido");
	}
}
