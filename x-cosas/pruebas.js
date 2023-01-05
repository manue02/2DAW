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
