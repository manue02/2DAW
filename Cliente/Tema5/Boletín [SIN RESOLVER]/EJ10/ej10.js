document.addEventListener("mousedown", ratonClick);

document.addEventListener("mouseup", ratonClick);

function ratonClick(e) {
	if (e.buttons == 1) alert("Has hecho click en el ratón");
	else if (e.buttons == 0) alert("Has hecho click en la rueda del ratón");
	else if (e.buttons == 2) alert("Has hecho click en el botón derecho del ratón");
}
