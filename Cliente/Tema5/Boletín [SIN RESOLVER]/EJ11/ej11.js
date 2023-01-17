document.getElementById("formulario").addEventListener("click", manejador);
document.getElementById("capa").addEventListener("click", manejador);
document.getElementById("parrafo").addEventListener("click", manejador);

function manejador(e) {
	console.log("Tipo de evento: " + this.tagName + "; " + "Target: " + e.target.tagName + "; " + "currentTarget: " + e.currentTarget.tagName + "; ");
}
