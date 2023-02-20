//El Element.append()método inserta un conjunto de Nodeobjetos u objetos de cadena después del último hijo del Element. TextLos objetos de cadena se insertan como nodos equivalentes .

//El Element.prepend()método inserta un conjunto de Nodeobjetos u objetos de cadena antes del primer hijo del Element. TextLos objetos de cadena se insertan como nodos equivalentes .

//El Element.after()método inserta un conjunto de Nodeobjetos de cadena en la lista de Elementelementos secundarios del elemento principal, justo después de Element. TextLos objetos de cadena se insertan como nodos equivalentes .

//El Element.before()método inserta un conjunto Nodeo una cadena de objetos en la lista de elementos secundarios del elemento principal de this Element, justo antes de this Element. TextLos objetos de cadena se insertan como nodos equivalentes .

//Ejemplo de expresión regular para validar un email
// var email = document.getElementById("email");
// var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
// if (emailRegex.test(email.value)) {
//   alert("Email correcto");
// } else {
//   alert("Email incorrecto");
// }

//Ejemplo de expresión regular para validar un DNI
// var dni = document.getElementById("dni");
// var dniRegex = /^\d{8}[a-zA-Z]$/;
// if (dniRegex.test(dni.value)) {
//   alert("DNI correcto");
// } else {
//   alert("DNI incorrecto");
// }

//Ejemplo de expresión regular para validar un teléfono
// var telefono = document.getElementById("telefono");
// var telefonoRegex = /^[9|6|7][0-9]{8}$/;
// if (telefonoRegex.test(telefono.value)) {
//   alert("Teléfono correcto");
// } else {
//   alert("Teléfono incorrecto");
// }

//Ejemplo de expresión regular para validar una fecha
// var fecha = document.getElementById("fecha");
// var fechaRegex = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
// if (fechaRegex.test(fecha.value)) {
//   alert("Fecha correcta");
// } else {
//   alert("Fecha incorrecta");
// }

//Ejemplo de expresión regular para validar una hora
// var hora = document.getElementById("hora");
// var horaRegex = /^\d{1,2}:\d{2}:\d{2}$/;
// if (horaRegex.test(hora.value)) {
//   alert("Hora correcta");
// } else {
//   alert("Hora incorrecta");
// }

//Ejemplo de expresión regular para validar una URL
// var url = document.getElementById("url");
// var urlRegex = /^(http|https):\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
// if (urlRegex.test(url.value)) {
//   alert("URL correcta");
// } else {
//   alert("URL incorrecta");
// }

//funcion para mostar toda la cuenta de una mesa seleccionada
function MostrarCuenta() {
	// let mesa = this;
	// let contador = 0;
	// let cuenta = document.getElementById("cuenta");
	// cuenta.innerHTML =
	// 	"<h1>Cuenta</h1> <h2 id='numero'>Mesa " +
	// 	mesa.innerHTML +
	// 	"</h2>" +
	// 	"<h2>Total: 0€</h2>" +
	// 	"<input onclick='mesaVerde(" +
	// 	mesa.innerHTML +
	// 	")' type='button'  id='pagar' value='Pagar y liberar la mesa'>";
	// //meter el numero de la mesa seleccionada en una cuenta nueva
	// let tabla = document.createElement("table");
	// tabla.setAttribute("id", "tabla");
	// cuenta.append(tabla);
	// tabla.innerHTML = "<tr><th>Modificar</th><th>Uds</th><th>Id</th><th>Producto</th><th>Precio</th></tr>";
	// if (gestores[mesa.innerHTML - 1] != undefined) {
	// 	console.log(mesa.innerHTML - 1);
	// 	for (let i = 0; i < gestores[mesa.innerHTML - 1].cuentas.length; i++) {
	// 		for (let o = 0; o < gestores[mesa.innerHTML - 1].cuentas[i].lineasCuenta.length; o++) {
	// 			//recorremos el array de catalago
	// 			for (let j = 0; j < catalogo.productos.length; j++) {
	// 				if (catalogo.productos[j].idProducto == gestores[mesa.innerHTML - 1].cuentas[i].lineasCuenta[o].idProducto) {
	// 					console.log(gestores[mesa.innerHTML - 1].cuentas[i].lineasCuenta[o].unidades);
	// 					console.log(catalogo.productos[j].nombreProducto);
	// 					let precioTotal = gestores[mesa.innerHTML - 1].cuentas[i].lineasCuenta[o].unidades * catalogo.productos[j].precioUnidad;
	// 					let tr = document.createElement("tr");
	// 					tabla.append(tr);
	// 					tr.innerHTML =
	// 						"<td id = " +
	// 						contador++ +
	// 						"><button class = 'boton' onClick = 'AñadirUnidad()'>+</button> <button class = 'boton' onClick = 'QuitarUnidad()'>-</button></td><td>" +
	// 						gestores[mesa.innerHTML - 1].cuentas[i].lineasCuenta[o].unidades +
	// 						"</td><td>" +
	// 						gestores[mesa.innerHTML - 1].cuentas[i].lineasCuenta[o].idProducto +
	// 						"</td><td>" +
	// 						catalogo.productos[j].nombreProducto +
	// 						"</td><td>" +
	// 						precioTotal +
	// 						"€</td>";
	// 				}
	// 			}
	// 		}
	// 	}
	// }
}

//comando git para subir los cambios a github
//git add .
//git commit -m "mensaje"
//git push

//comando git para descargar los cambios de github
//git pull

//comando git para convinar dos ramas
//git merge rama1 rama2

//crear un archivo gitignore para que no se suba los backups
//touch .gitignore

//etiqueta tu repositorio con version 1.0
//git tag -a v1.0 -m "version 1.0"

//5.	Crea una rama llamada “experimentafuncion”
//git branch experimentafuncion

//6.	Cambia a la rama “experimentafuncion”
//git checkout experimentafuncion

//fusionar la rama experimentafuncion con la rama master
//git merge experimentafuncion master

//eliminar la rama experimentafuncion
//git branch -d experimentafuncion

//hacer un pull request
//git push origin master
