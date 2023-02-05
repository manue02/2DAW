//crear una funcion que reciba un array de numeros y que me devuelva la suma de todos los numeros
//crear un array con numeros al azar y llamar a la funcion anterior para que me devuelva la suma de todos los numeros del array

let aNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

function sumaArray(aNumeros) {
	let iSuma = 0;
	for (let i = 0; i < aNumeros.length; i++) {
		iSuma += aNumeros[i];
	}
	return iSuma;
}

console.log(sumaArray(aNumeros));

function unidadesProducto() {
	let Teclado = this.value;
	let cuenta = document.getElementById("cuenta");
	cuenta.append(Teclado);
	let nombreProducto = frmControles.productos.value;
	let ArrayDeidProducto = [];
	ArrayDeidProducto = BuscarUnIdProducto(nombreProducto);

	console.log(ArrayDeidProducto);

	let resultadoID = ArrayDeidProducto.IdProducto;
	let resultadoPrecio = ArrayDeidProducto.PrecioUnidad;

	precioTotalUnidad = resultadoPrecio * Teclado;

	precioTotalUnidad = precioTotalUnidad.toFixed(2);

	let salto = document.createElement("br");
	cuenta.append(salto);

	//let lineaCuenta = new LineaCuenta(Teclado.value, subIDprod);

	console.log(Teclado, resultadoID, nombreProducto, precioTotalUnidad);

	//cuenta.append(Teclado.value, subIDprod, nombreProducto, precio);
	cuenta.innerHTML += "<p>" + resultadoID + " " + nombreProducto + " (ud: " + resultadoPrecio + "€) " + Teclado + " = " + precioTotalUnidad + "€</p>";
}

function BuscarUnIdProducto(value) {
	let productos = catalogo.productos;
	for (let i = 0; i < productos.length; i++) {
		if (value == productos[i].IdProducto) {
			return productos[i];
		}
	}
}
