<?php
include('funciones.php');
include("..\FuncionesBD.php");
include("conexion.php");
cabecera('Alumnos');
echo "<div id=\"contenido\">";
echo "<table align=center border=2 bgcolor='#F0FFFF'>";

//traer curso
$curso = $_POST['ComboCurso'];

//traer año
$año = $_POST['año'];

// para traer el nombre del curso

$nombre = obtenerValorColumna("cursos", "id", $curso, "nombre");

//consulta donde aparecen todos los alumnos que no están matriculados en el año seleccionado
$consulta = "SELECT id, nombre as Alumno FROM alumnos WHERE id NOT IN (SELECT id_alumno FROM alumnos_cursos WHERE  año = '$año')";

$resultado = ejecutarConsulta($consulta);

echo "<td colspan=2 align=center>Seleccione alumnos para asignar a $nombre , Año:$año </td><tr>";
echo "<td colspan= align=center>Alumnos</td>";

echo "<td align=center>Selección</td><tr>";
echo "<form name='modificar' method=\"POST\" action='scriptactualizacion.php'>";

//al darle a grabar, se envía el año y el id del curso y los alumnos seleccionados ya no aparecen en el combo

echo "<input type='hidden' name='año' value='$año'>";
echo "<input type='hidden' name='idcurso' value='$curso'>";


while ($fila = mysqli_fetch_assoc($resultado)) {
    extract($fila);

    echo "<tr><td>$nombre</td>";
    echo "<td align='center'><input type=checkbox name=idAlumno[] " . $fila["id"] . "></td></tr>";
}

?>



<tr>
    <td colspan=2 align=center><br><input type=submit value='Grabar'>
</tr>



</form>
</table>

</html>