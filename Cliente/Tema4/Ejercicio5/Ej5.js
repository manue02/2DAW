class Bonobus {}

class BonoDiezViajes extends Bonobus {
  #nViajes;
  constructor() {
    super();
    this.#nViajes = 10;
  }

  get nViajes() {
    return this.#nViajes;
  }

  set nViajes(nViajes) {
    this.#nViajes = nViajes;
  }

  picarViaje(linea, dia, mes, anno, hh, mm) {
    let viajeValidado = false;
    if (this.nViajes > 0) {
      this.nViajes--;
      viajeValidado = true;
    }
    return viajeValidado;
  }
}

class BonoDiezViajesConTrasbordo extends BonoDiezViajes {
  #nLinea;
  #dia;
  #mes;
  #anno;
  #hh;
  #mm;

  constructor() {
    super();
  }

  get nLinea() {
    return this.#nLinea;
  }
  set nLinea(value) {
    this.#nLinea = value;
  }

  get dia() {
    return this.#dia;
  }
  set dia(value) {
    this.#dia = value;
  }

  get mes() {
    return this.#mes;
  }
  set mes(value) {
    this.#mes = value;
  }

  get anno() {
    return this.#anno;
  }
  set anno(value) {
    this.#anno = value;
  }

  get hh() {
    return this.#hh;
  }
  set hh(value) {
    this.#hh = value;
  }

  get mm() {
    return this.#mm;
  }
  set mm(value) {
    this.#mm = value;
  }

  picarViaje(linea, dia, mes, anno, hh, mm) {
    let viajeValidado = false;
    if (this.nViajes == 10) {
      descontarViaje(linea, dia, mes, anno, hh, mm);
      viajeValidado = true;
    } else if (this.nViajes > 0) {
      if (!(this.dentroDePrimeraHora(dia, mes, anno, hh, mm) && this.nLinea != linea)) {
        this.descontarViaje(linea, anno, mes, dia, hh, mm);
      }
      viajeValidado = true;
    }
    return viajeValidado;
  }
  descontarViaje(linea, dia, mes, anno, hh, mm) {
    this.nViajes--;
    this.#nLinea = linea;
    this.#dia = dia;
    this.#mes = mes;
    this.#anno = anno;
    this.#hh = hh;
    this.#mm = mm;
  }

  dentroDePrimeraHora(dia, mes, anno, hh, mm) {
    let horaAtributos = new Date(this.#anno, this.#mes, this.#dia, this.#hh, this.#mm);
    let horaPicadoBillete = new Date(anno, mes, dia, hh, mm);

    let diferenciaHoras = horaPicadoBillete - horaAtributos;
    if (diferenciaHoras < 1000 * 60 * 60) {
      return true;
    } else {
      return false;
    }
  }
}

class BonoTarifaPlana extends Bonobus {
  #diaCaduca;
  #mesCaduca;
  #annoCaduca;

  constructor(dia, mes, anno) {
    super();
    this.#diaCaduca = dia;
    this.#mesCaduca = mes;
    this.#annoCaduca = anno;
  }

  get diaCaduca() {
    return this.#diaCaduca;
  }
  set diaCaduca(value) {
    this.#diaCaduca = value;
  }
  get mesCaduca() {
    return this.#mesCaduca;
  }
  set mesCaduca(value) {
    this.#mesCaduca = value;
  }
  get annoCaduca() {
    return this.#annoCaduca;
  }
  set annoCaduca(value) {
    this.#annoCaduca = value;
  }
  picarViaje() {
    const hoy = new Date();
    const caducidad = new Date(this.#annoCaduca, this.#mesCaduca, this.#diaCaduca);
    if (hoy <= caducidad) {
      return true;
    } else {
      return false;
    }
  }

  imprimir() {
    return (
      "Bono Tarifa Plana - Caducidad: " +
      this.#diaCaduca +
      "/" +
      this.#mesCaduca +
      "/" +
      this.#annoCaduca
    );
  }
}

class BonoTarifaPlanaUnDia extends BonoTarifaPlana {
  constructor() {
    const caducidad = new Date();
    caducidad.setDate(caducidad.getDate() + 1);
    super(caducidad.getDay(), caducidad.getMonth(), caducidad.getFullYear());
  }
}

class BonoTarifaPlanaTresDias extends BonoTarifaPlana {
  constructor() {
    const caducidad = new Date();
    caducidad.setDate(caducidad.getDate() + 3);
    super(caducidad.getDay(), caducidad.getMonth(), caducidad.getFullYear());
  }
}

class BonoTarifaPlanaUnMes extends BonoTarifaPlana {
  constructor() {
    const caducidad = new Date();
    caducidad.setDate(caducidad.getDate() + 30);
    super(caducidad.getDay(), caducidad.getMonth(), caducidad.getFullYear());
  }
}

class BonoTarifaPlanaUnAnno extends BonoTarifaPlana {
  constructor() {
    const caducidad = new Date();
    caducidad.setDate(caducidad.getDate() + 365);
    super(caducidad.getDay(), caducidad.getMonth(), caducidad.getFullYear());
  }
}

const b1 = new BonoTarifaPlanaTresDias();
console.log(b1.picarViaje());
console.log(b1.imprimir());
