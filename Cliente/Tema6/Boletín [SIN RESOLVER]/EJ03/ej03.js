//hacer un evento a principal

document.getElementById("principal").addEventListener("click", FuncionPrincipal());
document.getElementById("secundaria").addEventListener("click"), FuncionSecundaria();
document.getElementById("resetear").addEventListener("click"), FuncionResetear();

function FuncionPrincipal() {
	let tabla = document.getElementsByTagName("table")[0];

	for (let i = 0; i < tabla.rows.length; i++) {
		tabla.rows[i].style.backgroundColor = "blue";
		tabla.rows[i].style.color = "white";
	}
}
