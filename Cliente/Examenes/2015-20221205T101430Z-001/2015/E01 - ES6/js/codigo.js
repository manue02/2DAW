let albergue = new Albergue();

ocultarTodosLosFormularios();

datosIniciales();

console.log(albergue);

function datosIniciales() {
  albergue.altaColaborador(new Colaborador("12345678K", "Pedro", "González Márquez"));
  albergue.altaColaborador(new Colaborador("98765432W", "Carmen", "Ruiz Martínez"));
  albergue.altaColaborador(new Colaborador("24681012B", "Santiago", "Pueyo Salmerón"));
  albergue.altaColaborador(new Colaborador("13579113H", "Sandra", "Rodríguez Álvarez"));
  albergue.altaMascota(new Perro(albergue.siguienteIdMascota(), 13, 25));
  albergue.altaMascota(new Perro(albergue.siguienteIdMascota(), 9, 21));
  albergue.altaMascota(new Gato(albergue.siguienteIdMascota(), 7, "Abisinio"));
  albergue.altaMascota(new Gato(albergue.siguienteIdMascota(), 9, "Asiático"));
  albergue.altaMascota(new Perro(albergue.siguienteIdMascota(), 28, 48));
  albergue.altaMascota(new Gato(albergue.siguienteIdMascota(), 6, "Bengalí"));
  albergue.movimientoMascota("12345678K", 1, "E", new Date());
  albergue.movimientoMascota("98765432W", 2, "E", new Date());
  albergue.movimientoMascota("13579113H", 3, "E", new Date());
  albergue.movimientoMascota("24681012B", 4, "E", new Date());
  albergue.movimientoMascota("24681012B", 5, "E", new Date());
  albergue.movimientoMascota("13579113H", 6, "E", new Date());
  albergue.movimientoMascota("24681012B", 6, "R", new Date());
  albergue.movimientoMascota("12345678K", 2, "R", new Date());
}

// Gestión de formularios
function gestionFormularios(sFormularioVisible) {
  ocultarTodosLosFormularios();

  // Hacemos visible el formulario que llega como parámetro
  switch (sFormularioVisible) {
    case "frmAltaMascota":
      frmAltaMascota.style.display = "block";
      break;
    case "frmAltaColaborador":
      frmAltaColaborador.style.display = "block";
      break;
    case "frmMovimientoMascota":
      frmMovimientoMascota.style.display = "block";
      break;
  }
}

function ocultarTodosLosFormularios() {
  let oFormularios = document.querySelectorAll("form");

  for (let i = 0; i < oFormularios.length; i++) {
    oFormularios[i].style.display = "none";
  }
}

function mostrarListadoColaboradores() {
  let oVentana = open("", "_blank", "");
  oVentana.document.open();
  oVentana.document.write("<h1>Listado Colaboradores</h1>");
  oVentana.document.write(albergue.listadoColaboradores());
  oVentana.document.close();
  oVentana.document.title = "Listado colaboradores";
}

function mostrarListadoMascotasEnAlbergue() {
  let oVentana = open("", "_blank", "");
  oVentana.document.open();
  oVentana.document.write("<h1>Listado de Mascotas en Albergue</h1>");
  oVentana.document.write(albergue.listadoMascotas());
  oVentana.document.close();
  oVentana.document.title = "Listado mascotas en albergue";
}

function aceptarAltaMascota() {
  let oMascota, sRaza, iAltura;
  let faltanDatos = false;
  let iPeso = parseInt(frmAltaMascota.txtPeso.value.trim());
  if (frmAltaMascota.rbtTipoMascota.value == "gato") {
    sRaza = frmAltaMascota.txtRaza.value.trim();
    oMascota = new Gato(albergue.siguienteIdMascota(), iPeso, sRaza);
    if (isNaN(iPeso) || sRaza.length == 0) {
      faltanDatos = true;
    }
  } else {
    iAltura = parseInt(frmAltaMascota.txtAltura.value.trim());
    oMascota = new Perro(albergue.siguienteIdMascota(), iPeso, iAltura);
    if (isNaN(iPeso) || isNaN(iAltura)) {
      faltanDatos = true;
    }
  }
  if (faltanDatos) {
    alert("Faltan datos por rellenar");
  } else {
    alert(albergue.altaMascota(oMascota));
    frmAltaMascota.reset();
    frmAltaMascota.style.display = "none";
  }
}

function aceptarAltaColaborador() {
  let sDNI = frmAltaColaborador.txtDNI.value.trim();
  let sNombre = frmAltaColaborador.txtNombre.value.trim();
  let sApellidos = frmAltaColaborador.txtApellidos.value.trim();
  let oColaborador = new Colaborador(sDNI, sNombre, sApellidos);
  if (sDNI.length == 0 || sNombre.length == 0 || sApellidos.length == 0) {
    alert("Faltan datos por rellenar");
  } else {
    alert(albergue.altaColaborador(oColaborador));
    frmAltaColaborador.reset();
    frmAltaColaborador.style.display = "none";
  }
}

function aceptarAltaMovimiento() {
  let sTipo = frmMovimientoMascota.rbtTipoMovimiento.value;
  let iIdMascota = parseInt(frmMovimientoMascota.txtIdMascotaMovimiento.value.trim());
  let sDNIColaborador = frmMovimientoMascota.txtDNIMovimiento.value.trim();
  if (sTipo.length == 0 || sDNIColaborador.length == 0 || isNaN(iIdMascota)) {
    alert("Faltan datos por rellenar");
  } else {
    alert(albergue.movimientoMascota(sDNIColaborador, iIdMascota, sTipo, new Date()));
    frmMovimientoMascota.reset();
    frmMovimientoMascota.style.display = "none";
  }
}
