let fecha = new Date();
let anio = fecha.getFullYear();
let mes = (fecha.getMonth() + 1).toString().padStart(2, "0");
let dia = fecha.getDate().toString().padStart(2, "0");
let fechaHoy = `${anio}-${mes}-${dia}`;

window.addEventListener("DOMContentLoaded", (event) => {
	// esto es para que el menu se cierre al hacer click en un elemento
	const navbarToggler = document.body.querySelector(".navbar-toggler");
	const responsiveNavItems = [].slice.call(document.querySelectorAll("#navbarResponsive .nav-link"));
	responsiveNavItems.map(function (responsiveNavItem) {
		responsiveNavItem.addEventListener("click", () => {
			if (window.getComputedStyle(navbarToggler).display !== "none") {
				navbarToggler.click();
			}
		});
	});

	//si existe el formulario frmAñadirClase se pondra la fecha de hoy en el input de fecha de alta
	let frmAñadirClase = document.getElementById("frmAñadirClase");
	let frmAñadirModalidad = document.getElementById("frmAñadirModalidad");
	let frmDarDeBaja = document.getElementById("frmDarDeBaja");

	if (frmAñadirClase || frmAñadirModalidad) {
		document.getElementById("DateAlta").value = fechaHoy;
	}
	if (frmDarDeBaja) {
		document.getElementById("DateBaja").value = fechaHoy;
	}
});

var acc = document.getElementsByClassName("accordion");
var i;
var len = acc.length;
for (i = 0; i < len; i++) {
	acc[i].addEventListener("click", function () {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight) {
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
		}
	});
}

let btnIniciarsesion = document.getElementById("btnIniciarsesion");

//al hacer click en el boton de iniciar sesion me lleva a la pagina de login
if (btnIniciarsesion) {
	btnIniciarsesion.addEventListener("click", () => {
		window.location.href = "../ProyectoFCT/html/login.html";
	});
}

let btnIniciarsesion2 = document.getElementById("btnIniciarsesion2");

//al hacer click en el boton de iniciar sesion me lleva a la pagina de login
if (btnIniciarsesion2) {
	btnIniciarsesion2.addEventListener("click", () => {
		window.location.href = "../html/login.html";
	});
}

//añadir un nuevo usuario a la base de datos de usuarios
if (document.getElementById("frmRegistro")) {
	$(document).ready(function () {
		$("#registrarNuevo").click(function () {
			if ($("#Nombre").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			} else if ($("#Apellidos").val() == "") {
				alertify.alert("Debes agregar un apellido");
				return false;
			} else if ($("#Email").val() == "") {
				alertify.alert("Debes agregar un email");
				return false;
			} else if ($("#Telefono").val() == "") {
				alertify.alert("Debes agregar una telefono");
				return false;
			} else if ($("#Contraseña").val() == "") {
				alertify.alert("Debes agregar una contraseña");
				return false;
			} else if ($("#Tarifa").val() == "") {
				alertify.alert("Debes agregar una tarifa");
				return false;
			}

			cadena =
				"Nombre=" +
				$("#Nombre").val() +
				"&Apellidos=" +
				$("#Apellidos").val() +
				"&Email=" +
				$("#Email").val() +
				"&Telefono=" +
				$("#Telefono").val() +
				"&Contraseña=" +
				$("#Contraseña").val() +
				"&Tarifa=" +
				$("#Tarifa").val();

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaRegistroUsuario.php",
				data: cadena,
				success: function (r) {
					let respuesta = r.split("\n");
					let value = respuesta[9];
					var NumeroRespuesta = value.split(">");
					var numero = NumeroRespuesta[1].trim();

					if (numero == 2) {
						alertify.alert("Este usuario ya existe, prueba con otro");
					} else if (numero == 1) {
						$("#frmRegistro")[0].reset();
						alertify.success("Agregado con exito");
					} else {
						alertify.error("Fallo al agregar");
					}
				},
			});
		});
	});
}

//para añadir una clase nueva a la base de datos de clases
if (document.getElementById("frmAñadirClase")) {
	$(document).ready(function () {
		$("#frmAñadirClase").submit(function (e) {
			e.preventDefault();
			if ($("#name").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			} else if ($("#description").val() == "") {
				alertify.alert("Debes agregar una descripcion");
				return false;
			} else if ($("#DateAlta").val() == "") {
				alertify.alert("Debes agregar una fecha de alta");
				return false;
			}

			let datos = new FormData($("#frmAñadirClase")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaAñadirClase.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);

					if (r == 2) {
						alertify.alert("Esta clase ya existe, prueba con otra");
					} else if (r == 1) {
						alertify.success("Agregado con exito");

						//se recarga la pagina al tiempo de 4 segundos
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al agregar");
					}
				},
			});
		});
	});
}

//modificar un usuario

if (document.getElementById("frmModificar")) {
	$(document).ready(function () {
		$("#frmModificar").submit(function (e) {
			e.preventDefault();
			if ($("#Nombre").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			} else if ($("#Apellidos").val() == "") {
				alertify.alert("Debes agregar un apellido");
				return false;
			} else if ($("#Telefono").val() == "") {
				alertify.alert("Debes agregar una telefono");
				return false;
			} else if ($("#Contraseña").val() == "") {
				alertify.alert("Debes agregar una contraseña");
				return false;
			}

			let datos = new FormData($("#frmModificar")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasClientes/ConsultaModificarUsuario.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);

					if (r == 1) {
						alertify.success("Modificado con exito");
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al modificar");
					}
				},
			});
		});
	});
}

//para añadir una modalidad nueva a la base de datos de modalidades
if (document.getElementById("frmAñadirModalidad")) {
	$(document).ready(function () {
		$("#frmAñadirModalidad").submit(function (e) {
			e.preventDefault();
			if ($("#NombreModalidad").val() == "") {
				alertify.alert("Debes agregar un nombre para la Clase");
				return false;
			} else if ($("#NombreClase").val() == "") {
				alertify.alert("Debes agregar un nombre para la Modalidad");
				return false;
			}

			let datos = new FormData($("#frmAñadirModalidad")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaAñadirModalidad.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);

					if (r == 1) {
						alertify.success("Agregado con exito");

						//se recarga la pagina al tiempo de 1 segundos
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al agregar");
					}
				},
			});
		});
	});
}

//para dar de baja una clase de la base de datos de clases
if (document.getElementById("frmDarDeBaja")) {
	$(document).ready(function () {
		$("#frmDarDeBaja").submit(function (e) {
			e.preventDefault();
			let boleno = false;
			if ($("#name").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			} else if ($("#DateBaja").val() == "") {
				alertify.alert("Debes agregar una fecha de baja");
				return false;
			}

			let datos = new FormData($("#frmDarDeBaja")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaEliminarClase.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);
					if (r == 1) {
						//recarga la pagina
						alertify.success("Se a dado de baja con exito");

						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al dar de baja");
					}
				},
			});
		});
	});
}
//dar de baja a un usuario de la base de datos de usuarios
if (document.getElementById("frmEliminarUsuario")) {
	$(document).ready(function () {
		$("#frmEliminarUsuario").submit(function (e) {
			e.preventDefault();
			if ($("#Email").val() == "") {
				alertify.alert("Debes agregar un email");
				return false;
			}

			let datos = new FormData($("#frmEliminarUsuario")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaEliminarUsuario.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);
					if (r == 1) {
						alertify.success("Eliminado con exito");

						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al eliminar");
					}
				},
			});
		});
	});
}

if (document.getElementById("frmDarDeBaja")) {
	$(document).ready(function () {
		$("#name").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaClaseAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 0) {
							alertify.alert("Esta clase no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#name").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmEliminarUsuario")) {
	$(document).ready(function () {
		$("#Email").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaEliminarUsuarioAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 0) {
							alertify.alert("Esta clase no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#Email").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmRecuperarUsuario")) {
	$(document).ready(function () {
		$("#recuperarEmail").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaRecuperarUsuarioAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 0) {
							alertify.alert("Esta clase no existe");
						} else {
							alertify.alert("Este usuario no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#recuperarEmail").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmRecuperarUsuario")) {
	$(document).ready(function () {
		$("#frmRecuperarUsuario").submit(function (e) {
			e.preventDefault();
			if ($("#recuperarEmail").val() == "") {
				alertify.alert("Debes agregar un email");
				return false;
			}

			let datos = new FormData($("#frmRecuperarUsuario")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaRecuperarUsuario.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);
					if (r == 1) {
						alertify.success("Eliminado con exito");

						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al eliminar");
					}
				},
			});
		});
	});
}

if (document.getElementById("frmAsignarUnaClase")) {
	$(document).ready(function () {
		$("#frmAsignarUnaClase").submit(function (e) {
			e.preventDefault();
			if ($("#Nombre").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			} else if ($("#Entrada").val() == "") {
				alertify.alert("Debes agregar una hora de entrada");
				return false;
			} else if ($("#Email").val() == "") {
				alertify.alert("Debes agregar un email");
				return false;
			} else if ($("#Clase").val() == "") {
				alertify.alert("Debes agregar una clase");
				return false;
			} else if ($("#Salida").val() == "") {
				alertify.alert("Debes agregar una hora de salida");
				return false;
			}

			let datos = new FormData($("#frmAsignarUnaClase")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaAsignarUnaClase.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);
					if (r == 1) {
						alertify.success("Asignado con exito");

						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al asignar");
					}
				},
			});
		});
	});
}

if (document.getElementById("frmAsignarUnaClase")) {
	$(document).ready(function () {
		$("#Clase").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaClaseAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 0) {
							alertify.alert("Esta clase no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#Clase").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmRecuperarClase")) {
	$(document).ready(function () {
		$("#NombreRecuperarClase").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaRecuperarClaseAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 1) {
							alertify.success("Esta clase ya esta activa");

							setTimeout(function () {
								location.reload();
							}, 1000);
						} else {
							alertify.error("Esta clase no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#NombreRecuperarClase").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmAñadirModalidad")) {
	$(document).ready(function () {
		$("#NombreModalidad").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaClaseAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 0) {
							alertify.alert("Esta clase no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#NombreModalidad").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmAsingnacionProfesor")) {
	$(document).ready(function () {
		$("#Email").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaTablaProfesorAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 0) {
							alertify.error("Este profesor no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#Email").val(ui.item.value);
				$("#id_profesor").val(ui.item.id);
				return false;
			},
		});
	});
}

if (document.getElementById("frmRegistroProfesor")) {
	$(document).ready(function () {
		$("#Clase").autocomplete({
			source: function (request, response) {
				$.ajax({
					url: "../consultasAdministrador/ConsultaClaseAutocompletado.php",
					type: "POST",
					dataType: "json",
					data: {
						q: request.term,
					},
					success: function (data) {
						response(data);
						console.log(data);
					},
					error: function (data) {
						if (data.length == 1) {
							alertify.success("Este profesor ya tiene esta clase asignada");

							setTimeout(function () {
								location.reload();
							}, 1000);
						} else {
							alertify.error("Este profesor no existe");
						}
					},
				});
			},
			minLength: 0,

			select: function (event, ui) {
				$("#Clase").val(ui.item.value);
				return false;
			},
		});
	});
}

if (document.getElementById("frmRecuperarClase")) {
	$(document).ready(function () {
		$("#frmRecuperarClase").submit(function (e) {
			e.preventDefault();
			if ($("#NombreRecuperarClase").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			}

			let datos = new FormData($("#frmRecuperarClase")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaRecuperarClase.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);
					if (r == 1) {
						alertify.success("Eliminado con exito");
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al eliminar");
					}
				},
			});
		});
	});
}

if (document.getElementById("frmRegistroProfesor")) {
	$(document).ready(function () {
		$("#frmRegistroProfesor").submit(function (e) {
			e.preventDefault();
			if ($("#Nombre").val() == "") {
				alertify.alert("Debes agregar un nombre");
				return false;
			}
			if ($("#Apellido").val() == "") {
				alertify.alert("Debes agregar un apellido");
				return false;
			}
			if ($("#Email").val() == "") {
				alertify.alert("Debes agregar un email");
				return false;
			}
			if ($("#Clase").val() == "") {
				alertify.alert("Debes agregar una clase");
				return false;
			}

			let datos = new FormData($("#frmRegistroProfesor")[0]);

			$.ajax({
				type: "POST",
				url: "../consultasAdministrador/ConsultaAsignarProfesor.php",
				data: datos,
				contentType: false,
				processData: false,
				success: function (r) {
					console.log(r);
					if (r == 1) {
						alertify.success("Registrado con exito");
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						alertify.error("Fallo al registrar");
					}
				},
			});
		});
	});
}
