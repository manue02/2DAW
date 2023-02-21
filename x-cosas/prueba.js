function unidadesProducto() {
	let Teclado = this.value;
	let mesa = document.getElementById("cuenta").getElementsByTagName("h2")[0].innerHTML;
	let NumeroMesa = mesa.substring(5, 6);
	let nombreProducto = frmControles.productos.value;
	console.log(nombreProducto);

	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let resultado = JSON.parse(this.responseText);
			let resultadoID = resultado.IdProducto;
			let resultadoPrecio = resultado.PrecioUnidad;

			precioTotalUnidad = resultadoPrecio * Teclado;
			precioTotalUnidad = precioTotalUnidad.toFixed(2);

			let cuenta = document.getElementById("cuenta");
			let salto = document.createElement("br");
			cuenta.append(salto);

			let rojo = document.getElementsByClassName("mesa");
			rojo[NumeroMesa - 1].classList.add("ocupada");

			if (Gestores[NumeroMesa - 1] != undefined) {
				for (let i = 0; i < Gestores[NumeroMesa - 1].cuentas.length; i++) {
					for (let j = 0; j < Gestores[NumeroMesa - 1].cuentas[i].lineasDeCuenta.length; j++) {
						if (Gestores[NumeroMesa - 1].cuentas[i].lineasDeCuenta[j].IdProducto == resultadoID) {
							return true;
						}
					}
				}
				return false;
			}

			let lineaCuenta = new LineaCuenta(Teclado, resultadoID);

			let arrayLineasCuenta = [];
			arrayLineasCuenta.push(lineaCuenta);

			console.log(arrayLineasCuenta);

			//crear una cuenta nueva por cada mesa
			let cuentaNueva = new Cuenta(NumeroMesa, [arrayLineasCuenta], false);

			let gestor = Gestores[NumeroMesa - 1];
			if (gestor === undefined) {
				gestor = new Gestor(NumeroMesa);
				Gestores[NumeroMesa - 1] = gestor;
			}

			gestor.cuentas.push(cuentaNueva);

			console.log(gestor.cuentas);

			cuenta.innerHTML = "<h1>Cuenta</h1> <h2>" + mesa + "</h2>" + "<h2>Total: " + precioTotalUnidad + "€</h2>" + "<button class = 'boton' onClick = 'liberarMesa()'>Pagar y liberar la mesa</button>";
			//meter el numero de la mesa seleccionada en una cuenta nueva

			let tabla2 = document.createElement("table");
			tabla2.setAttribute("id", "tabla2");
			cuenta.append(tabla2);
			tabla2.innerHTML = "<tr><th>Modificar</th><th>Uds</th><th>Id</th><th>Producto</th><th>Precio</th></tr>";

			let tr = document.createElement("tr");
			tr.setAttribute("id", contador);

			tabla2.append(tr);
			tr.innerHTML =
				"<td><button class = 'boton' onClick = 'AñadirUnidad(" +
				contador +
				")'>+</button> <button class = 'boton' onClick = 'QuitarUnidad(" +
				contador +
				")'>-</button></td><td>" +
				Teclado +
				"</td><td>" +
				resultadoID +
				"</td><td>" +
				nombreProducto +
				"</td><td>" +
				resultadoPrecio +
				"€</td>";
		}
	};
}
