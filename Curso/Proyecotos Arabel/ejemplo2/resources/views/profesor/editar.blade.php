<html><body>
<h3>Teclee sus datos</h3>
<form method="POST">
@csrf
Nombre: <input type="text" name="nombre" value="{{$profesor->nombre_apellido}}"><br>
Profesión: <input type="text" name="profesion" value="{{$profesor->profesion}}"><br>
Grado Académico: <input type="text" name="grado_academico" value="{{$profesor->grado_academico}}"><br>
Teléfono: <input type="text" name="telefono" value="{{$profesor->telefono}}"><br>
<br>
<br>
<input type="submit" name="enviar" value="Envio">

</form>

</body></html>