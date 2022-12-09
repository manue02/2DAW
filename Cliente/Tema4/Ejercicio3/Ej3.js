class Semaforo {
  #color;
  #parpadeando;
  constructor() {
    this.#color = 0; //Rojo
    this.#parpadeando = false;
  }

  get color() {
    return this.#color;
  }

  set color(color) {
    if (color >= 0 && color <= 2) {
      this.#color = color;
    }
  }

  get parpadeando() {
    return this.#parpadeando;
  }

  set parpadeando(parpadeando) {
    if (this.color == 1) {
      //Si el color es ambar se puede cambiar
      this.#parpadeando = parpadeando;
    }
  }

  cadenaColor() {
    if (this.color == 0) {
      return "ROJO";
    } else if (this.color == 1) {
      return "AMBAR";
    } else if (this.color == 2) {
      return "VERDE";
    }
  }

  imprimir() {
    let parpadeo = "";
    if (this.color == 1 && this.parpadeando) {
      parpadeo = "PARPADEANDO";
    }
    console.log("SEMÁFORO EN " + this.cadenaColor() + " " + parpadeo);
  }

  cambia() {
    if (this.color == 0) {
      this.color = 2;
    } else if (this.color == 2) {
      this.color = 1;
      this.parpadeando = true;
    } else if (this.color == 1 && !this.parpadeando) {
      this.color = 0;
    } else if (this.color == 1 && this.parpadeando) {
      this.parpadeando = false;
    }
  }
}

let s = new Semaforo();
let s1;

s.color = 5;
s.imprimir();
s.color = 2;
s.imprimir();
s.parpadeando = true;
s.imprimir();
s.color = 1;
s.imprimir();
s.parpadeando = true;
s.imprimir();
s.cambia();
s.imprimir();
s.cambia();
s.imprimir();
s.cambia();
s.imprimir();
s.cambia();
s.imprimir();
s.cambia();
s.imprimir();

s1 = new Semaforo();
s1.color = s.color;
s1.parpadeando = s.parpadeando;
s1.imprimir();
