<?php
include('funciones.php');
include('funcionesBD.php');
cabecera('Alumnos');
echo "<div id=\"contenido\">";
$conexion = new mysqli("localhost", "root", "", "preparadasb");
$conexion->set_charset("utf8");
extract($_POST);
$nombreCurso = obtenerValorColumna("cursos", "id", $idcurso, "nombre");
$cadenasql = "SELECT id,nombre from alumnos  where ";
$cadenasql .= " id not in (select id_alumno from alumnos_cursos where año='" . $año . "') order by nombre";
$resultado = $conexion->query($cadenasql);

echo "<table align=center border=2 bgcolor='#F0FFFF'>";
echo "<td colspan=2 align=center>Seleccione alumnos para asignar a " . $nombreCurso . ", Año: " . $año . "</td><tr>";
echo "<td colspan= align=center>Alumnos</td>";
echo "<td align=center>Selección</td><tr>";
echo "<form name='modificar' method=\"POST\" action='scriptactualizacion.php'>";
echo "<input type='hidden' name='año' value='" . $año . "'>";
echo "<input type='hidden' name='idcurso' value=" . $idcurso . ">";
while ($salida = $resultado->fetch_assoc()) {
	echo "<tr><td>" . $salida["nombre"] . "</td>";
	echo "<td align='center'><input type=checkbox name=idAlumno[] value=" . $salida["id"] . "></td></tr>";
}

$conexion->close();
?>



<tr>
	<td colspan=2 align=center><br><input type=submit value='Grabar'>
</tr>



</form>
</table>

</html>