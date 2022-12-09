function dentroDePrimeraHora() {
  // let horaAtributos = new Date(this.#anno, this.#mes, this.#dia, this.#hh, this.#mm);
  // let horaPicadoBillete = new Date(anno, mes, dia, hh, mm);
  let horaAtributos = new Date(2022, 12, 31, 23, 40);
  let horaPicadoBillete = new Date(2023, 1, 1, 0, 39);
  let diferenciaHoras = horaPicadoBillete - horaAtributos;
  if (diferenciaHoras < 1000 * 60 * 60) {
    return true;
  } else {
    return false;
  }
}

console.log(dentroDePrimeraHora());
