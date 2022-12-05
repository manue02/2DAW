class Mascota {
  #idMascota;
  #peso;
  constructor(idMascota, peso) {
    this.#idMascota = idMascota;
    this.#peso = peso;
  }
  get peso() {
    return this.#peso;
  }
  set peso(value) {
    this.#peso = value;
  }
  get idMascota() {
    return this.#idMascota;
  }
  set idMascota(value) {
    this.#idMascota = value;
  }
  toHTMLRow() {
    let fila = "<tr>";
    fila += "<td>" + this.idMascota + "</td>";
    fila += "<td>" + this.peso + "</td></tr>";
    return fila;
  }
}

class Gato extends Mascota {
  #raza;
  constructor(idMascota, peso, raza) {
    super(idMascota, peso);
    this.#raza = raza;
  }
  get raza() {
    return this.#raza;
  }
  set raza(value) {
    this.#raza = value;
  }
  toHTMLRow() {
    let fila = super.toHTMLRow();
    fila = fila.slice(0, fila.length - 5); // Para quitar el </tr>
    fila += "<td>" + this.raza + "</td></tr>";
    return fila;
  }
}

class Perro extends Mascota {
  #altura;
  constructor(idMascota, peso, altura) {
    super(idMascota, peso);
    this.#altura = altura;
  }
  get altura() {
    return this.#altura;
  }
  set altura(value) {
    this.#altura = value;
  }
  toHTMLRow() {
    let fila = super.toHTMLRow();
    fila = fila.slice(0, fila.length - 5); // Para quitar el </tr>
    fila += "<td>" + this.altura + "</td></tr>";
    return fila;
  }
}

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

class Movimiento {
  #mascota;
  #colaborador;
  #tipo;
  #fecha;
  constructor(mascota, colaborador, tipo, fecha) {
    this.#mascota = mascota;
    this.#colaborador = colaborador;
    this.#tipo = tipo;
    this.#fecha = fecha;
  }
  get fecha() {
    return this.#fecha;
  }
  set fecha(value) {
    this.#fecha = value;
  }
  get tipo() {
    return this.#tipo;
  }
  set tipo(value) {
    this.#tipo = value;
  }
  get colaborador() {
    return this.#colaborador;
  }
  set colaborador(value) {
    this.#colaborador = value;
  }
  get mascota() {
    return this.#mascota;
  }
  set mascota(value) {
    this.#mascota = value;
  }

  toHTMLRow() {
    let fila = "<tr>";
    fila += "<td>" + this.mascota + "</td>";
    fila += "<td>" + this.colaborador.nombre + " " + this.colaborador.apellidos + "</td>";
    fila += "<td>" + this.tipo + "</td>";
    fila += "<td>" + this.fecha.toLocaleDateString() + "</td></tr>";
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

  altaMascota(mascota) {
    let mensajeSalida = "";
    if (this.mascotas.filter((elem) => elem.idMascota == mascota.idMascota).length != 0) {
      mensajeSalida = "Mascota registrada previamente";
    } else {
      this.mascotas.push(mascota);
      mensajeSalida = "Alta mascota OK";
    }
    return mensajeSalida;
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

  movimientoMascota(dniColaborador, idMascota, tipo, fecha) {
    // Tipo: "E" significa que se entrega en el albergue
    // Tipo: "R" significa que se recoge del albergue
    let mensajeSalida = "";
    let movimiento, mascota, colaborador;
    const colaboradorNoRegistrado =
      this.colaboradores.filter((elem) => elem.dni == dniColaborador).length == 0;
    const mascotaNoRegistrada =
      this.mascotas.filter((elem) => elem.idMascota == idMascota).length == 0;
    const mascotaYaRecogida =
      tipo == "R" &&
      this.movimientos.filter((elem) => elem.mascota.idMascota == idMascota && elem.tipo == "R")
        .length > 0;
    const mascotaYaEntregada =
      tipo == "E" &&
      this.movimientos.filter((elem) => elem.mascota.idMascota == idMascota && elem.tipo == "E")
        .length > 0;
    const mascotaNoRecogidaPreviamente =
      tipo == "R" &&
      this.movimientos.filter((elem) => elem.mascota.idMascota == idMascota && elem.tipo == "E")
        .length == 0;

    if (colaboradorNoRegistrado) {
      mensajeSalida = "Colaborador no registrado previamente";
    } else if (mascotaNoRegistrada) {
      mensajeSalida = "Mascota no registrada previamente";
    } else if (mascotaYaRecogida) {
      mensajeSalida = "Mascota ya recogida";
    } else if (mascotaYaEntregada) {
      mensajeSalida = "Mascota ya entregada";
    } else if (mascotaNoRecogidaPreviamente) {
      mensajeSalida = "Mascota no recogida previamente";
    } else {
      mascota = this.mascotas.find((elem) => elem.idMascota == idMascota);
      colaborador = this.colaboradores.find((elem) => elem.dni == dniColaborador);
      movimiento = new Movimiento(mascota, colaborador, tipo, fecha);
      this.movimientos.push(movimiento);
      mensajeSalida = "Alta movimiento OK";
    }
    return mensajeSalida;
  }

  listadoMascotas() {
    let salida =
      "<table border='1'><thead><tr><th>Tipo</th><th>ID Mascota</th><th>Peso</th><th>Altura</th><th>Raza</th><th>Colaborador</th><th>Fecha Entrega</th></thead><tbody>";
    const movimientosEntregas = this.movimientos.filter((elem) => elem.tipo == "E"); //Llegan al albergue
    const movimientosRecogidos = this.movimientos.filter((elem) => elem.tipo == "R"); //Salen del albergue

    for (let mov of movimientosEntregas) {
      if (!movimientosRecogidos.some((elem) => mov.mascota.idMascota == elem.mascota.idMascota)) {
        //Si no existe un movimiento en recogidos que tb exista en entregados
        salida += this.addFilaListadoMascotas(mov);
      }
    }
    salida += "</tbody></table>";
    return salida;
  }

  addFilaListadoMascotas(mov) {
    let fila = "<tr>";
    fila += "<td>" + (mov.mascota instanceof Perro ? "Perro" : "Gato") + "</td>";
    fila += "<td>" + mov.mascota.idMascota + "</td>";
    fila += "<td>" + mov.mascota.peso + " kg</td>";
    fila += "<td>" + (mov.mascota instanceof Perro ? mov.mascota.altura + " cm" : "") + "</td>";
    fila += "<td>" + (mov.mascota instanceof Gato ? mov.mascota.raza : "") + "</td>";
    fila += "<td>" + mov.colaborador.nombre + " " + mov.colaborador.apellidos + "</td>";
    fila += "<td>" + mov.fecha.toLocaleDateString() + "</td></tr>";
    return fila;
  }

  listadoColaboradores() {
    let salida =
      "<table border='1'><thead><tr><th>DNI</th><th>Apellidos</th><th>Nombre</th></thead><tbody>";
    // Ordenamos alfabéticamente por apellidos y nombre
    this.colaboradores.sort((c1, c2) =>
      c1.apellidos.localeCompare(c2.apellidos) == 0
        ? c1.nombre.localeCompare(c2.nombre)
        : c1.apellidos.localeCompare(c2.apellidos)
    );
    console.log(this.colaboradores);
    for (let colaborador of this.colaboradores) {
      salida += colaborador.toHTMLRow();
    }
    return salida + "</tbody></table>";
  }

  siguienteIdMascota() {
    if (this.mascotas.length > 0) {
      return this.mascotas[this.mascotas.length - 1].idMascota + 1;
    } else {
      return 1;
    }
  }
}
