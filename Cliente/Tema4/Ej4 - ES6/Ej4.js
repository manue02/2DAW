class Figura {
  #color;
  constructor(color) {
    this.#color = color;
  }
  imprimir() {
    return "Soy una figura de color " + this.#color;
  }
  get color() {
    return this.#color;
  }
  set color(color) {
    this.#color = color;
  }
}

class Rectangulo extends Figura {
  #base;
  #altura;
  constructor(color, base, altura) {
    super(color);
    this.#base = base;
    this.#altura = altura;
  }
  get base() {
    return this.#base;
  }
  set base(base) {
    this.#base = base;
  }
  get altura() {
    return this.#altura;
  }
  set altura(altura) {
    this.#altura = altura;
  }
  calcularArea() {
    return this.base * this.altura;
  }
  imprimir() {
    return "Soy una rectángulo de color " + this.color + " y de área " + this.calcularArea();
  }
}

let r = new Rectangulo("rojo", 10, 6);

console.log(r.imprimir());
console.log("Base: " + r.color);
