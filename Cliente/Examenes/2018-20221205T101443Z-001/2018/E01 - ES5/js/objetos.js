function Arbol(codigo, tallaje, especie) {
  this.codigo = codigo;
  this.tallaje = tallaje;
  this.especie = especie;
}

Arbol.prototype.toHTMLRow = function () {
  let fila = "<tr>";
  fila += "<td>" + this.codigo + "</td>";
  fila += "<td>" + this.tallaje + "</td>";
  fila += "<td>" + this.especie + "</td></tr>";
  return fila;
};

function Perenne(codigo, tallaje, especie, frutal) {
  Arbol.call(this, codigo, tallaje, especie);
  // Arbol.apply(this,[codigo, tallaje, especie]);

  this.frutal = frutal;
}

// Herencia de Arbol
Perenne.prototype = Object.create(Arbol.prototype);
Perenne.prototype.constructor = Perenne;

Perenne.prototype.toHTMLRow = function () {
  let fila = "<tr>";
  fila += "<td>" + this.codigo + "</td>";
  fila += "<td>" + this.tallaje + "</td>";
  fila += "<td>" + this.especie + "</td>";
  fila += "<td>" + (this.frutal ? "SI" : "NO") + "</td></tr>";
  return fila;
};

function Caduco(codigo, tallaje, especie, mesFloracion) {
  //Arbol.call(this,codigo, tallaje, especie);
  Arbol.apply(this, [codigo, tallaje, especie]);

  this.mesFloracion = mesFloracion;
}

// Herencia de Arbol
Caduco.prototype = Object.create(Arbol.prototype);
Caduco.prototype.constructor = Caduco;

Caduco.prototype.toHTMLRow = function () {
  let fila = "<tr>";
  fila += "<td>" + this.codigo + "</td>";
  fila += "<td>" + this.tallaje + "</td>";
  fila += "<td>" + this.especie + "</td>";
  fila += "<td>" + this.mesFloracion + "</td></tr>";
  return fila;
};

function Vivero() {
  this.arboles = [];
}

Vivero.prototype.altaArbol = function (arbol) {
  let encontrado = this.arboles.filter((elem) => elem.codigo == arbol.codigo).length == 1;

  if (!encontrado) {
    this.arboles.push(arbol);
    return true;
  } else {
    return false;
  }
};

Vivero.prototype.buscarArbol = function (codigo) {
  let i = 0,
    encontrado = false;
  while (i < this.arboles.length && !encontrado) {
    if (this.arboles[i].codigo == codigo) {
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
};

Vivero.prototype.tallajeArbol = function (codigo, tallaje) {
  let mensajeSalida = "";
  let posicion = this.buscarArbol(codigo);
  if (posicion < 0) {
    mensajeSalida += "Árbol no registrado";
  } else if (this.arboles[posicion].tallaje > tallaje) {
    mensajeSalida += "Tallaje inferior al registrado";
  } else {
    this.arboles[posicion].tallaje = tallaje;
    mensajeSalida += "Correcto, tallaje actualizado ";
    mensajeSalida += this.arboles[posicion] instanceof Perenne ? "Perenne" : "Caduco";
  }
  return mensajeSalida;
};

Vivero.prototype.listadoPerennes = function (minAltura) {
  let listadoPerenne = this.arboles.filter(
    (arbol) => arbol instanceof Perenne && arbol.tallaje >= minAltura
  );

  listadoPerenne.sort((a1, a2) => a2.tallaje - a1.tallaje);

  let salida = "<table border='1'>";
  salida +=
    "<thead><tr><th>Código</th><th>Tallaje</th><th>Especie</th><th>Frutal</th></thead><tbody>";
  for (let arbol of listadoPerenne) {
    salida += arbol.toHTMLRow();
  }
  salida += "</tbody></table>";
  return salida;
};

Vivero.prototype.listadoCaducos = function (mesFloracion) {
  let listadoCaduco = this.arboles.filter(
    (arbol) => arbol instanceof Caduco && arbol.mesFloracion == mesFloracion
  );

  let salida = "<table border='1'>";
  salida +=
    "<thead><tr><th>Código</th><th>Tallaje</th><th>Especie</th><th>Mes floración</th></thead>";

  for (let arbol of listadoCaduco) {
    salida += arbol.toHTMLRow();
  }
  salida += "</tbody></table>";
  return salida;
};

Vivero.prototype.totalArbolesVenta = function () {
  let contador = 0;
  for (let arbol of this.arboles) {
    if (arbol instanceof Caduco && arbol.tallaje > 100) {
      contador++;
    } else if (arbol instanceof Perenne && arbol.frutal && arbol.tallaje > 80) {
      contador++;
    } else if (arbol instanceof Perenne && !arbol.frutal && arbol.tallaje > 120) {
      contador++;
    }
  }
  return contador;
};

Vivero.prototype.siguienteCodigoArbol = function () {
  if (this.arboles.length == 0) {
    return 1;
  } else {
    return this.arboles[this.arboles.length - 1].codigo + 1;
  }
};
